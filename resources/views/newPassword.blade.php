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
        <form action="{{ route ('updatePwd', ['id'=>$id]) }}" method="POST" enctype="multipart/form-data" style=" background-color:#1d1c1d93; height:300px;" autocomplete="off">
            <h4 style="text-align: center; ">MOT DE PASSE:</h4>
        @csrf
        <label for="" style="">Nouveau mot de passe:</label>
        <input type="password" value="" name="password" id="" placeholder="Entrer votre nouveau de passe" style="width:98%">
        <label for="description">Confirmer votre mot de passe:</label>
        <input type="password" name="password_confirmation" id="" value="" placeholder="Confirmer votre mot de passe"  style="width:98%">
        <input type="submit" value="Envoyer" id="submit">
        </form>
</body>
</html>