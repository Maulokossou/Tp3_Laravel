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
    <form action="{{route('authentification')}}" method="POST" enctype="multipart/form-data" style=" background-color:#2249f393; height:280px;" autocomplete="off">
        <section>
            @if (session('errors'))
            <div class="p-2 w-100">
                <div class="alert alert-success  fade show alert-dismissible" role="alert">
                    <div class="div">
                        <strong> Message succès</strong> <br>
                        {{ session('errors') }}
                    </div>
                    <div class="p-2 flex-shrink-1"><button type="button" class="btn-close ml-4"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        </section>
        <h4 style="text-align: center; ">AUTHENTIFICATION</h4>
    @csrf
    <label for="" style="">Email:</label>
    <input type="email" value="" name="email" id="" placeholder="Entrer votre email" style="width:98%">
    <label for="description">Mot de passe:</label>
    <input type="password" name="password" id="" value="" placeholder="Entrer votre mot de passe"  style="width:98%">
    <input type="submit" value="Connexion" id="submit">
    <p style="margin-top:10px">Vous n'avez pas encore de compte? <a href="{{route('register')}}">Cliquez ici</a></p>
    <p>Mot de passe oublié? <a href="{{route('verifyMail')}}">Cliquez ici</a></p>
    </form>
</body>
</html>