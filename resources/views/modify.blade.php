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
    <form action="{{route('envoie', ['id'=>$id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <label for="">Image:</label>
        <input type="file" name="images" id="file" value="{{$data->images}}">
        <label for="">Nom et prénom:</label>
        <input type="text" name="name" id="" value="{{$data->name}}">
        <label for="" style=" margin-bottom:15px;">Hobbies:</label>
        <input type="text" name="hobbies" id="" value="{{$data->hobbies}}">
        <label for="">Spécialité:</label>
        <input type="text" name="specialite" id="" value="{{$data->spécialité}}">
        <input type="submit" value="Envoyer" id="submit">
    </form>
</body>
</html>