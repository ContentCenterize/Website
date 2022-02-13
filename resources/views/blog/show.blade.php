@extends('layouts.blog')

@section('main')
    <div class="page-container">
        <article class="card">
            <img src="https://www.gravatar.com/avatar/{{md5($post->third_party->user->email)}}"
                 style="width: 2.5rem;height: 2.5rem;border-radius: 9999px;"
            >
            <h1 class='l-heading'>{{$post->title}}</h1>

            <div class="meta" style="margin-bottom: 1rem;">
                <p><i class="fa fa-user"></i>： {{$post->third_party->user->name}}&nbsp;&nbsp;&nbsp;<i
                        class="fa fa-calendar"></i>： {{$post->updated_at->shortRelativeToNowDiffForHumans()}}</p>
                <div class="category category-ent">Entertainment</div>
            </div>

            <div id="blog_content">
                {!! $post->content !!}
            </div>
        </article>
        <aside class="card bg-secondary" style="width: 10vw;">
            <h2>Join Our Club</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, nulla!</p>
            <a href="#" class='btn btn-dak btn-block'>Join Now</a>
        </aside>
        <x-categories/>
    </div>
@endsection
