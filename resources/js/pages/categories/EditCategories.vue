<template>

<div class="w-full bg-center bg-no-repeat bg-cover overflow-hidden">
    <div class="bg-gradient-to-tr h-full z-10 opacity-80"
      style="background-image: linear-gradient(45deg, #f200ff 0%, #ffba42 100%);">
      <div class="container mx-auto h-full">
        <div class="h-[80%] flex items-center py-10">
          <div class="mt-[10%]">
            <h2 class="text-white font-poppins font-normal text-[18px] ml-3">BLOGJECT > EDIT CATEGORIES</h2>
            <h1 class="text-white font-poppins font-black leading-[1] text-[8vw]">EDIT CATEGORIES</h1>
          </div>
        </div>
      </div>
    </div>
  </div>




<!-- success message -->
<div class="absolute bottom-20 right-10 bg-green-500 rounded-md px-8 py-3 text-white" v-if="success">
  <box-icon name='check'></box-icon>
  <i class='bx bx-check'></i>
  Category edited successfully
</div>


<div class="container max-w-5xl p-24 m-auto">
<h1 class="text-4xl font-bold mx-auto text-center p-12">Edit Category!</h1>
<form @submit.prevent="submit" class="bg-white shadow-md rounded px-8 py-6 mx-auto mt-auto">
<div class="mb-4">
<label class="block text-gray-700 text-sm font-bold mb-2" for="username">
  Category Name
</label>
<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="name" v-model="field.name" placeholder="Enter your category Name">
<span v-if="errors.name" class="error">{{ errors.name[0] }}</span>
</div>

<div class="flex items-center justify-between">
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Submit">
Update
</button>
<router-link :to="{ name: 'CategoriesList' }" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
  Categories List <span>&#8594;</span>
</router-link>
</div>
</form>
</div>







  </template>
  
  <script>
  export default {
    props: ["id"],
    data() {
      return {
        field: {},
        errors: {},
        success: false,
      };
    },
  
    methods: {
      submit() {
        axios
          .put("/api/categories/" + this.id, this.field)
          .then(() => {
            this.field = {};
            this.errors = {};
            this.success = true;
  
            setInterval(() => {
              this.success = false;
              this.$router.push({ name: "CategoriesList" });
            }, 2500);
          })
          .catch((error) => {
            this.errors = error.response.data.errors;
          });
      },
    },
  
    mounted() {
      axios
        .get("/api/categories/" + this.id)
        .then((response) => (this.field = response.data))
        .catch((error) => {
          console.log(error);
        });
    },
  };
  </script>
  
  <style scoped>
  #create-categories {
    background-color: #f3f4f6;
    height: 90vh;
    padding: 50px;
  }
  </style>