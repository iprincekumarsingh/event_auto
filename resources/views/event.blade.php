<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="/pay" method="get">
        @csrf
        <input type="text" hidden name="event_id" value="1"  id="">
        <input type="submit" value="Book Now">
    </form>
</body>

</html>
