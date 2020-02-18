<?php

namespace App\Http\Controllers;

use App\Models\Immeuble;
use Illuminate\Http\Request;

class ImmeubleController extends Controller
{
    public function all_immeuble()
    {

        return view('backend.immeuble.all');
    }
}
