<template>
  <div class="h-screen w-full bg-center bg-no-repeat bg-cover overflow-hidden mb-20"
    style="background-image: url('images/photo-1543269865-0a740d43b90c.webp');">
    <div class="bg-gradient-to-tr h-full z-10 opacity-80"
      style="background-image: linear-gradient(45deg, #f200ff 0%, #ffba42 100%);">
      <div class="container mx-auto h-full">

        <div class="h-[80%] flex items-center">
          <div class="mt-[10%]">
            <h2 class="text-white font-poppins font-normal text-[18px] ml-3">Hello! Welcome to</h2>
            <h1 class="text-white font-poppins font-black leading-[1] text-[9vw]">BLOGJECT BLOG</h1>

            <div class="flex flex-row mt-6">
              <div class="w-7/12">
                <div class="p-4">
                  <p class="text-white leading-6 font-poppins font-normal text-[22px]">Welcome to our
                    blog site, your go-to destination for a wealth of informative content. From
                    practical advice to insightful perspectives, we offer a diverse range of topics
                    catered to your interests. Join us on this enriching journey of discovery and
                    empower yourself with knowledge.</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
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
</template>
<script>
export default {
  emits: ["updateSidebar"],
  data() {
    return {
      headerVisibility: false,
      posts: [],
    };
  },

  mounted() {
    axios
      .get("/api/home-posts")
      .then((response) => (this.posts = response.data.data))
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>