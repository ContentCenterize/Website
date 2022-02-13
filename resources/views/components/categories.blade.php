<aside id="categories" class="card">
    <h2>分類</h2>
    <ul class="list">
        @foreach(\App\Models\Category::all() as $category)
            <li><a href="#"><i class="fas fa-chevron-right"></i>{{$category->name}}</a></li>
        @endforeach
    </ul>
</aside>
