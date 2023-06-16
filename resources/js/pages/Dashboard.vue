<template>
    <div class="w-full bg-center bg-no-repeat bg-cover overflow-hidden">
        <div class="bg-gradient-to-tr h-full z-10 opacity-80"
            style="background-image: linear-gradient(45deg, #f200ff 0%, #ffba42 100%);">
            <div class="container mx-auto h-full">

                <div class="h-[80%] flex items-center py-10">
                    <div class="mt-[10%]">
                        <h2 class="text-white font-poppins font-normal text-[18px] ml-3">BLOGJECT > DASHBOARD</h2>
                        <h1 class="text-white font-poppins font-black leading-[1] text-[9vw]">DASHBOARD</h1>

                        <div class="flex flex-row mt-6">
                            <div class="w-7/12">
                                <div>
                                    <p class="text-white leading-6 font-poppins font-normal text-[22px]">
                                        Hi {{ name }} !
                                    </p>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>








    <div id="backend-view">



        <div
            class="flex flex-col max-w-sm rounded overflow-hidden shadow-lg mt-16 ml-auto mr-auto max-w-lg p-5 my-20 text-center">

            <h2 class="font-bold text-xl mb-2">Menu</h2>
            <router-link :to="{ name: 'CreateCategories' }"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 my-2 rounded">
                Create Categories
            </router-link>

            <router-link :to="{ name: 'CategoriesList' }"
                class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 my-2 rounded">
                Categories List
            </router-link>

            <router-link :to="{ name: 'CreatePosts' }"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 my-2 rounded">
                Create Posts
            </router-link>

            <router-link :to="{ name: 'DashboardPostsList' }"
                class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 my-2 rounded">
                Posts List
            </router-link>

            <a @click="logout" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 my-2 rounded">
                Log Out
            </a>

        </div>
    </div>
</template>

<script>
import heade from '../App.vue';


export default {
    data() {
        return {
            headerStyle: true,
            name: "",
        };
    },
    mounted() {

        axios
            .get("/api/user")
            .then((response) => (this.name = response.data.name))
            .catch((error) => {
                if (error.response.status === 401) {
                    this.$emit("updateSidebar");
                    localStorage.removeItem("authenticated");
                    this.$router.push({ name: "Login" });
                }
            });
    },
    methods: {
        logout() {
            axios
                .post("/api/logout")
                .then((response) => {
                    this.$router.push({ name: "Home" });
                    localStorage.removeItem("authenticated");
                    this.$emit("updateSidebar");
                })
                .catch((error) => console.log(error));
        },
    },
};
</script>

<style scoped>
/* dashboard */
/* #backend-view {
    text-align: center;
    background-color: #f3f4f6;
    height: 100vh;
    padding-top: 15vh;
} */

.logout {
    position: absolute;
    top: 30px;
    right: 40px;
}

.heading {
    margin-bottom: 5px;
}

.links {
    margin-top: 30px;
    margin-left: auto;
    margin-right: auto;
    background: #ffffff;
    max-width: 500px;
    padding: 15px;
    border-radius: 15px;
}

.links ul {
    list-style: none;
}

.links a {
    all: revert;
    font-size: 26px;
    display: inline-block;
    margin: 10px 0;
}</style>
