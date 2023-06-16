<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>
       
    </style>
</head>

<body class="bg-white">
    <div id="app"></div>


    {{-- <div class="container mx-auto m-40">
        <div class="col-span-12">
            <div class="case">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-12">
                    <div class="col-span-1 md:col-span-6 lg:col-span-6 xl:col-span-8 flex p-8">
                        <a href="blog-single.html" class="w-full h-[500px] mb-3 mb-md-0 bg-cover bg-no-repeat"
                            style="background-image: url(images/istockphoto-621581680-612x612.jpg);"></a>
                    </div>
                    <div class="col-span-1 md:col-span-6 lg:col-span-6 xl:col-span-4 flex p-8">
                        <div class="w-full pl-md-3">
                            <span
                                class="text-gray-500 font-poppins font-medium text-[16px] leading-[1.3] block">Illustration</span>
                            <h2 class="text-2xl font-bold">
                                <a class="text-black font-poppins font-bold text-[40px] leading-[1.3]"
                                    href="blog-single.html">Build a website in minutes with Adobe Templates</a>
                            </h2>

                            <div class="mt-2">
                                <p class="mb-0">
                                <p>23 mins ago</p>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}


    <footer class="bottom-0 left-0 right-0 bg-gray-300 py-4">
        <div class="container mx-auto text-center">
          <p class="text-gray-600">© {{ now()->year }} BLOGJECT. All rights reserved.</p>
        </div>
      </footer>
      

</body>

</html> 


