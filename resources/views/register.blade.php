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
    <section>
        @if($errors->all() )
        <div class="alert alert-dismissible alert-warming fade show bg-danger opacity-1
        " role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li><br/>
                @endforeach
            </ul>
            <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
        </div>
        @endif
    </section>
    
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" style=" background-color:#2249f393; height:590px;margin-right:20px;margin-top:20px" autocomplete="off">
        <h4 style="text-align: center;">CRÉATION DE COMPTE</h4>
    @csrf
    
    <label for="" style="">Nom:</label>
    <input type="text" value="{{old('nom')}} "name="nom" id="" placeholder="Entrer votre nom" style="width:98%">
    <label for="" style="">Prénom:</label>
    <input type="text" value="{{old('prenom')}}" name="prenom" id="" placeholder="Entrer votre prénom" style="width:98%">
    <label for="" style="">Date de naissance:</label>
    <input type="date" value="{{old('birthday')}}" name="birthday" id="" placeholder="Entrer votre prénom" style="width:98%">
    <label for="" style="">Email:</label>
    <input type="email" value="{{old('email')}}" name="email" id="" placeholder="Entrer votre email" style="width:98%">
    <label for="description">Mot de passe:</label>
    <input type="password" name="password" id="" value="" placeholder="Entrer votre mot de passe"  style="width:98%">
    <label for="description">   Confirmation de mot passe:</label>
    <input type="password" name="password_confirmation" id="" value="" placeholder="Confirmer votre mot de passe"  style="width:98%">
    <input type="submit" value="Connexion" id="submit">
    <p style="margin-top:10px">Vous avez déja de compte? <a href="{{route('login')}}">Cliquez ici</a></p>
    </form>
</body>
</html>