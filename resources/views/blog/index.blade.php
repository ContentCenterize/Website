@extends('layouts.blog')

@section('header')
    <header id='showcase'>
        <div class="container">
            <div class="showcase-container">
                <div class="showcase-content">
                    <div class="category category-sports">
                        第一篇文章
                    </div>
                    <h1>所謂資訊中心化</h1>
                    <p>資訊中心化的本質及在於網際網路上資訊發展到最後，必定需要一個中心化之處來存放資訊，才能更好的整理。Google、Facebook即是此種道理</p>
                    <!--<a href="＃" class="btn btn-primary">Read More</a>-->
                </div>
            </div>
        </div>
    </header>
@endsection

@section('main-content')
    <section id="home-articles" class="py-2">
        <div class="container">
            <h2>精選文章</h2>
            <div class="articles-container">
                @foreach($posts as $post)
                    <article class="card {{get_color($post)}}">
                        @if(get_first_img($post->content) != '')
                            <img src="{{get_first_img($post->content)}}" alt="photo">
                        @endif
                        <div>
                            <div class="category category-ent">
                                {{$post->category()->first()->name}}
                            </div>
                            <h3>
                                <a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a>
                            </h3>
                            <p>{!! post_string_excerpt($post->content) !!}</p>
                        </div>
                    </article>
                @endforeach
                <!--
                <article class="card">
                    <img src="img/articles/ent1.jpg" alt="photo">
                    <div>
                        <div class="category category-ent">
                            Entertainment
                        </div>
                        <h3>
                            <a href="article.html">Lorem ipsum dolor sit amet.</a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, facere harum dicta dolor
                            molestias amet eos! Doloribus molestiae cum accusamus?</p>
                    </div>
                </article>

                <article class="card bg-dark">
                    <div class="category category-sports">
                        Sports
                    </div>
                    <h3>
                        <a href="article.html">Lorem ipsum dolor sit amet.</a>
                    </h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium numquam illum ipsa corporis
                        nemo beatae odio exercitationem vel, sit porro?</p>
                </article>

                <article class="card">
                    <img src="img/articles/tech1.jpg" alt="photo">
                    <div class="category category-tech">
                        Technology
                    </div>
                    <h3>
                        <a href="article.html">Lorem ipsum dolor sit amet.</a>
                    </h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum expedita quam quibusdam ipsum
                        nemo
                        maiores. Cum ipsa amet quaerat sunt.</p>
                </article>

                <article class="card">
                    <div class="category category-sports">
                        Sports
                    </div>
                    <h3>
                        <a href="article.html">Lorem ipsum dolor sit amet.</a>
                    </h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum expedita quam quibusdam ipsum
                        nemo
                        maiores. Cum ipsa amet quaerat sunt.</p>
                    <img src="img/articles/sports1.jpg" alt="photo">
                </article>

                <article class="card">
                    <img src="img/articles/tech2.jpg" alt="photo">
                    <div class="category category-tech">
                        Technology
                    </div>
                    <h3>
                        <a href="article.html">Lorem ipsum dolor sit amet.</a>
                    </h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum expedita quam quibusdam ipsum
                        nemo
                        maiores. Cum ipsa amet quaerat sunt.</p>
                </article>

                <article class="card bg-primary">
                    <div class="category category-sports">
                        Sports
                    </div>
                    <h3>
                        <a href="article.html">Lorem ipsum dolor sit amet.</a>
                    </h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium numquam illum ipsa corporis
                        nemo beatae odio exercitationem vel, sit porro?</p>
                </article>

                <article class="card">
                    <div>
                        <div class="category category-ent">
                            Entertainment
                        </div>
                        <h3>
                            <a href="article.html">Lorem ipsum dolor sit amet.</a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, facere harum dicta dolor
                            molestias amet eos! Doloribus molestiae cum accusamus?</p>
                    </div>
                    <img src="img/articles/ent2.jpg" alt="photo">
                </article>
                -->
            </div>
        </div>
    </section>

@endsection
