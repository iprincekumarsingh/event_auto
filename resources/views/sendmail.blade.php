<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/output.css')}}">
    {{-- <title>login</title> --}}
</head>

<body>

    <section class="px-4 py-16 mx-auto max-w-screen-xl sm:px-6 lg:px-8">
        <div class="max-w-lg mx-auto">
            <h1 class="text-2xl font-bold text-center text-indigo-600 sm:text-3xl">Send Mail</h1>
            <form action="{{route('add.mail')}}" method="POST" class="p-8 mt-6 mb-0 rounded-lg shadow-2xl space-y-4">
                @csrf
                {{-- <p class="text-lg font-medium">Sign in to your account</p> --}}

                <div>
                    {{-- <label for="email" class="text-sm font-medium">Username</label> --}}

                    <div class="relative mt-1">
                        <input required name="pay_id" type="text" id="text"
                            class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"
                            placeholder="Payment Id" />

                    </div>
                    <div class="relative mt-1">
                        <input required name="name" type="text" id="email"
                            class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"
                            placeholder="Name " />

                    </div>
                    <div class="relative mt-1">
                        <input required name="email" type="text" id="email"
                            class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"
                            placeholder="Email" />

                    </div>
                    <div class="relative mt-1">
                        <input required name="phone" type="text" id="email"
                            class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"
                            placeholder="Phone" />

                    </div>
                </div>


                <button type="submit"
                    class="block w-full px-5 py-3 text-sm font-medium text-white bg-indigo-600 rounded-lg">
                   SEND
                </button>
               @if (session()->has('error'))

               <span   style="color:red;font-weight:400;text-align:center" class="invaid-feedback" role="alert">
                   <strong>{{session('error')}}</strong>
               </span>
               @endif
            {{-- @enderror --}}

                {{-- <p class="text-sm text-center text-gray-500">
                    No account?
                    <a class="underline" href="{{route('auth.singup')}}">Sign up</a>
                </p> --}}
            </form>
        </div>
    </section>

</body>

</html>
