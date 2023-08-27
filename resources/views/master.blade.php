<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body>
    <nav class="text-center">
          <h3>ECOLE 229</h3>
          <div class="link">
            <a href="#">Home</a>
            <a href="#">Services</a>
            <a href="#">Blog</a>
            <a href="#">Contact</a>
          </div>
    </nav>
    @yield('content')
</body>
</html>