<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../stylesheets/tailwindOutput.css">
  <title>login</title>
</head>

<body>

  <!-- navbar-container -->
  <navbar id="navbar" class="">
    <nav class="relative px-4 py-4 flex justify-between items-center bg-white">
      <!-- logo image -->
      <a class="text-3xl font-bold leading-none" href="#">
        <img src="../images/logoEvent.png" class="h-24" alt="logo">
      </a>
      <div class="lg:hidden">
        <button class="navbar-burger flex items-center text-blue-600 p-3">
          <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Mobile menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
          </svg>
        </button>
      </div>
      <ul
        class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <li><a class="text-sm text-gray-400 hover:text-gray-500" href="#">Home</a></li>
        <li class="text-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
          </svg>
        </li>
        <li><a class="text-sm text-gray-400 hover:text-gray-500" href="#">Contact</a></li>
      </ul>
      <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200"
        href="#">Sign In</a>
      <a class="hidden lg:inline-block py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-sm text-white font-bold rounded-xl transition duration-200"
        href="#">Sign up</a>
    </nav>
    <div class="navbar-menu relative z-50 hidden">
      <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
      <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
        <div class="flex items-center mb-8">
          <!-- logo image -->
          <a class="mr-auto text-3xl font-bold leading-none" href="#">
            <img src="../images/logoEvent.png" class="h-24" alt="logo">
          </a>
          <button class="navbar-close">
            <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
        <div>
          <ul>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                href="#">Home</a>
            </li>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                href="#">Contact</a>
            </li>
          </ul>
        </div>
        <div class="mt-auto">
          <div class="pt-6">
            <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl"
              href="#">Sign in</a>
            <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-indigo-600 hover:bg-indigo-700  rounded-xl"
              href="#">Sign Up</a>
          </div>
          <p class="my-4 text-xs text-center text-gray-400">
            <span>Copyright © 2022</span>
          </p>
        </div>
      </nav>
    </div>
  </navbar>


  <!-- login section start -->
  <section class="px-4 mx-auto max-w-screen-xl sm:px-6 lg:px-8">
    <div class="max-w-lg mx-auto">
      <h1 class="text-2xl font-bold text-center text-indigo-600 sm:text-3xl">Get started today</h1>

      <p class="max-w-md mx-auto mt-4 text-center text-gray-500">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati sunt dolores deleniti inventore quaerat
        mollitia?
      </p>

      <form action="" class="p-8 mt-6 mb-0 rounded-lg shadow-2xl space-y-4">
        <p class="text-lg font-medium">Sign in to your account</p>

        <div>
          <label for="email" class="text-sm font-medium">Email</label>

          <div class="relative mt-1">
            <input type="email" id="email" class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"
              placeholder="Enter email" />

          </div>
        </div>

        <div>
          <label for="password" class="text-sm font-medium">Password</label>

          <div class="relative mt-1">
            <input type="password" id="password" class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"
              placeholder="Enter password" />

          </div>
        </div>

        <button type="submit" class="block w-full px-5 py-3 text-sm font-medium text-white bg-indigo-600 rounded-lg">
          Sign in
        </button>

        <p class="text-sm text-center text-gray-500">
          No account?
<<<<<<< HEAD:frontend/auth/login.blade.php
        <a class="underline" href="{{route('auth.singups')}}">Sign up</a>
=======
          <a class="underline" href="./signup.html">Sign up</a>
>>>>>>> 100851dea0cfbe6211f6226faa4ef6b8074eb7cd:frontend/auth/login.html
        </p>
      </form>
    </div>
  </section>
  <!-- login section end -->

  <script type="module" src="../js/nav-toggle.js"></script>
</body>

</html>
