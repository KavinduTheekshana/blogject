<template>

   
    <div class="h-screen w-full bg-center bg-no-repeat bg-cover overflow-hidden"
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