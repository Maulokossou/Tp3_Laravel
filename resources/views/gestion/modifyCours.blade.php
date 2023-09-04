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
    <form action="{{route('mode', ['id'=>$id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <label for="">Nom du cours:</label>
        <input type="text" name="name"  value="{{$data->name}}">
        <label for="">Max horaire:</label>
        <input type="text" name="Maxhoraire"  value="{{$data->Maxhoraire}}">
        <label for="" style=" margin-bottom:15px;">Coefficient:</label>
        <input type="text" name="Coefficient" id="" value="{{$data->Coefficient}}">
        <label for="categorie">Catégorie:</label>

        
       {{--  <select name="categorie" id="categorie" style="width: 99%; border: none; height: 37px; border-radius: 5px; outline: none">
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}" style="">{{ $categorie->name }}</option>
            @endforeach
        </select> --}}
        <input type="submit" value="Envoyer" id="submit">
    </form>
</body>
</html>