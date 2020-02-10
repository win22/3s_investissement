<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Immeuble extends Model
{
    protected $fillable =
        [
            'admin_id',
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
            'sold',
            'pourcentage',
            'devise',
            'niveau',
            'appartement',
            'garage',
            'image',
            'status',
        ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
