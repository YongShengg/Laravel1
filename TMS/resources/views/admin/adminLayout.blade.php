<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Auth Laravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}" rel="stylesheet"> --}}
    <link href="{{ asset('bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet">
    {{-- <link href="{{ mix('node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"> --}}



</head>

<body>
    @include('include.adminHeader')
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="{{ mix('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('js/jquery3.6.4.js') }}"></script>
    <script src="{{ asset('bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
    {{-- <script type="module" src="./app.js"></script> --}}

</body>
</html>