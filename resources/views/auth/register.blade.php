<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/output.css')}}">
    <title>signup</title>
</head>

<body>

    <section class="px-4 py-16 mx-auto max-w-screen-xl sm:px-6 lg:px-8">
        <div class="max-w-lg mx-auto">
            <h1 class="text-2xl font-bold text-center text-indigo-600 sm:text-3xl">
                Sign Up
            </h1>

            <form action="{{route('auth.register')}}" method="POST"
                class="p-8 mt-6 mb-0 rounded-lg shadow-2xl space-y-4">
                @csrf
                <p class="text-lg font-medium">Sign up for your account</p>
                <div class="col-span-3">
                    <label class="block mb-1 text-sm " for="name">
                        Name
                    </label>

                    <input name="name" class="rounded-lg shadow-sm border-gray-200 w-full text-sm p-2.5" type="text"
                        id="name" />
                    @error('name')
                    <span style="color:red" class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-span-6">
                    <label class="block mb-1 text-sm " for="email">
                        Email
                    </label>

                    <input name="email" class="rounded-lg shadow-sm border-gray-200 w-full text-sm p-2.5" type="email"
                        id="email" />
                    @error('email')
                    <span style="color:red" class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-span-6">
                    <label class="block mb-1 text-sm " for="phone">
                        Password
                    </label>

                    <input name="password" class="rounded-lg shadow-sm border-gray-200 w-full text-sm p-2.5" type="tel"
                        id="phone" />
                        @error('password')
                        <span style="color:red" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <button type="submit"
                    class="block w-full px-5 py-3 text-sm font-medium text-white bg-indigo-600 rounded-lg">
                    Sign up
                </button>

                <p class="text-sm text-center text-gray-500 capitalize">
                    already have an account?
                    <a class="underline" href="{{route('auth.index')}}">log in</a>
                </p>
            </form>
        </div>
    </section>

</body>

</html>
