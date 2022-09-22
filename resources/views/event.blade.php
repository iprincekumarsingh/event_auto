@include('layout.header')
<style>
    .razorpay-payment-button {
        display: none
    }
</style>
<!-- Hero carousel start -->
<!-- Hero carousel start -->
<section id="heroCarousel" class="carousel slide relative" data-bs-ride="carousel">
    <!--<div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">-->
    <!--    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"-->
    <!--        aria-label="Slide 1"></button>-->
    <!--    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>-->
    <!--    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>-->
    <!--</div>-->
    <!-- carousel-items -->
    <div class="carousel-inner relative w-full overflow-hidden">
        @foreach ($event as $events)
            <div class="carousel-item active relative float-left w-full">
                <img src="{{ url($events->feature_image) }}" class="block w-full" alt="..." />
                <div class="carousel-caption hidden md:block absolute text-center">
                    {{-- <h5 class="text-xl">First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p> --}}
                </div>
            </div>
            {{-- <div class="carousel-item relative float-left w-full">
            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(22).jpg" class="block w-full" alt="..." />
            <div class="carousel-caption hidden md:block absolute text-center">
                <h5 class="text-xl">Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item relative float-left w-full">
            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(23).jpg" class="block w-full" alt="..." />
            <div class="carousel-caption hidden md:block absolute text-center">
                <h5 class="text-xl">Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div> --}}
    </div>
   
</section>
<!-- Hero carousel end -->


<!-- Event details and booking start -->
<section class="text-gray-600 body-font px-6 ">
    <div class="container mx-auto flex px-5 py-8 md:py-24 md:flex-row flex-col items-center">
        <div
            class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900 capitalize">
                Event name : {{ $events->event_name }}
            </h1>
            <!-- event tags -->
            {{-- <div class="flex flex-wrap justify-center space-x-2 capitalize">
                <span
                    class="px-4 py-2 rounded-full text-gray-500 bg-gray-200 font-semibold text-sm flex align-center w-max select-none active:bg-gray-300 transition duration-300 ease">
                    dance
                </span>

                <span
                    class="px-4 py-2 rounded-full text-gray-500 bg-gray-200 font-semibold text-sm flex align-center w-max select-none active:bg-gray-300 transition duration-300 ease">
                    music
                </span>

                <span
                    class="px-4 py-2 rounded-full text-gray-500 bg-gray-200 font-semibold text-sm flex align-center w-max select-none active:bg-gray-300 transition duration-300 ease">
                    free drinks
                </span>
            </div> --}}
            <p class="mb-8 leading-relaxed">
            <div class=""></div>
          {{$events->event_description}}
            </p>
            <div class="flex justify-center py-4">

                @if (session()->has('isLoggedIn'))
                <button class="relative inline-block group focus:outline-none focus:ring" data-bs-toggle="modal"
                data-bs-target="#ticketBookingModal" href="#">
                <span
                    class="absolute inset-0 transition-transform translate-x-1.5 translate-y-1.5 bg-indigo-400 group-hover:translate-y-0 group-hover:translate-x-0"></span>

                <span
                    class="relative inline-block px-8 py-3 text-lg font-bold tracking-widest text-black uppercase border-2 border-current group-active:text-opacity-75">
                    Buy your ticket
                </span>
            </button>
                @else
                <button class="relative inline-block group focus:outline-none focus:ring"
                data-bs-target="#ticketBookingModal" href="#">
                <span
                    class="absolute inset-0 transition-transform translate-x-1.5 translate-y-1.5 bg-indigo-400 group-hover:translate-y-0 group-hover:translate-x-0"></span>

                <span
                    class="relative inline-block px-8 py-3 text-lg font-bold tracking-widest text-black uppercase border-2 border-current group-active:text-opacity-75">
                 <a href="{{route('auth.index')}}"> Login to Book Ticket</a>
                </span>
            </button>

                @endif


                <!-- Modal -->
                <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                    id="ticketBookingModal" tabindex="-1" aria-labelledby="ticketBookingModalLabel" aria-hidden="true">
                    <div
                        class="modal-dialog modal-dialog-scrollable modal-dialog-centered relative w-auto pointer-events-none ">
                        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current"
                            style="max-height: 70%;">
                            <div
                                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                <h5 class="text-xl font-medium leading-normal text-gray-800"
                                    id="ticketBookingModalLabel">
                                    Checkout
                                </h5>
                                <button type="button"
                                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body relative ">
                                <section>
                                    <h1 class="sr-only">Checkout</h1>
                                    <div class="relative mx-auto max-w-screen-2xl">
                                        <!-- checkout form -->
                                        <div class="py-6 bg-white md:py-12">
                                            <div class="max-w-lg px-4 mx-auto lg:px-8">
                                                <form action="/pay" method="POST" class="grid grid-cols-6 gap-4">



                                                    <div class="col-span-6">
                                                        <label class="block mb-1 text-sm text-gray-600" for="email">
                                                            Name
                                                        </label>

                                                        <input name="name"
                                                            class="rounded-lg shadow-sm border-gray-200 w-full text-sm p-2.5"
                                                            type="text" id="email" />
                                                    </div>
                                                    <div class="col-span-6">
                                                        <label class="block mb-1 text-sm text-gray-600" for="email">
                                                            Email
                                                        </label>

                                                        <input name="email"
                                                            class="rounded-lg shadow-sm border-gray-200 w-full text-sm p-2.5"
                                                            type="email" id="email" />
                                                    </div>

                                                    <div class="col-span-6">
                                                        <label name="phone" class="block mb-1 text-sm text-gray-600"
                                                            for="phone">
                                                            Phone
                                                        </label>

                                                        <input name="phone"
                                                            class="rounded-lg shadow-sm border-gray-200 w-full text-sm p-2.5"
                                                            type="tel" id="phone" />
                                                    </div>
                                                    <div class="col-span-6">
                                                        <label name="phone" class="block mb-1 text-sm text-gray-600"
                                                            for="phone">
                                                            Address
                                                        </label>

                                                        <input name="address"
                                                            class="rounded-lg shadow-sm border-gray-200 w-full text-sm p-2.5"
                                                            type="text" id="phone" />
                                                    </div>
                                                    <div class="col-span-6">
                                                        <label name="phone" class="block mb-1 text-sm text-gray-600"
                                                            for="phone">
                                                            Ticket Count
                                                        </label>
                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                                                        <input onchange="test()" min="1" value="1"
                                                            name="ticketCount"
                                                            class="rounded-lg shadow-sm border-gray-200 w-full text-sm p-2.5"
                                                            type="num" id="ticketcount" />
                                                    </div>


                                                    @foreach ($event as $events)
                                                        <input type="text" name="eventcode" hidden
                                                            value="{{ $events->event_id }}">

                                                        @csrf
                                                    @endforeach

                                                    <div class="col-span-6">
                                                        <button
                                                            class="rounded-lg bg-black text-sm p-2.5 text-white w-full block"
                                                            type="submit">
                                                            Pay Now
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            </div>
                            <script>
                                function ticket() {
                                    var x = document.getElementById("ticketCount")
                                    x.value
                                    console.log(x);
                                }
                            </script>
                            <div
                                class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                <button type="button"
                                    class="px-6py-2.5
    bg-purple-600
    text-white
    font-medium
    text-xs
    leading-tight
    uppercase
    rounded
    shadow-md
    hover:bg-purple-700 hover:shadow-lg
    focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0
    active:bg-purple-800 active:shadow-lg
    transition
    duration-150
    ease-in-out"
                                    data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
            <!-- modal containing image box -->
            <img class="object-cover object-center rounded-md cursor-pointer hover:scale-105 transition-transform"
                alt="event image" src="{{url('img/ticket_banner.png')}}" data-bs-toggle="modal"
                data-bs-target="#eventImageModal">
            <!-- Modal -->
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                id="eventImageModal" tabindex="-1" aria-labelledby="eventImageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none sm:max-w-2xl">
                    <div
                        class="modal-content  border-none relative flex flex-col w-full pointer-events-auto bg-transparent bg-clip-padding rounded-md outline-none text-current">
                        <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 rounded-t-md">
                            <h5 class="text-xl font-medium leading-normal text-gray-200 capitalize"
                                id="exampleModalLabel">

                            </h5>
                            <button type="button"
                                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- modal body -->
                        <div class="modal-body relative p-4">
                            <img class="mx-auto" src="{{url('img/ticket_banner.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Event details and booking end -->

<!-- brands/partners/sponsors section start -->
@endforeach
<!-- brands section end -->

<!-- iframe to be used -->
<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3410.504734850585!2d75.704008!3d31.262130999999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a5f978d051fb5%3A0x70849fa20b736dda!2zS2luZ-KAmXMgYmF5!5e0!3m2!1sen!2sin!4v1663813827112!5m2!1sen!2sin" frameborder="0" style="-->
<!--    width: 100%;-->
<!--    height: 500px;-->
<!--"></iframe>-->

<!-- ====== Footer Section Start -->
@include('layout.footer');
<!-- ====== Footer Section End -->
{{--
<script src="{{ url('/js/nav-toggle.js') }}"></script> --}}
 <script src="{{ url('/tw-elements/dist/js/index.min.js') }}" defer></script> 
 <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer="defer"></script> 
<script>
    var d = document.getELE("razorpay-payment-button");
    d.className +=
        " relative inline-block px-8 py-3 text-lg font-bold tracking-widest text-black uppercase border-2 border-current group-active:text-opacity-75";
</script>
<script>

</script>
</body>

</html>
