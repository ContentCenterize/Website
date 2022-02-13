<x-blog-layout>
    <div class="flex items-center text-sm text-light">
        <img src="https://www.gravatar.com/avatar/{{md5($post->third_party->user->email)}}"
             class="w-10 h-10 rounded-full" title="Dries Vints">
        <span class="ml-2">{{$post->third_party->user->name}}</span>
        <span class="ml-auto">{{$post->updated_at}}</span>
    </div>

    <div class="my-6 font-serif leading-loose card p-6 shadow-2xl prose-base break-words">
        <h2 class="font-sans block mb-6 mt-6 font-bold ">
            {{$post->title}}
        </h2>

        {!! $post->content !!}
    </div>
</x-blog-layout>
