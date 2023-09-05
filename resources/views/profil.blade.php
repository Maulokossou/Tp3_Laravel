<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <title>Document</title>
</head>
<body>
    @if($id)       
         @include('includes.description')
        @else
        <form action="{{route('profilStore')}}" method="POST" enctype="multipart/form-data" style="height:380px; ">
            @csrf
            <label for="">Image:</label>
            <input type="file" name="images" id="file">
            <label for="">Nom et prénom:</label>
            <input type="text" name="name" id="">
            <label for="" style=" margin-bottom:15px;">Hobbies:</label>
            <input type="text" name="hobbies" id="">
            <label for="">Spécialité:</label>
            <input type="text" name="specialite" id="">
            <input type="submit" value="Envoyer" id="submit">
        </form>
    @endif
</body>
</html>