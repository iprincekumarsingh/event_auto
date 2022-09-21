<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <body>
        <div style="position: relative;">
          <div>
            <!-- invite card image -->
            <img width="100%"  src="{{url('images/pass.png')}}" alt="">
            <!-- qr image -->
            <img style="position: absolute; bottom: 1rem; right: 9rem;" src="{{url(session('qrImage'))}}" alt="">
          </div>
        </div>
      </body>


</body>
</html>
