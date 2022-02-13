<x-blog-layout>
    @foreach($posts as $post)
        <a class="no-underline transition block border border-lighter w-full mb-10 p-5 rounded post-card" href="{{route('posts.show', ['post' => $post->id])}}">
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
</x-blog-layout>
