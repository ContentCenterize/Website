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
        'updated'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function posts(){
        return $this->hasOne(Post::class);
    }

    public function getNameAttribute(){
        return Config::get("thirdparty.all.{$this->type}.name");
    }
}
