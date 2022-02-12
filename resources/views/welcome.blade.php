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
        <link href="https://blog.laravel.com/css/theme.css?id=fd1ba6f0744021eebaf9" rel="stylesheet">

        <!-- Google analytics tracking code goes here -->

    </head>

    <body class="antialiased">
        <header class="py-5 mb-10">
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
                                <a href="{{ url('/dashboard') }}" class="ml-5 no-underline hover:underline uppercase">Dashboard</a>
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
            @foreach($posts as $post)
                <a class="no-underline transition block border border-lighter w-full mb-10 p-5 rounded post-card" href="https://blog.laravel.com/laravel-v9-released">
                    <div class="flex flex-col justify-between flex-1">
                        <div>
                            <h2 class="font-sans leading-normal block mb-6">
                                {{$post->title}}
                            </h2>

                            <div class="leading-normal mb-6 font-serif leading-loose">
                                {!! mb_substr(strip_tags($post->content), 0, 200).'...' !!}
                            </div>
                        </div>

                        <div class="flex items-center text-sm text-light">
                            <img src="https://www.gravatar.com/avatar/{{md5($post->third_party->user->email)}}" class="w-10 h-10 rounded-full" title="Dries Vints">
                            <span class="ml-2">{{$post->third_party->user->name}}</span>
                            <span class="ml-auto">{{$post->updated_at}}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </body>
</html>
