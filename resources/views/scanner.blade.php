<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from qrcodescan.in/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Sep 2022 04:22:29 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <title>QR Code Scanner</title>
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=description content="QR Code Scanner is the fastest and most user-friendly web application.">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="QR Scanner" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#e4e4e4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="QR Scanner" />
    <meta name="msapplication-TileColor" content="#e4e4e4" />
    <meta name="theme-color" content="#e4e4e4" />

    <link rel="stylesheet" href="{{ url('bundle.css') }}">
    <link rel="preload" as="script" href="decoder.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>
    <div class="app__layout">
        <!-- Header -->
        <header class="app__header">
            <span class="app__header-icon">
                <a href="{{url('foodScanner')}}">
                    <img width="100px" src="{{url('img/food1.png')}}" alt="" srcset="">
                </a>
            </span>
        </header>

        <main class="app__layout-content">
            <video autoplay></video>

            <!-- Dialog for result  -->
            <div class="app__dialog app__dialog--hide">
                <div class="app__dialog-content">
                    <h1>QR Code</h1>
                    <form id="form">


                        <input name="ticket_number" type="text" id="result">
                </div>
                <button id="save" type="button" class="-close">Get Details</button>
                <div class="app__dialog-actions">
                    <!-- <button type="button" class="app__dialog-open">Open</button> -->

                    <button type="button" class="app__dialog-close">Close</button>
                    </form>
                </div>
            </div>

            <div class="app__dialog-overlay app__dialog--hide"></div>



            <div class="app__infodialog-overlay app__infodialog--hide"></div>

            <!-- Snackbar -->
            <div class="app__snackbar"></div>
        </main>
    </div>
    <div class="app__overlay">
        <div class="app__overlay-frame"></div>
        <!-- Scanner animation -->
        <svg class="app__scanner-img" width="310" height="310" viewBox="0 0 215 215" version="1.1"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Artboard" transform="translate(-146.000000, -58.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g id="scanner" transform="translate(146.000000, 58.000000)">
                        <path
                            d="M169.272388,200.559701 L169.272388,194.141791 L169.272388,200.559701 Z M206.977612,169.272388 L213.395522,169.272388 L206.977612,169.272388 Z M197.751866,196.548507 L195.386866,194.380056 L197.751866,196.548507 Z M177.294776,215 C182.766045,215 188.646455,214.846772 193.977332,213.800653 C199.295373,212.757743 204.460187,210.752948 208.139254,206.739347 L203.409254,202.402444 C201.047463,204.977631 197.426959,206.583713 192.741884,207.503078 C188.07125,208.420037 182.731549,208.58209 177.294776,208.58209 L177.294776,215 Z M208.139254,206.739347 C211.515877,203.057071 213.159664,197.946007 214.013246,192.871045 C214.876455,187.740728 215,182.195653 215,177.294776 L208.58209,177.294776 C208.58209,182.153134 208.452127,187.240933 207.684384,191.806474 C206.907015,196.426567 205.543209,200.074347 203.409254,202.402444 L208.139254,206.739347 L208.139254,206.739347 Z M200.559701,37.7052239 L194.141791,37.7052239 L200.559701,37.7052239 Z M196.548507,9.22574627 L194.380056,11.5907463 L196.548507,9.22574627 Z M215,37.7052239 C215,32.2339552 214.846772,26.3535448 213.800653,21.0226679 C212.757743,15.7046269 210.752948,10.5398134 206.739347,6.86074627 L202.402444,11.5907463 C204.977631,13.9525373 206.583713,17.573041 207.503078,22.2581157 C208.420037,26.9295522 208.58209,32.2684515 208.58209,37.7052239 L215,37.7052239 Z M206.739347,6.86074627 C203.057071,3.48412313 197.946007,1.84033582 192.871045,0.986753731 C187.740728,0.123544776 182.195653,5.32907052e-15 177.294776,5.32907052e-15 L177.294776,6.41791045 C182.153134,6.41791045 187.240933,6.54787313 191.806474,7.31561567 C196.426567,8.09298507 200.074347,9.45759328 202.402444,11.5915485 L206.739347,6.86074627 Z M6.41791045,169.272388 L12.8358209,169.272388 L6.41791045,169.272388 Z M37.7052239,206.977612 L37.7052239,213.395522 L37.7052239,206.977612 Z M10.4291045,197.751866 L12.597556,195.386866 L10.4291045,197.751866 Z M-2.39808173e-14,177.294776 C-2.39808173e-14,182.766045 0.152425373,188.646455 1.19934701,193.977332 C2.24225746,199.295373 4.24705224,204.460187 8.26065299,208.139254 L12.597556,203.409254 C10.0223694,201.047463 8.41628731,197.426959 7.49692164,192.741884 C6.57996269,188.07125 6.41791045,182.731549 6.41791045,177.294776 L-2.39808173e-14,177.294776 Z M8.26065299,208.139254 C11.9429291,211.515877 17.0539925,213.159664 22.1289552,214.013246 C27.2600746,214.876455 32.8051493,215 37.7052239,215 L37.7052239,208.58209 C32.8468657,208.58209 27.7590672,208.452127 23.1943284,207.684384 C18.5734328,206.907015 14.925653,205.543209 12.597556,203.409254 L8.26065299,208.139254 L8.26065299,208.139254 Z M37.7052239,6.41791045 L37.7052239,12.8358209 L37.7052239,6.41791045 Z M9.22574627,10.4291045 L11.5907463,12.597556 L9.22574627,10.4291045 Z M37.7052239,0 C32.2339552,0 26.3535448,0.152425373 21.0226679,1.19934701 C15.7046269,2.24225746 10.5398134,4.24705224 6.86074627,8.26065299 L11.5907463,12.597556 C13.9525373,10.0223694 17.573041,8.41628731 22.2581157,7.49692164 C26.9295522,6.57996269 32.2684515,6.41791045 37.7052239,6.41791045 L37.7052239,0 Z M6.86074627,8.26065299 C3.48412313,11.9429291 1.84033582,17.0539925 0.986753731,22.1289552 C0.123544776,27.2600746 -1.42108547e-14,32.8051493 -1.42108547e-14,37.7052239 L6.41791045,37.7052239 C6.41791045,32.8468657 6.54787313,27.7590672 7.31561567,23.1943284 C8.09298507,18.5734328 9.45759328,14.925653 11.5915485,12.597556 L6.86074627,8.26065299 Z"
                            id="Shape"></path>
                    </g>
                </g>
            </g>
        </svg>
        <div class="custom-scanner">
        </div>
        <div class="app__help-text"></div>
    </div>
    <div class="app__select-photos">
        <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24"
            height="24" viewBox="0 0 24 24">
            <defs>
                <path id="a" d="M24 24H0V0h24v24z" />
            </defs>
            <clipPath id="b">
                <use xlink:href="#a" overflow="visible" />
            </clipPath>
            <path clip-path="url(#b)"
                d="M3 4V1h2v3h3v2H5v3H3V6H0V4h3zm3 6V7h3V4h7l1.83 2H21c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H5c-1.1 0-2-.9-2-2V10h3zm7 9c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-3.2-5c0 1.77 1.43 3.2 3.2 3.2s3.2-1.43 3.2-3.2-1.43-3.2-3.2-3.2-3.2 1.43-3.2 3.2z" />
        </svg>
    </div>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JV7CRR9FCT"></script>
    <script>
        if (location.hostname !== "localhost") {
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-JV7CRR9FCT');
        }
    </script>
    <script async src="https://cdn.jsdelivr.net/npm/pwacompat@2.0.6/pwacompat.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="{{ url('bundle.js') }}"></script>
    <script>
        $('#save').click(function() {
            // document.getElementById("form").addEventListener("click", function(event){
  event.preventDefault()
  $ticket_number = $('#result').val();
            $.ajax({
                url: "ticketCollector",
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
                    } else if(dataabc==-1) {
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
                    }
                    else{
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

<!-- Mirrored from qrcodescan.in/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Sep 2022 04:22:35 GMT -->

</html>
