<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    //
    protected $fillable = [
        'appartement_id',
        'bureau_id',
        'entreprot_id',
        'immeuble_id',
        'magasin_id',
        'terrain_id',
        'hectare_id',
        'villa_id',
        'image'
    ];

}
