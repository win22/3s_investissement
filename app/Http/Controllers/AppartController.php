<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\tbl_appartement;
use App\tbl_image;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use MongoDB\Driver\Session;

class AppartController extends Controller
{
    public function index()
    {
        return view('backend.appartement.add');
    }

   public function save()
   {
//       request()->validate([
//           'name' => 'required', 'max: 60',
//           'short_description' => 'required', 'max: 60',
//           'large_description' => 'required',
//           'ville' => 'required', 'max:30',
//           'adresse' => 'required', 'max:90',
//           'pays' => 'required', 'max:90',
//           'align' => 'required', 'max:90',
//           'type' => 'required', 'max:90',
//           'devise' => 'required', 'max:2',
//           'prix' => 'required', 'max:90',
//           'chambre' => 'required', 'max:3',
//           'cuisine' => 'required', 'max:3',
//           'sale_de_bain' => 'required', 'max:3',
//           'option' => 'required', 'max:3',
//           'piece' => 'required', 'max:3',
//           'solde' => 'required', 'max:3',
//           'salon' => 'required', 'max:3',
//           'image' => 'required', 'max:20',
//       ]);

//       $appart = Appartement::create([
//           'name' => request('name'),
//           'short_description' => request('short_description'),
//           'large_description' => request('large_description'),
//           'ville' => request('ville'),
//           'adresse' => request('adresse'),
//           'pays' => request('pays'),
//           'align' => request('align'),
//           'type' => request('type'),
//           'prix' => request('prix'),
//           'devise' => request('devise'),
//           'solde' => request('solde'),
//           'chambre' => request('chambre'),
//           'cuisine' => request('cuisine'),
//           'sale_de_bain' => request('sale_de_bain'),
//           'option' => request('option'),
//           'piece' => request('piece'),
//           'salon' => request('salon'),
//       ]);
//       return redirect('/dashboard')->with(
//         Session::put('message', 'Un appartement a été ajouté ')
//       );

       dump(Input::all());

   }
}
