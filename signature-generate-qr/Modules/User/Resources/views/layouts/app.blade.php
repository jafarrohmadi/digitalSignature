<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#005ba1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- css -->
    <link href="{{ asset('css/otherstyles.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/ri2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">
    <!-- css -->

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <!-- font -->

    <!-- Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/simplebar.min.js') }}"></script>
    @yield('snippet_styles')
    <title>Work Order</title>

</head>
<body>
    @include('user::partials.header')
    @include('user::partials.sidebar')
    @include('user::partials.notifbar')
    <div id="main">
        <div id="content">
            @yield('content')
        </div>
        @include('user::partials.footer')
    </div>

    @include('user::partials.scripts')
    @yield('snippet_scripts')
</body>
</html>
