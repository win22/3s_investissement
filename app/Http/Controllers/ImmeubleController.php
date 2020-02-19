<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Immeuble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Session;
class ImmeubleController extends Controller
{
    public function index()
    {
        return view('backend.immeuble.add');
    }

    public function all_immeuble()
    {
        $immeubs_louer = Immeuble::where('option', 1)
            ->latest()
            ->paginate(6);
        $nb_l = $immeubs_louer->count();
        return view('backend.immeuble.all', ['immeubs_louer' => $immeubs_louer])
            ->with('nb_l', $nb_l);
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
        $pourcentage = null;
        if (request('sold') == 1) {
            $pourcentage = request('pourcentage');
        } else {
            $pourcentage = null;
        }
        $image = $request->file('image');
        if ($image) {
            $image_name = str_random(6);
            $text = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $text;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $image = $image_url;
            }
        }
        $immeub = Immeuble::create([
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
            'option' => request('option'),
            'garage' => request('garage'),
            'piscine' => request('piscine'),
            'appartement' => request('appartement'),
            'etage' => request('etage'),
            'dimension' => request('dimension'),
            'status' => 0,
            'image' => $image
        ]);
        $photo = $request->file('images');
        foreach ($photo as $images):
            $image_name = str_random(6);
            $text = strtolower($images->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $text;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $images->move($upload_path, $image_full_name);
            if ($success) {
                Immeuble::findOrFail($immeub->id)->images()->create([
                    'image' => $image_url
                ]);
            }
        endforeach;
        return redirect('/dashboard')->with(
            Session::put('message', 'Un Immeuble a été ajouté ')
        );
    }


    public function details($id)
    {
        dump('detail immeuble');
    }
}
