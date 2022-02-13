<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto"/>
    </div>

    <div class="mt-8 text-2xl">
        歡迎來到資訊中心化服務平台
    </div>

    <div class="mt-6 text-gray-500">
        哇
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    @foreach($posts as $i => $post)

        <div
            @switch($i % 4)
            @case(0)
            class="p-6"
            @case(1)
            class="p-6 border-t border-gray-200 md:border-t-0 md:border-l"
            @case(2)
            class="p-6 border-t border-gray-200"
            @case(3)
            class="p-6 border-t border-gray-200 md:border-l"
            @endswitch
        >
            <div class="ml-12">
                <div class="mt-2 text-lg ">
                    {{$post->title}}
                </div>

                <div class="text-sm text-gray-500 mt-1">
                    {!!mb_substr( strip_tags($post->content), 0,200).'...'!!}
                </div>

                <a href="{{route('posts.show', ['post' => $post->id])}}" target="_blank">
                    <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>查看文章</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                <path fill-rule="evenodd"
                                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
