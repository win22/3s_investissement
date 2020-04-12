<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Villa;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use File;

class VillaController extends Controller
{
    public function index()
    {
        return view('backend.villa.add');
    }

    public function all_villa()
    {
        $villa = Villa::where('option', 1)
            ->latest()
            ->paginate(6);
        $nb = $villa->count();
        $villa_vendre = Villa::where('option', 2)
            ->latest()
            ->paginate(6);
        $nb_v = $villa_vendre->count();
        $villa_sold = Villa::where('sold', 1)
            ->latest()
            ->paginate(6);
        $nb_s = $villa_sold->count();
        return view('backend.villa.all', ['all_villa' => $villa])
            ->with(['nb' => $nb])
            ->with(['all_villa_vendre' => $villa_vendre])
            ->with(['nb_v' => $nb_v])
            ->with(['all_villa_sold' => $villa_sold])
            ->with(['nb_s' => $nb_s]);

    }

    public function search_data()
    {
        $search = request('search');
        $villas =  Villa::where('name', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(6);
        $nb = $villas->count();
        return view('backend.villa.search', ['villas' => $villas])
            ->with(['nb' => $nb]);
    }

    public function save(Request $request)
    {
        request()->validate([
            'name' => ['required', 'max:60'],
            'short_description' => ['required', 'max: 150'],
            'large_description' => ['required'],
            'ville' => ['required', 'max:30'],
            'adresse' => ['required', 'max:90'],
            'pays' => ['required', 'max:90'],
            'align' => ['required', 'max:90'],
            'type' => ['required', 'max:90'],
            'devise' => ['required', 'max:2'],
            'prix' => ['required', 'max:90'],
            'chambre' => ['required', 'max:3'],
            'cuisine' => ['required', 'max:3'],
            'sale_de_bain' => ['required', 'max:3'],
            'option' => ['required', 'max:3'],
            'sold' => ['required', 'max:3'],
            'garage' => ['required', 'max:3'],
            'salon' => ['required', 'max:3'],
            'image' => ['required', 'image'],
            'images' => ['required',]
        ]);

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
        }

        $pourcentage = null;
        if (request('sold') == 1) {
            $pourcentage = request('pourcentage');
        } else {
            $pourcentage = null;
        }

        $villa = villa::create([
            'admin_id' => Auth::user()->id,
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
        foreach ($photo as $images):
            $image_name = str_random(6);
            $text = strtolower($images->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $text;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $images->move($upload_path, $image_full_name);
            if ($success) {
                villa::findOrFail($villa->id)->images()->create([
                    'image' => $image_url
                ]);
            }
        endforeach;
        return redirect('/all_villa')->with(
            Session::put('message', 'Une villa a été ajoutée ')
        );
    }

    public function updates(Request $request, $id)
    {
        request()->validate([
            'name' => ['required', 'max:60'],
            'short_description' => ['required', 'max: 150'],
            'large_description' => ['required'],
            'ville' => ['required', 'max:30'],
            'adresse' => ['required', 'max:90'],
            'pays' => ['required', 'max:90'],
            'align' => ['required', 'max:90'],
            'type' => ['required', 'max:90'],
            'devise' => ['required', 'max:2'],
            'prix' => ['required', 'max:90'],
            'chambre' => ['required', 'max:3'],
            'cuisine' => ['required', 'max:3'],
            'sale_de_bain' => ['required', 'max:3'],
            'option' => ['required', 'max:3'],
            'sold' => ['required', 'max:3'],
            'garage' => ['required', 'max:3'],
            'salon' => ['required', 'max:3'],
        ]);

        $villa = villa::findOrFail($id);
        $villa->name = request('name');
        $villa->short_description = request('short_description');
        $villa->large_description = request('large_description');
        $villa->adresse = request('adresse');
        $villa->ville = request('ville');
        $villa->pays = request('pays');
        $villa->type = request('type');
        $villa->option = request('option');
        $villa->align = request('align');
        $villa->prix = request('prix');
        $villa->devise = request('devise');
        $villa->sold = request('sold');
        $villa->pourcentage = request('pourcentage');
        $villa->chambre = request('chambre');
        $villa->cuisine = request('cuisine');
        $villa->garage = request('garage');
        $villa->salon = request('salon');
        $villa->sale_de_bain = request('cuisine');
        $image = $request->file('image');
        if ($image) {
            request()->validate([
                'image' => ['required', 'image']
            ]);
            $image_name = str_random(6);
            $text = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $text;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $villa->image = $image_url;
                $img_p = Villa::findOrFail($id);
                File::delete($img_p->image);
                $img_p->image = $image_url;
            }
        }

        $photo = $request->file('images');
        if ($photo) {
            $imag = Image::where('villa_id', $id)->get();
            foreach ($imag as $im):
                File::delete($im->image);
                $im->delete();
            endforeach;
            foreach ($photo as $images):
                $image_name = str_random(6);
                $text = strtolower($images->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $text;
                $upload_path = 'image/';
                $image_url = $upload_path . $image_full_name;
                $success = $images->move($upload_path, $image_full_name);
                if ($success) {
                    villa::findOrFail($villa->id)->images()->create([
                        'image' => $image_url
                    ]);
                }
            endforeach;
        }
        $villa->admin_id = Auth::id();
        $villa->save();
        return redirect('/detail_villa/' . $villa->id)->with(
            Session::put('message', " Information modifiée avec succès !")
        );

    }


    public function active($id)
    {
        $villa = villa::findOrFail($id);
        $villa->status = 1;
        $villa->admin_id = Auth::id();
        $villa->save();
        return redirect('/all_villa')->with(
            Session::put('message', 'Vous avez activé la villa ' .$villa->name)
        );

    }

    public function unactive($id)
    {
        $villa = villa::findOrFail($id);
        $villa->status = 0;
        $villa->admin_id = Auth::id();
        $villa->save();
        return redirect('/all_villa')->with(
            Session::put('message', 'Vous avez desactivé la villa ' .$villa->name)
        );
    }

    public function supprimer($id)
    {
        $villa = villa::findOrFail($id);
        $imag = Image::where('villa_id', $id)->get();
        foreach ($imag as $im):
            File::delete($im->image);
            $im->delete();
        endforeach;
        File::delete($villa->image);
        $villa->delete();
        return redirect('/all_villa')->with(
            Session::put('message', "Vous avez supprimé une villa ")
        );
    }

    public function details($id)
    {
        $detail_villa = villa::findOrFail($id);
        $admin_name = Admin::find($detail_villa->admin_id);
        return view('backend.villa.details', ['villa' => $detail_villa])
            ->with(['admin_name' => $admin_name]);
    }

    public function edits($id)
    {
        $villa = villa::findOrFail($id);
        return view('backend.villa.edit', ['villa' => $villa]);
    }


    //config pour le site
    public function details_villa_site($id)
    {
        $villa = villa::findOrFail($id);
        $villa_similaire = villa::where('id', '!=', $id)
            ->where('status', 1)
            ->take(8)
            ->get();
        $nb_vill = $villa_similaire->count();

        return view('site.villa.details', ['villa' => $villa])
            ->with(['nb_vill' => $nb_vill])
            ->with(['villa_similaire' => $villa_similaire]);
    }

    public function all_louer()
    {
        $villa_louer = villa::where('status', 1)
            ->where('option', 1)
            ->latest()
            ->paginate(3);
        $nb_vill = $villa_louer->count();
        return view('site.villa.louer', ['villa_louer' => $villa_louer])
            ->with(['nb_vill' => $nb_vill]);
    }

    public function all_vendre()
    {
        $villa_vendre = villa::where('status', 1)
            ->where('option', 2)
            ->latest()
            ->paginate(3);
        $nb_vill = $villa_vendre->count();
        return view('site.villa.vendre', ['villa_vendre' => $villa_vendre])
            ->with(['nb_vill' => $nb_vill]);
    }


    public function all_promo()
    {
        $villa_promo = villa::where('status', 1)
            ->where('sold', 1)
            ->latest()
            ->paginate(3);
        $nb_vill = $villa_promo->count();
        return view('site.villa.promo', ['villa_promo' => $villa_promo])
            ->with(['nb_vill' => $nb_vill]);
    }

    //search
    public function search()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $villas = villa::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(3);
        $nb_vill = $villas->count();
        return view('site.villa.all_villa', ['villas' => $villas])
            ->with(['nb_vill' => $nb_vill]);
    }

    public function search_louer()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $villa_louer = villa::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 1)
            ->latest()
            ->paginate(3);
        $nb_vill = $villa_louer->count();
        return view('site.villa.louer', ['villa_louer' => $villa_louer])
            ->with(['nb_vill' => $nb_vill]);
    }

    public function search_vendre()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $villa_vendre = villa::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 2)
            ->latest()
            ->paginate(3);
        $nb_vill = $villa_vendre->count();
        return view('site.villa.vendre', ['villa_vendre' => $villa_vendre])
            ->with(['nb_vill' => $nb_vill]);
    }

    public function search_promo()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $villa_promo = villa::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('sold', 1)
            ->latest()
            ->paginate(3);
        $nb_vill = $villa_promo->count();
        return view('site.villa.promo', ['villa_promo' => $villa_promo])
            ->with(['nb_vill' => $nb_vill]);
    }


}
