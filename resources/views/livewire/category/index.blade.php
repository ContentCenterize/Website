<div class="overflow-x-auto">
    <table class="table w-full">
        <thead>
        <tr>
            <th>ID</th>
            <th>名稱</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td><div class="btn btn-primary" disabled>編輯</div></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

