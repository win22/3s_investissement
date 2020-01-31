<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appartement extends Model
{
    protected $fillable =
        [
            'name',
            'short_description',
            'large_description',
            'ville',
            'adresse',
            'pays',
            'type',
            'option',
            'align',
            'prix',
            'devise',
            'chambre',
            'cuisine',
            'garage',
            'sale_de_bain',
            'image',
            'status',
        ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
