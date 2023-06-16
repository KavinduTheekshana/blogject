<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Login</title>
</head>
<body class="bg-gray-100">
  <div class="flex flex-col md:flex-row h-screen">
    <div class="md:w-2/3 bg-gray-800 py-20 px-10 text-center md:text-left">
      <img class="w-64 mx-auto md:mx-0" src="login-image.jpg" alt="Login Image">
      <h1 class="text-4xl font-bold text-white mt-5">Welcome Back!</h1>
      <p class="text-gray-300 mt-2">Log in to your account</p>
    </div>
    <div class="md:w-1/3 py-20 px-20 flex items-center">
      <form class="max-w-lg mx-auto w-full">
        <h2 class="text-3xl font-bold text-gray-800 mb-5 text-center">Log In</h2>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
          <input class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500" id="email" type="email" placeholder="Enter your email">
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
          <input class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500" id="password" type="password" placeholder="Enter your password">
        </div>
        <div class="flex items-center justify-between">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">Log In</button>
          <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">Forgot Password?</a>
        </div>
        <div class="text-center mt-5">
          <p class="text-gray-600">Don't have an account? <a class="text-blue-500 hover:text-blue-800 font-bold" href="#">Sign Up</a></p>
        </div>
      </form>
    </div>
  </div>
</body>
</html>

