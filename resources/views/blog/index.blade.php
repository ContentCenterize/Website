@extends('layouts.blog')

@section('header')
    <header id='showcase'>
        <div class="container">
            <div class="showcase-container">
                <div class="showcase-content">
                    <div class="category category-sports">
                        Sports
                    </div>
                    <h1>Sports Article</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste deserunt, at laborum accusamus
                        veniam
                        reprehenderit deleniti reiciendis vel animi ipsum obcaecati ex nesciunt ipsa, voluptatibus
                        provident, quas doloribus molestias. Saepe.</p>
                    <a href="article.html" class="btn btn-primary">Read More</a>
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
                    <article class="card">
                        @if(get_first_img($post->content) != '')
                            <img src="{{get_first_img($post->content)}}" alt="photo">
                        @endif
                        <div>
                            <div class="category category-ent">
                                Entertainment
                            </div>
                            <h3>
                                <a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a>
                            </h3>
                            <p>{{ post_string_excerpt($post->content) }}</p>
                        </div>
                    </article>
                @endforeach
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
            </div>
        </div>
    </section>

@endsection
