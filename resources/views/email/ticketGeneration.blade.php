<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fit-check</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <style>
        .container {
            position: relative;
            width: 80rem;
            padding: 30px
        }

        .imageOne {
            width: 100%;
        }

        .imageTwo {
            width: 87px;
            position: absolute;
            bottom: 10.5%;
            right: 4%;
        }
    </style>

    <script type="text/javascript">
        var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};


$('#generatePDF').click(function () {
    doc.fromHTML($('#do').html(), 15, 15, {
        'width': 170,
        // 'elementHandlers': specialElementHandlers
    });
    doc.save();
});
    </script>

</head>

<body onload="generatePDF()">
    <div id="do" class="container">
        <img width="300px" class="imageOne" src="{{ url('images/pass.png') }}" alt="">
        <!-- qr image -->
        <img class="imageTwo" src="{{ url(session('qrImage')) }}" alt="">
    </div>
    <div id="editor"></div>
    <button id="generatePDF">Download</button>
</body>

</html>
