<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\Appartement;
use App\tbl_appartement;
use App\tbl_image;
use Session;
use Illuminate\Support\Facades\Input;
use function Couchbase\defaultEncoder;


class AppartController extends Controller
{
    public function index()
    {
        return view('backend.appartement.add');
    }

    public function all_appart()
    {
        $appart = Appartement::where('option', 1)
            ->where('sold', 2)
            ->paginate(6);
        $nb = $appart->count();
        $appart_vendre = Appartement::where('option', 2)
            ->where('sold', 2)
            ->paginate(6);
        $nb_v = $appart->count();
        $appart_sold = Appartement::where('sold', 2)
            ->paginate(6);
        $nb_s = $appart->count();
        return view('backend.appartement.all', ['all_appart' => $appart])
            ->with(['nb' => $nb])
            ->with(['all_appart_vendre' => $appart_vendre])
            ->with(['nb_v' => $nb_v])
            ->with(['appart_sold' => $appart_sold])
            ->with(['nb_s' => $nb_s]);


//        $appart = Appartement::find('1');
////        $image = $appart->images;
////return view('backend.appartement.all', ['appart' => $appart]);
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
            'chambre' => 'required', 'max:3',
            'cuisine' => 'required', 'max:3',
            'sale_de_bain' => 'required', 'max:3',
            'option' => 'required', 'max:3',
            'sold' => 'required', 'max:3',
            'garage' => 'required', 'max:3',
            'salon' => 'required', 'max:3',
        ]);
        $defaut_image = 'image/appart.jpg';
        $image = $request->file('image');
        if ($image) {
            $image_name = str_random(6);
            $text = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $text;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $defaut_image = $image_url;
            }
        } else {
            $defaut_image = 'image/appart.jpg';
        }

        $pourcentage = null;
        if (request('sold') == 1) {
            $pourcentage = request('pourcentage');
        } else {
            $pourcentage = null;
        }

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
        foreach ($photo as $image):
            $image_name = str_random(6);
            $text = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $text;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                Appartement::find($appart->id)->images()->create([
                    'image' => $image_url
                ]);
            }
        endforeach;

        return redirect('/all_appartement')->with(
            Session::put('message', 'Un appartement a été ajouté ')
        );
    }


    public function active($id)
    {
        $appart = Appartement::find($id);
        $appart->status = 1;
        $appart->save();
        return back()->with(
            Session::put('message', "L'appartement " . $appart->name . "a été activé")
        );

    }

    public function unactive($id)
    {
        $appart = Appartement::find($id);
        $appart->status = 0;
        $appart->save();
        return back()->with(
            Session::put('message', "L'appartement " . $appart->name . "a été desactivé")
        );
    }

    public function supprimer($id)
    {
        $appart = Appartement::find($id);
        $appart->delete();
        return back()->with(
            Session::put('message', "L'appartement " . $appart->name . "a été supprimé")
        );

    }
}


