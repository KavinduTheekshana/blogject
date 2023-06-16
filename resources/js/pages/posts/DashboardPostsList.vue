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


  <div class="my-11 ">
    <div class="fixed absolute bottom-20 right-10 bg-green-500 rounded-md px-8 py-3 text-white" v-if="success">
      Post Deleted successfully
    </div>

    <div class="fixed absolute bottom-20 right-10 bg-green-500 rounded-md px-8 py-3 text-white"  v-if="editSuccess">
      Post edited successfully
    </div>


    <div class="flex flex-col max-w-4xl rounded overflow-hidden shadow-lg mt-16 ml-auto mr-auto p-5 my-40 ">
      <table class="min-w-full">
        <thead>
          <tr>
            <th class="border px-6 py-3 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase">
              ID
            </th>
            <th class="border px-6 py-3 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase">
              Title
            </th>
            <th class="border px-6 py-3 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase">
              Action
            </th>

          </tr>
        </thead>
        <tbody class="bg-white">

          <tr v-for="(post, index) in posts" :key="post.id">
            <td class="border px-6 py-4 text-left">
              {{ index + 1 }}
            </td>
            <td class="border px-6 py-4 text-left">
              {{ post.title }}
            </td>
            <td class="border px-6 py-4 text-left">
              <router-link
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-2"
                :to="{ name: 'EditPosts', params: { slug: post.slug } }">Edit</router-link>
              <input type="button" value="Delete" @click="destroy(post.slug)"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-2" />
            </td>

          </tr>


        </tbody>
      </table>




      <div class=" font-bold text-sm text-blue-500 hover:text-blue-800 text-center mt-8 ">
        <router-link :to="{ name: 'CreatePosts' }">Create post<span>&#8594;</span></router-link>
      </div>
    </div>





  </div>
</template>
<script>
export default {
  props: ["editSuccess"],
  emits: ["updateSidebar"],
  data() {
    return {
      posts: [],
      success: false,
    };
  },
  methods: {
    destroy(slug) {
      axios
        .delete(`/api/posts/${slug}`)
        .then(() => {
          this.fetchPosts();
          this.success = true;
          setTimeout(() => {
            this.success = false;
          }, 2500);
        })
        .catch((error) => {
          console.log(error.response.data);
        });
    },

    fetchPosts() {
      axios
        .get("/api/dashboard-posts")
        .then((response) => (this.posts = response.data.data))
        .catch((error) => {
          console.log(error);
        });
    },
  },

  mounted() {
    this.fetchPosts();
  },
};
</script>

<style scoped >
.categories-list {
  min-height: 100vh;
  background: #fff;
}

.categories-list h1 {
  font-weight: 300;
  padding: 50px 0 30px 0;
  text-align: center;
}

.categories-list .item {
  display: flex;
  justify-content: right;
  align-items: center;
  max-width: 300px;
  margin: 0 auto !important;
}

.categories-list .item p {
  font-size: 16px;
}

.categories-list .item p,
.categories-list .item div,
.categories-list .item {
  margin: 15px 8px;
}

.categories ul li {
  list-style: none;
  background-color: #494949;
  margin: 20px 5px;

  border-radius: 15px;
}

.categories ul {
  display: flex;
  justify-content: center;
}

.categories a {
  color: white;
  padding: 10px 20px;
  display: inline-block;
}

.create-categories a,
.index-categories a {
  all: revert;
  margin: 20px 0;
  display: inline-block;
  text-decoration: none;
}

.create-categories a span,
.index-categories a span {
  font-size: 22px;
}

.index-categories {
  text-align: center;
}
</style>