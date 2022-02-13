<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>網路資訊中心化</title>

    <meta name="theme-color" content="#ffffff">

    <meta name="twitter:title" content="網路資訊中心化">
    <meta name="og:title" content="網路資訊中心化">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="">
    <meta name="twitter:site" content="@hsuan1117">
    <meta name="twitter:image" content="https://blog.laravel.com/social-share.jpg">

    <meta name="og:site_name" content="The Laravel Blog">
    <meta name="og:image" content="https://blog.laravel.com/social-share.jpg">
    <meta name="og:type" content="website">
    <meta name="og:locale" content="en_US">

    <link href="https://fonts.googleapis.com/css?family=Miriam+Libre:400,700|Merriweather" rel="stylesheet">

    <link rel="icon" type="image/png" href="https://laravel.com/favicon.png">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.13.1/build/styles/sunburst.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <!-- Styles -->
    <link href="{{ mix('css/blog.css') }}" rel="stylesheet" />

    <!-- Google analytics tracking code goes here -->

</head>
<body class="antialiased">
<header class="py-5 mb-10 bg-gray-50">
    <div class="container mx-auto px-5 lg:max-w-screen">
        <div class="flex items-center flex-col lg:flex-row">
            <a href="/" class="flex items-center no-underline text-brand">
                <img src="https://laravel.com/img/logomark.min.svg" class="w-10">

                <img class="text-xl ml-3 w-24" src="https://laravel.com/img/logotype.min.svg" alt="">
            </a>

            <div class="lg:ml-auto mt-10 lg:mt-0 flex items-center">
                <a href="/" class="no-underline hover:underline uppercase">Home</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="ml-5 no-underline hover:underline uppercase">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="ml-5 no-underline hover:underline uppercase">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-5 no-underline hover:underline uppercase">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</header>

<div class="container mx-auto px-5 lg:max-w-screen-sm">
    {{ $slot }}
</div>


<!-- Scripts -->
<script src="{{ mix('js/blog.js') }}" ></script>

</body>
</html>
