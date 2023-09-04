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
        <form action="{{route('coursStore')}}" method="POST" enctype="multipart/form-data" style="width:600px; height:360px;">
            @csrf
            <label for="">Nom du cours:</label>
            <input type="text" name="name" value="{{old('name')}}" id="file">
            <label for="">Max horaire:</label>
            <input type="text" name="Maxhoraire" value="{{old('Maxhoraire')}}" id="">
            <label for="" style="">Coefficient:</label>
            <input type="number" name="Coefficient" value="{{old('Coefficient')}}" id="">

            <label for="categorie">Catégorie:</label>
            <select name="categorie" id="categorie" style="width: 99%; border: none; height: 37px; border-radius: 5px; outline: none">
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" style="">{{ $categorie->name }}</option>
                @endforeach
            </select>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="submit" value="Envoyer" id="submit" style="margin-top: 15px">

        </form>
</body>
</html>