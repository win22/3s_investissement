<?php

namespace App\Http\Controllers;

use App\tbl_appartement;
use App\tbl_image;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
//           'appart_ville' => 'required', 'max:30',
//           'appart_adresse' => 'required', '90',
//           'appart_pays' => 'required', '90',
//           'appart_align' => 'required', '90',
//           'appart_type' => 'required', '90',
//           'appart_prix' => 'required', '90',
//           'appart_chambre' => 'required', '2',
//           'appart_cuisine' => 'required', '2',
//           'appart_sall_bain' => 'required', '2',
//           'appart_option' => 'required', '2',
//           'appart_piece' => 'required', '2',
//           'appart_salon' => 'required', '2',
           //'appart_image' => 'required', '10',
       ]);

       $post = tbl_appartement::create([
              'appart_name' => $request->appart_name,
              'appart_short_description' => $request->appart_short_description,
              'appart_long_description' => $request->appart_long_description,
           ]);
       $images = Input::file('images');
       foreach ($images as $image):
           $move = $image->move('public/images', $image->getClientOriginalName());
           if($move)
           {
               $imagedata = tbl_image::create([
                    'title' => $image->getClientOriginalName(),
                     'filename' => $image->getClientOriginalName()
               ]);
               var_dump('image upload');
               $post->images()->attach([$imagedata->id]);
           }
       endforeach;


   }
}
