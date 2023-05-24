<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widt=device-width, initial-scarle=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name')}}</title>
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            @yield('content')
        </div>
    </div>
<body>
</html>