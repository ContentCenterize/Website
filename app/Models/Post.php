<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'post_id_in_thirdparty'
    ];

    public function third_party(){
        return $this->belongsTo(ThirdParty::class);
    }
}
