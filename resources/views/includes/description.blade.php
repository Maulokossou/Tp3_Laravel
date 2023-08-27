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
    <div class="description">
        <tr>
            <div class="top">
                <div class="image">
                    <img src="{{ asset($item['images']) }}" style="width:150px; height:150px" alt="">
                </div>
            </div>
            <div class="bottom">
                <div class="presentation">
                    <h3>Nom et Prénom: </h3>
                    {{ $item['name'] }}
                </div>
                <div class="hobbies">
                    <h3>Hobbies:</h3>
                    {{ $item['hobbies'] }}
                </div>
                <div class="specialite">
                    <h3>Spécialité:</h3>
                    {{ $item['spécialité'] }}
                </div>
            </div>
        </tr>
    </div>
    <div class="conseil">
        <button type="button"><a href="{{ route('VoirPlus', ['id' => $item['id'] - 1]) }}"
                style="text-decoration: none; color:white;">Préc</a></button>
        <button type="button"><a href="{{ route('VoirPlus', ['id' => $item['id'] + 1]) }}"
                style="text-decoration: none; color:white;">Suiv</a></button>
    </div>

</body>

</html>
