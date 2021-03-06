<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
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
            'piece',
            'garage',
            'etage',
            'dimension',
            'image',
            'status',
        ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
