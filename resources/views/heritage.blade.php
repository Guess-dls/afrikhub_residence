<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.4.0-web/css/all.css') }}">

    <title> {{ config('app.name')}} @yield('titre')</title>
    @yield('ux-ui')
</head>
<body>



    @yield('header')


    @yield('contenu')

    @yield('footer')

    @yield('script')
</body>
</html>
