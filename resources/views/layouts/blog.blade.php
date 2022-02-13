<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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


    <link rel="stylesheet" href="{{ mix('css/blog/style.css') }}">
    <link rel="stylesheet" media='screen and (max-width: 768px)' href="{{ mix('css/blog/mobile.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato|Staatliches&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <link rel="icon" type="image/png" href="https://laravel.com/favicon.png">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.13.1/build/styles/sunburst.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <script src="https://kit.fontawesome.com/85a5fdd30e.js" async></script>

    <title>NewsGrid | Article</title>
</head>
<body>
<nav id="main-nav">
    <div class="container">
        <img src="img/logo.png" alt="NewsMedia" class="logo">
        <div class='social'>
            <a href="http://facebook.com.br" target='blank'><i class="fab fa-facebook fa-2x"></i></a>
            <a href="http://twitter.com.br" target='blank'><i class="fab fa-twitter fa-2x"></i></a>
            <a href="http://instagram.com.br" target='blank'><i class="fab fa-instagram fa-2x"></i></a>
            <a href="http://youtube.com.br" target='blank'><i class="fab fa-youtube fa-2x"></i></a>
        </div>
        <ul>
            <li><a href="/">Home</a></li>
            @if (Route::has('login'))
                @auth
                    <li><a href="{{ url('/dashboard') }}"
                           class="ml-5 no-underline hover:underline uppercase">Dashboard</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="ml-5 no-underline hover:underline uppercase">Log in</a>
                    </li>

                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="ml-5 no-underline hover:underline uppercase">Register</a>
                        </li>
                    @endif
                @endauth
            @endif
        </ul>
    </div>
</nav>

@yield('header')

@section('main-content')

<section id="article">
    <div class="container">
        @yield('main')
    </div>
</section>

@show

<footer id='main-footer' class='py-2'>
    <div class="container footer-container">
        <div>
            <img src="img/logo_light.png" alt="logo">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium quod ratione veniam sit harum
                excepturi sed quos dignissimos maxime consequatur.</p>
        </div>
        <div>
            <h3>Email Newsletter</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <form>
                <input type="email" placeholder="Email:" required>
                <input type="submit" value="Subscribe" class='btn btn-primary'>
            </form>
        </div>
        <div>
            <h3>Site Links</h3>
            <ul class='list'>
                <li><a href="#">Help and Support</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div>
            <h2>Join our Club</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, provident.</p>
            <a href="#" class="btn btn-secondary">Join Now</a>
        </div>
        <div>
            <p>
                Template from <a href="https://github.com/imshashikantdev/WTFNews" target="_blank">NewsGrid (MIT)</a> &copy;
                {{\Carbon\Carbon::now()->year}}
            </p>
        </div>
    </div>
</footer>
</body>
</html>

