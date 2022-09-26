<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .ff {
            /* position: fixed; */
            /* top: 25%; */
            /* left: 50%; */
        }
    </style>
</head>

<body>
    @if ($data->count() == 0)
    @else
        <input hidden id="result"name="ticket_number" type="text"
            value=" {{ app('request')->input('ticket_number') }}">
        </h1>
        <table style="text-align: center" class="table">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    {{-- <th scope="col">Payment Id</th> --}}
                </tr>
            </thead>
            <tbody>
                <?php
                $sr = 0;
                ?>

                @foreach ($ticket as $tickets)
                    <tr>
                        <?php
                        $sr = $sr + 1;
                        ?>
                        <th scope="row">{{ $sr }}</th>
                        <td>{{ $tickets->name2 }}</td>
                        {{-- <td>@ {{ $tickets->payment_id }}</td> --}}
                    </tr>
                @endforeach



            </tbody>
        </table>
        <div style="display:flex;justify-content:center" class="btn ff">

            <button class="btn btn-primary"
                style="padding: 15px 30px;border:1px solid black;margin:10px;align-items:center;" id="save"
                type="submit" class="-close">Do Entry
            </button>
        </div>
    @endif

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        $('#save').click(function() {
            // document.getElementById("form").addEventListener("click", function(event){
            event.preventDefault()
            $ticket_number = $('#result').val();
            $.ajax({
                url: "reserveRs",
                method: "GET",
                data: {
                    ticket_number: $ticket_number,
                },
                success: function(dataabc) {
                    if (dataabc == 1) {
                        Toastify({
                            text: "Entry Successfull",
                            // duration: 2000,
                            newWindow: true,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "left", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                            onClick: function() {} // Callback after click
                        }).showToast();
                        console.log(dataabc);
                    } else if (dataabc == -1) {
                        Toastify({
                            text: "Entry is Already Given",
                            // duration: 3000,
                            newWindow: true,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "left", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "red",
                            },
                            onClick: function() {} // Callback after click
                        }).showToast();
                    } else {
                        Toastify({
                            text: "Ticket is invalid",
                            // duration: 3000,

                            newWindow: true,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "left", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                            onClick: function() {} // Callback after click
                        }).showToast();
                    }
                    console.log(dataabc);
                }
            });
            // console.log($title);


        });
    </script>
</body>

</html>
