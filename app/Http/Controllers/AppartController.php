<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppartController extends Controller
{
    public function index()
    {
        return view('backend.appartement.add');
    }

   public function save(Request $request)
   {
       request()->validate([
           'appart_name' => 'required', 'max: 60',
           'appart_short_description' => 'required', 'max: 60',
           'appart_long_description' => 'required',
           'appart_ville' => 'required', 'max:30',
           'appart_adresse' => 'required', '90',
           'appart_pays' => 'required', '90',
           'appart_align' => 'required', '90',
           'appart_type' => 'required', '90',
           'appart_prix' => 'required', '90',
           'appart_chambre' => 'required', '2',
           'appart_cuisine' => 'required', '2',
           'appart_sall_bain' => 'required', '2',
           'appart_option' => 'required', '2',
           'appart_piece' => 'required', '2',
           'appart_salon' => 'required', '2',
           //'appart_image' => 'required', '10',
       ]);


   }
}
