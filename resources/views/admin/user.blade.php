@include('admin.layout.header')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Users
        </h2>
        {{-- <div class="max-w-lg mx-auto"> --}}
        {{-- <h1 class="text-2xl font-bold text-center text-indigo-600 sm:text-3xl">Get started today</h1> --}}
        <form action="{{ route('auth.login') }}" method="POST" class="p-8 mt-6 mb-0 rounded-lg shadow-2xl space-y-4">
            @csrf
            {{-- <p class="text-lg font-medium">Sign in to your account</p> --}}

            <div>
                <label for="email" class="text-sm font-medium">Search by email</label>

                <div class="relative mt-10 flex">
                    <input  style="border: 1px solid black;margin:2px" required name="seach" type="text" id="text"
                        class="w-full p-4 pr-12 text-l border-black-200 rounded-lg shadow-sm"
                        placeholder="Search Email" />

                    <button style="border: 1px solid black" type="submit"
                        class="block w-full px-5 py-3 text-sm font-medium text-black bg-indigo-600 rounded-lg">
                        Sign in
                    </button>

                </div>
            </div>




        </form>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">

            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Sr.no</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php
                    $sr = 0;

                    ?>
                    @foreach ($user as $user)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $sr + 1 }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->

                                    <div>
                                        <p class="font-semibold">{{ $user->name }}</p>

                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $user->email }}
                            </td>

                            {{-- <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a style="padding: 5px 30px;border:1px solid black;border-radius:5px"
                                        href="">View</a>
                                </div> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
    </div>
</main>
</div>
</div>
</body>

</html>
