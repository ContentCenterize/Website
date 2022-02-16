<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdPartyValidation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', # DNS, HTML, Meta
        'validate_string',
        'validated_at'
    ];

    public function third_party()
    {
        return $this->belongsTo(ThirdParty::class);
    }
}
