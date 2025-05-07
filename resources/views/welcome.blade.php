<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Adoptly</title>

    <link rel="icon" type="image/png" href="/storage/imageMenu/logo_chari_found.png" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="app"></div>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script type="module" src="{{ Vite::asset('resources/js/app.js') }}"></script>
</body>
</html>
