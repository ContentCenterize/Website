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
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

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
        <a href="/"><img src="/logo-rect.png" alt="NewsMedia" class="logo"></a>
        <div class='social'>
            <a href="http://facebook.com" target='blank'><i class="fab fa-facebook fa-2x"></i></a>
            <a href="http://twitter.com" target='blank'><i class="fab fa-twitter fa-2x"></i></a>
            <a href="http://instagram.com" target='blank'><i class="fab fa-instagram fa-2x"></i></a>
            <a href="http://youtube.com" target='blank'><i class="fab fa-youtube fa-2x"></i></a>
        </div>
        <ul>
            <li><a href="/">Home</a></li>
            @if (Route::has('login'))
                @auth
                    <li><a href="{{ url('/dashboard') }}"
                           class="ml-5 no-underline hover:underline uppercase">登入後臺</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="ml-5 no-underline hover:underline uppercase">登入</a>
                    </li>

                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="ml-5 no-underline hover:underline uppercase">登出</a>
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
            <img src="/logo-rect.png" alt="logo">
            <p>網站建置中～</p>
        </div>
        <div>
            <h3>郵寄電子報</h3>
            <p>輸入你的電子信箱來獲取電子報</p>
            <form>
                <input type="email" placeholder="Email:" required>
                <input type="submit" value="Subscribe" class='btn btn-primary'>
            </form>
        </div>
        <div>
            <h3>網站連結</h3>
            <ul class='list'>
                <li><a href="https://policy.hsuan.app">隱私權政策及使用條款</a></li>
                <li><a href="#">Help and Support</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div>
            <h2>加入我們</h2>
            <p>立即在Facebook上關注我們</p>
            <a href="#" class="btn btn-secondary">Join Now</a>
        </div>
        <div>
            <p>
                版面設計：<a href="https://github.com/imshashikantdev/WTFNews" target="_blank">NewsGrid (MIT)</a> &copy;
                {{\Carbon\Carbon::now()->year}} <a href="https://hsuan.app" target="_blank">Hsuan Internet</a>
            </p>
        </div>
    </div>
</footer>
</body>
</html>

