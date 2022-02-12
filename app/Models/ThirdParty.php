<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
