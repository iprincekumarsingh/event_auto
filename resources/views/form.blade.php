@include('layout.header')
<script src="https://cdn.tailwindcss.com"></script>
<!--

  This component uses @tailwindcss/forms

  yarn add @tailwindcss/forms
  npm install @tailwindcss/forms

  plugins: [require('@tailwindcss/forms')]
-->

<section class="bg-gray-100">
    <div class="px-4 py-16 mx-auto max-w-screen-xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
            <div class="lg:py-12 lg:col-span-2">
                <p class="max-w-xl text-lg">

                </p>

            </div>

            <div class="p-8 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-3">
                <div class="mt-8">
                    <a href="" class="text-2xl font-bold text-pink-600"></a>

                    <h1 class="mt- not-italic"> Add {{ app('request')->input('ticket_count') }} Names</h1>
                </div>

                <form action="/addname" method="get" class="space-y-4">
                    <input type="text" hidden name="payment_id"
                        value="{{ app('request')->input('razorpay_payment_id') }}" id="">
                    <input type="text" hidden name="count" value="{{ app('request')->input('ticket_count') }}">
                    <?php
                    $ii=0;
                    if ($_GET['ticket_type'] == 2) {
                        $ii=2;
                } elseif ($_GET['ticket_count'] >= 3) {

                    $ii=$_GET['ticket_count'];
                }
    for ($i=0; $i<$ii ; $i++) {
 ?>
                    <div>
                        <label class="sr-only" for="name">Name</label>
                        <input name="name{{ $i }}" class="w-full p-3 text-sm border-gray-200 rounded-lg"
                            placeholder="Name {{ $i + 1 }}" type="text" id="name" />
                    </div>
                    <?php }  ?>

                    <div class="col-span-6">
                        <button class="rounded-lg bg-black text-sm p-2.5 text-white w-full block" type="submit">
                            Add names
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
