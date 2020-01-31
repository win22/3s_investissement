<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'appartement_id',
        'burreau_id',
        'entrepot_id',
        'immeubles_id',
        'magasin_id',
        'terrain_id',
        'hectare_id',
        'villa_id',
        'image'];
}
