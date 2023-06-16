<template>
  <div class="w-full bg-center bg-no-repeat bg-cover overflow-hidden">
    <div class="bg-gradient-to-tr h-full z-10 opacity-80"
      style="background-image: linear-gradient(45deg, #f200ff 0%, #ffba42 100%);">
      <div class="container mx-auto h-full">
        <div class="h-[80%] flex items-center py-10">
          <div class="mt-[10%]">
            <h2 class="text-white font-poppins font-normal text-[18px] ml-3">BLOGJECT > CATEGORIES LIST</h2>
            <h1 class="text-white font-poppins font-black leading-[1] text-[8vw]">CATEGORIES LIST</h1>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class=" h-screen my-11 ">

    <!-- success message -->
    <div class="fixed absolute bottom-20 right-10 bg-green-500 rounded-md px-8 py-3 text-white" v-if="success">

      Category Deleted successfully
    </div>


    <div class="flex flex-col max-w-4xl rounded overflow-hidden shadow-lg mt-16 ml-auto mr-auto p-5 my-40 ">
      <table class="min-w-full">
        <thead>
          <tr>
            <th class="border px-6 py-3 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase">
              ID
            </th>
            <th class="border px-6 py-3 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase">
              Name
            </th>
            <th class="border px-6 py-3 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase">
              Action
            </th>

          </tr>
        </thead>
        <tbody class="bg-white">

          <tr v-for="(category, index) in categories" :key="category.id">
            <td class="border px-6 py-4 text-left">
              {{ index + 1 }}
            </td>
            <td class="border px-6 py-4 text-left">
              {{ category.name }}
            </td>
            <td class="border px-6 py-4 text-left">
              <router-link
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-2"
                :to="{ name: 'EditCategories', params: { id: category.id } }">Edit</router-link>
              <input type="button" value="Delete" @click="destroy(category.id)"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-2" />
            </td>

          </tr>


        </tbody>
      </table>




      <div class=" font-bold text-sm text-blue-500 hover:text-blue-800 text-center mt-8 ">
        <router-link :to="{ name: 'CreateCategories' }">Create Categories<span>&#8594;</span></router-link>
      </div>
    </div>



  </div>
</template>
  
<script>
export default {
  data() {
    return {
      categories: [],
      success: false,
    };
  },

  methods: {
    destroy(id) {
      axios
        .delete("/api/categories/" + id)
        .then((response) => {
          this.success = true;
          setInterval(() => {
            this.success = false;
          }, 2500);
          this.fetchCategories();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    fetchCategories() {
      axios
        .get("/api/categories")
        .then((response) => (this.categories = response.data))
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    this.fetchCategories();
  },
};
</script>
  
