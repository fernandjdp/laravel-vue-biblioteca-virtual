<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UDEFA - Biblioteca') }}</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>UDEFA - Biblioteca virtual</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="UDEFA - Biblioteca virtual">
    <meta name="author" content="Fernand Diaz">
    <meta name="description" content="Biblioteca virtual de trabajos de grado de la Universidad de Falcón">
    <meta name="keywords" content="bootstrap, bootstrap 5, bootstrap 5 one page, bootstrap 5 mobile application, library, udefa, one page template bootstrap 5" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://demo.themesberg.com/swipe/">
    <meta property="og:title" content="UDEFA - Biblioteca virtual">
    <meta property="og:description" content="Free Mobile Application One Page Bootstrap 5 Template by Themesberg">
    <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/swipe/swipe-thumbnail.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://demo.themesberg.com/swipe/">
    <meta property="twitter:title" content="UDEFA - Biblioteca virtual">
    <meta property="twitter:description" content="Free Mobile Application One Page Bootstrap 5 Template by Themesberg">
    <meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/swipe/swipe-thumbnail.jpg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="/swipe/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/swipe/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/swipe/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/swipe/assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/swipe/assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Fontawesome -->
    <link type="text/css" href="/swipe/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/swipe/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="/swipe/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/swipe/vendor/headroom.js/dist/headroom.min.js"></script>

    <!-- Vendor JS -->
    <script src="/swipe/vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <script src="/swipe/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <!-- Swipe JS -->
    <script src="/swipe/assets/js/swipe.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Spartan" rel="stylesheet">

    <!-- Fonts -->
        
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Info usuario -->
     @if (Auth::check()) 
         <meta name="user_info" content="{{ Auth::user() }}" />
         <meta name="user_type" content="{{ Auth::user()->tipo_usuario_id }}" />
    @endif 

</head>
<body>
    <div id="app">
        <main class="bg-soft">
            @yield('content')
        </main>
    </div>
</body>
</html>
