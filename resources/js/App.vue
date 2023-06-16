<template>
  <div id="wrapper">



      <div class="container mx-auto absolute z-40 inset-x-0">
        <nav class="flex justify-between items-center py-10">
          <div class="flex items-center">
            <img class="h-8 mr-2" src="images/BlogJect.png" alt="Logo">

          </div>
          <div class="flex items-center justify-end flex-grow">
            <div class="hidden md:flex items-center space-x-4">
              <router-link
                class="text-gray-600 hover:text-gray-800 px-4 font-poppins font-400 text-lg text-white hover:text-yellow-400"
                :to="{ name: 'Home' }">Home</router-link>
              <router-link
                class="text-gray-600 hover:text-gray-800 px-4 font-poppins font-400 text-lg text-white hover:text-yellow-400"
                :to="{ name: 'Articles' }">Articles</router-link>
              <router-link
                class="text-gray-600 hover:text-gray-800 px-4 font-poppins font-400 text-lg text-white hover:text-yellow-400"
                :to="{ name: 'About' }">About</router-link>
              <router-link
                class="text-gray-600 hover:text-gray-800 px-4 font-poppins font-400 text-lg text-white hover:text-yellow-400"
                :to="{ name: 'Contact' }">Contact
                Us</router-link>
              <a 
                class="text-gray-600 hover:text-gray-800 px-4 font-poppins font-400 text-lg text-white hover:text-yellow-400"
                @click="openLoginModal" v-if="!loggedIn">Login</a>
              <router-link to="#"
                class="bg-white hover:bg-yellow-400 font-poppins font-400 text-lg text-yellow-500 hover:text-white shadow-sm px-4 py-2 rounded"
                @click="openRegisterModal" v-if="!loggedIn">Sign Up</router-link>
              <router-link
                class="bg-white hover:bg-yellow-400 font-poppins font-400 text-lg text-yellow-500 hover:text-white shadow-sm px-4 py-2 rounded"
                v-if="loggedIn" :to="{ name: 'Dashboard' }">Dashboard</router-link>

            </div>
          </div>
        </nav>
      </div>
  
    <main>
      <!-- render components depending on the page visited -->

      <router-view @update-sidebar="updateSidebar" 
        :key="$route.path"></router-view>
    </main>



    <!-- Login Modal  -->

    <div class="fixed inset-0 flex items-center justify-center z-50" v-if="showLoginModal">
      <div class="fixed inset-0 bg-gray-900 opacity-50"></div>
      <div class="bg-white p-8 rounded shadow-lg w-2/3 flex relative">
        <div class="w-3/5">
          <img src="images/photo-1598024055266-e772a5f8c128.webp" alt="Image" class="w-full h-auto">
        </div>
        <div class="w-2/5 pl-8 flex flex-col justify-center">
          <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" @click="closeLoginModal">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
          <h2 class="text-3xl font-bold text-gray-800 mb-5 text-center">Log In</h2>
          <form @submit.prevent="submitLogin">
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
              <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                id="email" v-model="fields.email" type="email" placeholder="Enter your email">
              <span v-if="errors.email" class="error">{{ errors.email[0] }}</span>
            </div>
            <div class="mb-6">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
              <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                id="password" v-model="fields.password" type="password" placeholder="Enter your password">
              <span v-if="errors.password" class="error">{{ errors.password[0] }}</span>
            </div>
            <div class="flex items-center justify-between">
              <button
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">Log In</button>
              <a class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-blugraye-800"
                href="#">Forgot Password?</a>
            </div>
          </form>
          <div class="text-center mt-5">
            <p class="text-gray-600">Don't have an account? <a class="text-gray-500 hover:text-gray-800 font-bold"
                href="#">Sign Up</a></p>
          </div>
        </div>
      </div>
    </div>


    <!-- Register Modal  -->

    <div class="fixed inset-0 flex items-center justify-center z-50" v-if="showRegisterModal">
      <div class="fixed inset-0 bg-gray-900 opacity-50"></div>
      <div class="bg-white p-8 rounded shadow-lg w-2/3 flex relative">
        <div class="w-3/5">
          <img src="images/photo-1515378960530-7c0da6231fb1.webp" alt="Image" class="w-full h-full bg-cover">
        </div>
        <div class="w-2/5 pl-8 flex flex-col justify-center">
          <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" @click="closeRegisterModal">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
          <h2 class="text-3xl font-bold text-gray-800 mb-5 text-center">Sign Up</h2>
          <form @submit.prevent="submitRegister">
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
              <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                id="name" v-model="fields.name" type="text" placeholder="Enter your Name">
              <span v-if="errors.name" class="error">{{ errors.name[0] }}</span>
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
              <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                id="email" type="email" placeholder="Enter your email" v-model="fields.email">
              <span v-if="errors.email" class="error">{{ errors.email[0] }}</span>
            </div>

            <div class="mb-6">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
              <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                id="password" type="password" placeholder="Enter your password" v-model="fields.password">
              <span v-if="errors.password" class="error">{{ errors.password[0] }}</span>
            </div>

            <div class="mb-6">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Confirm Password</label>
              <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                id="password_confirmation" v-model="fields.password_confirmation" type="password"
                placeholder="Enter Confirm password">
              <span v-if="errors.password" class="error">{{ errors.password[0] }}</span>
            </div>

            <div class="flex items-center justify-between">
              <button
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit" @click="login">Sign Up</button>

            </div>
          </form>
          <div class="text-center mt-5">
            <p class="text-gray-600">Already have an account? <a class="text-gray-500 hover:text-gray-800 font-bold"
                href="#">Sign In</a></p>
          </div>
        </div>
      </div>
    </div>








    <!-- Menu Button -->
    <div class="menuButton" @click="ShowOverlay">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <!-- main -->




  </div>

  <footer class="bottom-0 left-0 right-0 bg-gray-300 py-4">
        <div class="container mx-auto text-center">
          <p class="text-gray-600">© 2023 BLOGJECT. All rights reserved.</p>
        </div>
      </footer>
</template>
<script>
export default {
  data() {
    return {
      overlayVisibility: false,
      loggedIn: false,
      editSuccess: false,
      showLoginModal: false,
      showRegisterModal: false,
      fields: {},
      errors: {},
    };
  },
  methods: {
    openLoginModal() {
      this.showLoginModal = true;
    },
    closeLoginModal() {
      this.showLoginModal = false;
    },
    openRegisterModal() {
      this.showRegisterModal = true;
    },
    closeRegisterModal() {
      this.showRegisterModal = false;
    },
    submitLogin() {
      axios
        .post("/api/login", this.fields)
        .then(() => {
          this.$router.push({ name: "Dashboard" });
          localStorage.setItem("authenticated", "true");
          this.closeLoginModal();
          this.updateSidebar();
          this.showHeader();
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
    submitRegister() {
      console.log(this.fields);
      axios
        .post("/api/register", this.fields)
        .then(() => {
          this.$router.push({ name: "Dashboard" });
          localStorage.setItem("authenticated", "true");
          this.closeRegisterModal();
          this.updateSidebar();
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
    updateSidebar() {
      this.loggedIn = !this.loggedIn;
    },

  },

  mounted() {
    if (localStorage.getItem("authenticated")) {
      this.loggedIn = true;
    } else {
      this.loggedIn = false;
    }
  },
};
</script>
