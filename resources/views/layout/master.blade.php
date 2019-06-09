<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="app">
        <v-app>
            <app></app>
        </v-app>
    </div>
    <script>
        window.user = @json(
        [
            'user'=> auth()->user(),
        ]
        );
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
