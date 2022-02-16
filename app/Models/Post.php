<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Viewable
{
    use HasFactory;
    use InteractsWithViews;
    protected $fillable = [
        'title',
        'content',
        'post_id_in_thirdparty',
        'hide',
        'category_id',
        'level'
    ];

    protected $casts = [
        'hide' => 'boolean',
        'level' => 'integer'
    ];

    public function third_party(){
        return $this->belongsTo(ThirdParty::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
