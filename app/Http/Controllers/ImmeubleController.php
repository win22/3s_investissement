<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Immeuble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImmeubleController extends Controller
{
    public function index()
    {
        return view('backend.immeuble.add');
    }

    public function all_immeuble()
    {
        return view('backend.immeuble.all');
    }

    public function save(Request $request)
    {
        request()->validate([
            'name' => 'required', 'max: 60',
            'short_description' => 'required', 'max: 60',
            'large_description' => 'required',
            'ville' => 'required', 'max:30',
            'adresse' => 'required', 'max:90',
            'pays' => 'required', 'max:90',
            'align' => 'required', 'max:90',
            'type' => 'required', 'max:90',
            'devise' => 'required', 'max:2',
            'prix' => 'required', 'max:90',
            'etage' => 'required',
            'piscine' => 'required',
            'dimension' => 'required',
            'option' => 'required', 'max:3',
            'sold' => 'required', 'max:3',
            'garage' => 'required', 'max:3',
            'appartement' => 'required', 'max:3',
        ]);
        $appart = Appartement::create([
            'admin_id' => Auth::user()->role,
            'name' => request('name'),
            'short_description' => request('short_description'),
            'large_description' => request('large_description'),
            'ville' => request('ville'),
            'adresse' => request('adresse'),
            'pays' => request('pays'),
            'align' => request('align'),
            'type' => request('type'),
            'prix' => request('prix'),
            'devise' => request('devise'),
            'sold' => request('sold'),
            'pourcentage' => $pourcentage,
            'chambre' => request('chambre'),
            'cuisine' => request('cuisine'),
            'sale_de_bain' => request('sale_de_bain'),
            'option' => request('option'),
            'garage' => request('garage'),
            'piece' => request('piece'),
            'salon' => request('salon'),
            'status' => 0,
            'image' => $defaut_image
        ]);
        $photo = $request->file('images');
        if ($photo) {
            $image_name = str_random(6);
            $text = strtolower($photo->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $text;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $photo->move($upload_path, $image_full_name);
            if ($success) {
                Appartement::findOrFail($appart->id)->images()->create([
                    'image' => $image_url
                ]);
            }
        }
        return redirect('/all_appartement')->with(
            Session::put('message', 'Un appartement a été ajouté ')
        );
    }
}
