<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Auth Laravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">

    <link href="{{ asset('bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet">

    
    <link rel="stylesheet" href="{{ asset('css/css/coreui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/simplebar.css') }}">
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/vendors/@coreui/chartjs/css/coreui-chartjs.css') }}">

</head>

<body>
    @include('include.adminHeader')
    @yield('content')

    <script src="{{ asset('js/jquery3.6.4.js') }}"></script>


    <script src="{{ asset('dist/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/chart.js/js/chart.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
    <script src="{{ asset('dist/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
    <script src="{{ asset('dist/js/main.js') }}"></script>

    
    <script src="{{ asset('bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
    {{-- <script type="module" src="./app.js"></script> --}}

</body>
</html>