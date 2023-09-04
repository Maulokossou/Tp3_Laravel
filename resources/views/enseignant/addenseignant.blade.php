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
        <form action="{{route('enseignantStore')}}" method="POST" enctype="multipart/form-data" style="width:600px; height:360px;">
            @csrf
            <label for="">Nom:</label>
            <input type="text" name="firstname" value="{{old('firstname')}}" id="file">
            <label for="">Prénom:</label>
            <input type="text" name="lastname" value="{{old('lastname')}}" id="">
            <label for="" style="">Téléphone:</label>
            <input type="tel" name="telephone" value="{{old('telephone')}}" id="">

            <label for="">Adresse:</label>
            <input type="adresse" name="adresse" value="{{old('adresse')}}" id="">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="submit" value="Envoyer" id="submit" style="margin-top: 15px">

        </form>
</body>
</html>