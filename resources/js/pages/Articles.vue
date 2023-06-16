<template>

<div class="w-full bg-center bg-no-repeat bg-cover overflow-hidden"
      style="background-image: url('images/photo-1543269865-0a740d43b90c.webp');">
      <div class="bg-gradient-to-tr h-full z-10 opacity-80"
        style="background-image: linear-gradient(45deg, #f200ff 0%, #ffba42 100%);">
        <div class="container mx-auto h-full">
       
          <div class="h-[80%] flex items-center py-40">
            <div class="mt-[10%]">
              <h2 class="text-white font-poppins font-normal text-[18px] ml-3">BLOGJECT > ARTICLES</h2>
              <h1 class="text-white font-poppins font-black leading-[1] text-[9vw]">ARTICLES</h1>
            </div>

          </div>
        </div>
      </div>
    </div>



  <div class="container mx-auto my-28">
    <h2 class="text-center font-poppins font-bold text-[4vw] my-20">All Blog Posts</h2>
    <div class="container px-20 mx-auto justify-center flex my-5">
      <form action="" class="flex">
        <input
        class="shadow appearance-none border rounded w-[400px] max-w-4xl py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          type="text"
          placeholder="Search..."
          name="search"
          v-model="title"
        />

        <button type="submit" class="mx-5">
          <i class="fa fa-search"></i>
        </button>
      </form>
    </div>
    <div class="container px-20 mx-auto justify-center flex mb-20">
      <ul class="flex">
        <li class="bg-gray-100 hover:bg-yellow-400 font-poppins font-400 text-lg text-black hover:text-white shadow-sm px-4 py-2 rounded w-auto m-4" v-for="category in categories" :key="category.id">
          <a href="#"  @click="filterByCategory(category.name)">{{
            category.name
          }}</a>
        </li>
      </ul>
    </div>


    <div class="container mx-auto" v-for="post in posts" :key="post.id">
    <div class="col-span-12 px-20">
      <div class="case">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-12">
          <div class="col-span-1 md:col-span-6 lg:col-span-6 xl:col-span-8 flex px-8 py-4">
            <img :src="post.imagePath" class="w-full h-[500px] mb-3 mb-md-0 bg-cover bg-no-repeat" alt="">
          </div>
          <div class="col-span-1 md:col-span-6 lg:col-span-6 xl:col-span-4 flex p-4">
            <div class="w-full pl-md-3">
              <span class="text-gray-500 font-poppins font-medium text-[16px] leading-[1.3] block">{{ post.category_name
              }}</span>
              <h2 class="text-2xl font-bold">
                <router-link :to="{
                    name: 'SingleBlog',
                    params: { slug: post.slug },
                  }" class="text-black font-poppins font-bold text-[40px] leading-[1.3]" href="blog-single.html">{{
    post.title
  }}</router-link>
              </h2>
              <div class="mt-2">
                <p class="mb-0">
                <p>{{ post.created_at }}</p>
                <span class="text-gray-500">Written By {{ post.user }}</span>

                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <h3 class="flex text-center justify-center" v-if="!posts.length">Sorry, no match was found!</h3>


    <div class="m-8 justify-center text-center mx-auto flex" id="pagination">
      <a class="px-2 py-2"
        href="#"
        v-for="(link, index) in links"
        :key="index"
        v-html="link.label"
        :class="{ active: link.active, disabled: !link.url }"
        @click="changePage(link)"
      ></a>
    </div>
  </div>
</template>
<script>
export default {
  emits: ["updateSidebar"],
  data() {
    return {
      posts: [],
      categories: [],
      title: "",
      links: [],
    };
  },

  methods: {
    filterByCategory(name) {
      axios
        .get("/api/posts", {
          params: {
            category: name,
          },
        })
        .then((response) => {
          this.posts = response.data.data;
          this.links = response.data.meta.links;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    changePage(link) {
      if (!link.url || link.active) {
        retun;
      }
      axios
        .get(link.url)
        .then((response) => {
          this.posts = response.data.data;
          this.links = response.data.meta.links;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },

  watch: {
    title() {
      axios
        .get("/api/posts", {
          params: {
            search: this.title,
          },
        })
        .then((response) => {
          this.posts = response.data.data;
          this.links = response.data.meta.links;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },

  mounted() {
    axios
      .get("/api/posts")
      .then((response) => {
        this.posts = response.data.data;
        console.log(response.data.meta.links);
        this.links = response.data.meta.links;
      })
      .catch((error) => {
        console.log(error);
      });

    axios
      .get("/api/categories")
      .then((response) => (this.categories = response.data))
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>
