<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class ThirdParty extends Model
{
    use HasFactory;
    protected $fillable = [
        'base_url',
        'type',
        'description',
        'updated',
        'verified'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function getNameAttribute(){
        return Config::get("thirdparty.all.{$this->type}.name");
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($tp) {
            $tp->posts()->each(function($post) {
                $post->delete();
            });
        });
    }
}
