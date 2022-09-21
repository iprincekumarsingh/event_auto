@include('layout.header')
<!-- Events section -->
<div class="mx-auto max-w-7xl b-white py-5 md:px-12 lg:px-24 ">
    <div class="">
        <h1
            class="text-3xl font-semibold md:gap-6 lg:text-4xl text-center mb-6 tracking-wider flex items-center justify-center">
            <span>
                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                <lord-icon src="https://cdn.lordicon.com/xxdqfhbi.json" trigger="hover" style="width:70px;height:70px">
                </lord-icon>
            </span>
            <span>
                <h3 class="animate-charcter text-5xl w-min md:w-fit">Booked Events</h3>
            </span>
        </h1>
    </div>

    <section class="container rounded-3xl shadw-xl mx-auto p-2 px-0">
        <section class="md:p- grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-10 capitalize">
            @foreach ($event as $events)

            <a href="{{url('event')}}/{{$events->event_name}}/{{$events->event_id}}">

                <article
                    class="min-h-116 bg-orange-600 max-w-xl w-full rounded-xl text-gray-100 bg-cover bg-center transform duration-500 hover:-translate-y-1 cursor-pointer"
                    style="background-image: url({{$events->feature_image}});">
                    <div class="bg-black bg-opacity-60 p-10 rounded-xl h-full">
                        <h1 class="mt-5 text-3xl text-gray-100 leading-snug  min-h-33">
                            Event Name - {{$events->event_name}}
                        </h1>
                        <div class="mt-20">
                            <span class="text-xl">Ticket price - </span>
                            <span class="font-bold text-xl">Rs {{$events->amount}}</span>
                        </div>
                        {{-- <div class="mt-16 flex justify-between ">
                            <span
                                class="p-3  border-2 border-gray-200 rounded-md text-base hover:bg-gray-200 hover:border-gray-200 cursor-pointer hover:text-black ">
                            {{-- {{date('m/d/Y', $events->created_at)}} | {{date('H:m A', $events->created_at)}} --}}
                            {{-- </span>
                        </div>  --}}
                    </div>
                </article>
            </a>
            @endforeach








        </section>
    </section>
</div>

<!-- footer -->
<footer class="p-4 bg-white md:p-8 lg:p-10">
    <div class="mx-auto max-w-screen-xl text-center flex flex-col md:flex-row justify-between">
        <div class="">
            <a href="#" class="flex justify-center items-center text-2xl font-semibold text-gray-900 ">
                <img src="./images/logoEvent-rectangle.png" class="h-20" alt="">
            </a>
        </div>
        <div class="">
            <ul class="flex flex-wrap justify-center items-center my-6 text-gray-900 ">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Home</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Contact</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022-2023 <a href="#"
            class="hover:underline">Prince</a>. All Rights Reserved.
    </div>
</footer>

<script src="./js/nav-toggle.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer="defer"></script>
</body>

</html>
