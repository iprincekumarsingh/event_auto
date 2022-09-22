<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/output.css') }}">
    <title>Home</title>
</head>

<body class=" px-6 bg-fixed bg-cover bg-no-repeat">
    <!-- navbar-container -->
    <navbar id="navbar" class="">
        <nav class="relative px-8 lg:px-8 py-4 flex justify-between items-center bg-white -mx-8">
            <!-- logo image -->
            <a class="text-3xl font-bold leading-none" href="#">
                <img src="{{ url('/img/logo.png') }}" class="h-24" alt="logo">
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
                <li><a class="text-sm text-gray-400 hover:text-black-500" href="{{ url('/') }}">Home</a></li>
                <li class="text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </li>
                <li><a class="text-sm text-black-400 hover:text-black-500" href="{{url('contact-us')}}">Contact</a></li>
                <li class="text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </li>
                <li><a class="text-sm text-gray-400 hover:text-gray-500" href="{{url('pick')}}">Pick up Point</a></li>
            </ul>
            @if (session()->has('isLoggedIn'))
            <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200"
                href="{{ url('/logout')}}">Logout</a>
            @if (session('role')=='1')
            <a class="hidden lg:inline-block py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-sm text-white font-bold rounded-xl transition duration-200"
                href="{{ url('/admin/dashboard') }}"
                style=" padding: 15px 30px;border: none;background: none;border: 1px solid;color: black;border-radius:
                5px;">Admin
                Dashboard</a>
            @else
            <a class="hidden lg:inline-block py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-sm text-white font-bold rounded-xl transition duration-200"
                href="{{ url('/dashboard') }}"
                style="padding: 15px 30px;border: none;background: none;border: 1px solid;color: black;border-radius: 5px;">Dashboard</a>

            @endif

            @else
            <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200"
                href="{{ route('auth.index') }}">Sign In</a>
            <a class="hidden lg:inline-block py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-sm text-white font-bold rounded-xl transition duration-200"
                href="{{ route('auth.singup') }}"
                style="padding: 15px 30px;border: none;background: none;border: 1px solid;color: black;border-radius: 5px;">Sign
                up</a>

            @endif

        </nav>
        <div class="navbar-menu relative z-50 hidden">
            <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
            <nav
                class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
                <div class="flex items-center mb-8">
                    <!-- logo image -->
                    <a class="mr-auto text-3xl font-bold leading-none" href="#">
                        <img src="{{url('/img/logo.png')}}" class="h-24" alt="logo">
                    </a>
                    <button class="navbar-close">
                        <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div>
                    <ul>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                                href="{{url('/')}}">Home</a>
                        </li>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                                href="{{url('contact-us')}}">Contact</a>
                        </li>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                                href="{{url('pick')}}">Pick Up Point</a>
                        </li>
                        @if (session('isLoggedIn'))

                        @if (session()->has('role') !='0')
                        @else

                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                                href="{{url('/dashboard')}}">Dashboard</a>
                        </li>


                        @endif
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                                href="#">Logout</a>
                        </li>
                        @else
                        @endif
                    </ul>
                </div>
                @if (session()->has('IsLoggedIn'))
                <div class="mt-auto">
                    <div class="pt-6">
                        <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl"
                            href="{{ route('auth.index') }}">Sign in</a>
                        <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-indigo-600 hover:bg-indigo-700  rounded-xl"
                            href="{{ route('auth.singup') }}">Sign Up</a>
                    </div>
                    <p class="my-4 text-xs text-center text-gray-400">
                        <span>Copyright © 2022</span>
                    </p>
                </div>

                @endif
            </nav>
        </div>
    </navbar>
