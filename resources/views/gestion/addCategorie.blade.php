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
    <form action="{{route('newCategorie')}}" method="POST" enctype="multipart/form-data" style="height:150px">
        @csrf
        <label for="">Ajouter une catégorie:</label>
        <input type="text" name="name" id="categorie">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="Envoyer" id="submit"  style="margin-top:15px">
    </form>
</body>
</html>