<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identifikasi extends Model
{
    protected $fillable = [
        'uuid', 
        'face_token1', 
        'comparator_nik', 
        'face_token2',
        'confidence' 
    ];
}
