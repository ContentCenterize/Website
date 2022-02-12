<div class="overflow-x-auto">
    @if($posts->count() != 0)
        <table class="table w-full">
            <thead>
            <tr>
                <th>標題</th>
                <th>文章於第三方ID</th>
                <th>第三方類別</th>
                <th>顯示？</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th>{{$post->title}}</th>
                    @if($post->third_party()->first()->type == 'blogger')
                        <td>{{explode(':', $post->post_id_in_thirdparty)[2]}}</td>
                    @else
                        <td>{{$post->post_id_in_thirdparty}}</td>
                    @endif
                    <td>{{$post->third_party()->first()->name}}</td>
                    <td>
                        <div class="flex justify-center">
                            <div class="form-check form-switch">
                                <input
                                    class="form-check-input appearance-none w-9 -ml-10 rounded-full float-left h-5 align-top bg-white bg-no-repeat bg-contain focus:outline-none cursor-pointer shadow-sm"
                                    type="checkbox" id="flexSwitchCheckChecked"
                                    wire:click="toggleVisible({{$post->id}})"
                                    @if($post->visible)
                                    checked
                                    @endif
                                >
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($post->third_party()->first()->type == 'blogger')
                            <a href="https://www.blogger.com/blog/post/edit/{{get_id_from_blogger_id($post->post_id_in_thirdparty)['blog']}}/{{get_id_from_blogger_id($post->post_id_in_thirdparty)['post']}}"
                               target="_blank"
                               class="btn btn-primary"
                            >編輯</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">
            <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     class="w-6 h-6 mx-2 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
                <label>目前沒有文章</label>
            </div>
        </div>
    @endif

</div>

