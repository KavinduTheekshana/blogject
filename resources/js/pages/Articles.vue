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



  <div>
    <h2 class="header-title">All Blog Posts</h2>
    <div class="searchbar">
      <form action="">
        <input
          type="text"
          placeholder="Search..."
          name="search"
          v-model="title"
        />

        <button type="submit">
          <i class="fa fa-search"></i>
        </button>
      </form>
    </div>
    <div class="categories">
      <ul>
        <li v-for="category in categories" :key="category.id">
          <a href="#" @click="filterByCategory(category.name)">{{
            category.name
          }}</a>
        </li>
      </ul>
    </div>
    <section class="cards-blog latest-blog">
      <div class="card-blog-content" v-for="post in posts" :key="post.id">
        <img :src="post.imagePath" alt="" />
        <p>
          {{ post.created_at }}
          <span style="float: right">Written By {{ post.user }}</span>
        </p>
        <h4 style="font-weight: bolder">
          <a href="single-blog.html"></a>
          <router-link
            :to="{
              name: 'SingleBlog',
              params: { slug: post.slug },
            }"
            >{{ post.title }}</router-link
          >
        </h4>
      </div>
    </section>
    <h3 v-if="!posts.length">Sorry, no match was found!</h3>
    <!-- pagination -->
    <!-- <div class="pagination" id="pagination">
      <a href="">&laquo;</a>
      <a class="active" href="">1</a>
      <a href="">2</a>
      <a href="">3</a>
      <a href="">4</a>
      <a href="">5</a>
      <a href="">&raquo;</a>
    </div> -->

    <div class="pagination" id="pagination">
      <a
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
<style scoped>
h3 {
  font-size: 30px;
  text-align: center;
  margin: 50px 0;
  color: #fff;
}

.disabled {
  pointer-events: none;
}
</style>