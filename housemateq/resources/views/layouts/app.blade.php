<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title or config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        {{-- <p>{{ csrf_token() }}</p> --}}
        @yield('content')
    </div>

    @yield('footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.smooth-scroll.min.js') }}"></script>
    {{-- <script src="{{ asset('js/modernizr.min.js') }}"></script> --}}

    @yield('script')
</body>
</html>
