<template>
  <div class="w-full bg-center bg-no-repeat bg-cover overflow-hidden">
    <div class="bg-gradient-to-tr h-full z-10 opacity-80"
      style="background-image: linear-gradient(45deg, #f200ff 0%, #ffba42 100%);">
      <div class="container mx-auto h-full">
        <div class="h-[80%] flex items-center py-10">
          <div class="mt-[10%]">
            <h2 class="text-white font-poppins font-normal text-[18px] ml-3">BLOGJECT > POST LIST</h2>
            <h1 class="text-white font-poppins font-black leading-[1] text-[8vw]">POST LIST</h1>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="absolute bottom-20 right-10 bg-green-500 rounded-md px-8 py-3 text-white" v-if="success">
    <box-icon name='check'></box-icon>
    <i class='bx bx-check'></i>
    Post edited successfully
  </div>
  <div class="container max-w-5xl p-24 m-auto">
    <h1 class="text-4xl font-bold mx-auto text-center p-12">Edit Post!</h1>
    <form @submit.prevent="submit" class="bg-white shadow-md rounded px-8 py-6 mx-auto mt-auto">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          Post Title
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          type="text" id="title" v-model="fields.title" placeholder="Enter your Post Title">
        <span v-if="errors.title" class="error">{{ rrors.title[0] }}</span>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          Image
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          type="file" id="image" @input="grabFile">
        <span v-if="errors.file" class="error">{{ errors.file[0] }}</span>

        <div>
          <img class="max-w-full max-h-56" :src="url" alt="" />
        </div>
      </div>


      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          Choose a category:
        </label>
        <select
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          v-model="fields.category_id" id="categories">
          <option disabled value="">Select option</option>
          <option :value="category.id" v-for="category in categories" :key="category.id">
            {{ category.name }}
          </option>
        </select>
        <span v-if="errors.category_id" class="error">{{
          errors.category_id[0]
        }}</span>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          Body
        </label>
        <textarea
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          rows="12" id="body" v-model="fields.body"></textarea>
        <span v-if="errors.body" class="error">{{
          errors.body[0]
        }}</span>
      </div>

      <div class="flex items-center justify-between">
        <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          type="submit" value="Submit">
          Submit
        </button>
        <router-link :to="{ name: 'DashboardPostsList' }"
          class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
          Post List <span>&#8594;</span>
        </router-link>
      </div>
    </form>
  </div>
</template>
  
<script>
export default {
  props: ["slug"],
  data() {
    return {
      success: false,
      fields: {
        category_id: "",
      },
      errors: {},
      url: "",
      categories: [],
    };
  },

  methods: {
    grabFile(e) {
      const file = e.target.files[0];
      this.fields.file = file;
      this.url = URL.createObjectURL(file);
      URL.revokeObjectURL(file);
    },

    submit() {
      const fd = new FormData();
      fd.append("title", this.fields.title);
      fd.append("category_id", this.fields.category_id);
      if (this.fields.file) {
        fd.append("file", this.fields.file);
      }
      fd.append("body", this.fields.body);

      fd.append("_method", "PUT");

      axios
        .post(`/api/posts/${this.slug}`, fd, {
          headers: {
            "content-type": "multipart/form-data",
          },
        })
        .then((res) => {
          this.$emit("showEditSuccess");

          this.$router.push({ name: "DashboardPostsList" });
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          if (error.response.status === 403) {
            this.$router.push({ name: "DashboardPostsList" });
          }
        });
    },
  },

  mounted() {
    axios
      .get("/api/categories")
      .then((response) => (this.categories = response.data))
      .catch((error) => {
        console.log(error);
      });

    axios
      .get("/api/posts/" + this.slug)
      .then((response) => {
        this.fields = response.data.data;
        this.url = "/" + response.data.data.imagePath;
      })
      .catch((error) => {
        if (error.response.status === 403) {
          this.$router.push({ name: "DashboardPostsList" });
        }
      });
  },
};
</script>
  

