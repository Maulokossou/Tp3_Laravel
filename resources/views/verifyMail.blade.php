<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('emailVerify') }}" method="POST" enctype="multipart/form-data"
        style=" background-color:#2249f393; height:140px;" autocomplete="off">
        <section>
            @if ($errors->all())
                <div class="alert alert-dismissible alert-warming fade show bg-danger opacity-1
            "
                    role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li><br />
                        @endforeach
                    </ul>
                    <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="p-2 w-100">
                    <div class="alert alert-success  fade show alert-dismissible" role="alert">
                        <div class="div">
                            <strong> Message succès</strong> <br>
                            {{ session('success') }}
                        </div>
                        <div class="p-2 flex-shrink-1"><button type="button" class="btn-close ml-4"
                                aria-label="Close"></button>
                        </div>

                    </div>
                </div>
            @endif
        </section>

        <h4 style="text-align: center; ">EMAIL:</h4>
        @csrf
        <label for="description">Entrer votre mail:</label>
        <input type="email" name="email" id="" value="{{ old('email') }}"
            placeholder="Entrer votre addresse email" style="width:95%; margin-top:10px;padding: 6px 0px 6px 10px;">
        <input type="submit" value="Envoyer" id="submit">
    </form>
</body>

</html>
