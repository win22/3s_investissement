<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Image;
use App\Models\Magasin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use File;
class MagasinController extends Controller
{
    public function index()
    {
        return view('backend.magasin.add');
    }
    public function all_magasin()
    {
        $magasins_louer = Magasin::where('option', 1)
            ->latest()
            ->paginate(6);
        $nb_l = $magasins_louer->count();

        $magasins_vendre = Magasin::where('option', 2)
            ->latest()
            ->paginate(6);
        $nb_v = $magasins_vendre->count();

        $magasins_promo = Magasin::where('sold', 1)
            ->latest()
            ->paginate(6);
        $nb_p = $magasins_promo->count();
        return view('backend.magasin.all', ['magasins_louer' => $magasins_louer])
            ->with(['magasins_vendre'=> $magasins_vendre])
            ->with(['magasins_promo'=> $magasins_promo])
            ->with('nb_l', $nb_l)
            ->with('nb_v', $nb_v)
            ->with('nb_p', $nb_p);

    }

    public function active($id)
    {
        $magasin = Magasin::findOrFail($id);
        $magasin->status = 1;
        $magasin->admin_id = Auth::id();
        $magasin->save();
        return back()->with(
            Session::put('message', "Le magasin " . $magasin->name . "a été activé")
        );

    }

    public function unactive($id)
    {
        $magasin = Magasin::findOrFail($id);
        $magasin->status = 0;
        $magasin->admin_id = Auth::id();
        $magasin->save();
        return back()->with(
            Session::put('message', "Le magasin " . $magasin->name . "a été désactivé")
        );
    }


    public function save(Request $request)
    {
        request()->validate([
            'name' => ['required', 'max: 60'],
            'short_description' => ['required', 'max: 150'],
            'large_description' => ['required'],
            'ville' => ['required', 'max:30'],
            'adresse' => ['required', 'max:90'],
            'pays' => ['required', 'max:90'],
            'align' => ['required', 'max:90'],
            'type' => ['required', 'max:90'],
            'devise' => ['required', 'max:2'],
            'prix' => ['required', 'max:90'],
            'dimension' => ['required'],
            'option' => ['required', 'max:3'],
            'sold' => ['required', 'max:3'],
            'image' => ['required', 'image'],
            'images' => ['required']
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
        $magasin = Magasin::create([
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
                Magasin::findOrFail($magasin->id)->images()->create([
                    'image' => $image_url
                ]);
            }
        endforeach;
        return redirect('/all_mag')->with(
            Session::put('message', 'Un magasin a été ajouté ')
        );
    }

    public function updates(Request $request, $id)
    {
        request()->validate([
            'name' => ['required', 'max: 60'],
            'short_description' => ['required', 'max: 150'],
            'large_description' => ['required'],
            'ville' => ['required', 'max:30'],
            'adresse' => ['required', 'max:90'],
            'pays' => ['required', 'max:90'],
            'align' => ['required', 'max:90'],
            'type' => ['required', 'max:90'],
            'devise' => ['required', 'max:2'],
            'prix' => ['required', 'max:90'],
            'dimension' => ['required'],
            'option' => ['required', 'max:3'],
            'sold' => ['required', 'max:3'],
        ]);

        $magasin = Magasin::findOrFail($id);
        $magasin->name = request('name');
        $magasin->short_description = request('short_description');
        $magasin->large_description = request('large_description');
        $magasin->adresse = request('adresse');
        $magasin->ville = request('ville');
        $magasin->pays = request('pays');
        $magasin->type = request('type');
        $magasin->option = request('option');
        $magasin->align = request('align');
        $magasin->prix = request('prix');
        $magasin->devise = request('devise');
        $magasin->sold = request('sold');
        $magasin->pourcentage = request('pourcentage');
        $magasin->dimension = request('dimension');
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
                $magasin->image = $image_url;
                $img_p = Magasin::findOrFail($id);
                File::delete($img_p->image);
                $img_p->image = $image_url;
            }
        }

        $photo = $request->file('images');
        if ($photo) {
            $imag = Image::where('magasin_id', $id)->get();
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
                    Magasin::findOrFail($magasin->id)->images()->create([
                        'image' => $image_url
                    ]);
                }
            endforeach;
        }
        $magasin->admin_id = Auth::id();
        $magasin->save();
        return redirect('/detail_mag/' . $magasin->id)->with(
            Session::put('message', " Information modifiée avec succès !")
        );

    }

    public function supprimer($id)
    {
        $magasin = Magasin::findOrFail($id);
        $imag = Image::where('magasin_id', $id)->get();
        foreach ($imag as $im):
            File::delete($im->image);
            $im->delete();
        endforeach;
        File::delete($magasin->image);
        $magasin->delete();

        return back()->with(
            Session::put('message', "Le magasin " . $magasin->name . "a été supprimé")
        );
    }

    public function details($id)
    {
        $detail_magasin = Magasin::findOrFail($id);
        $admin_name = Admin::find($detail_magasin->admin_id);
        return view('backend.magasin.details', ['magasin' => $detail_magasin])
            ->with(['admin_name' => $admin_name]);
    }

    public function edits($id)
    {
        $magasin = Magasin::findOrFail($id);
        return view('backend.magasin.edit', ['magasin' => $magasin]);
    }


    //c             onfig pour le site
    public function details_magasin_site($id)
    {
        $magasin = Magasin::findOrFail($id);
        $magasin_similaire = Magasin::where('id', '!=', $id)
            ->where('status', 1)
            ->take(8)
            ->get();
        $nb_mag = $magasin_similaire->count();

        return view('site.magasin.details', ['magasin' => $magasin])
            ->with(['nb_mag' => $nb_mag])
            ->with(['magasin_similaire' => $magasin_similaire]);
    }

    public function all_louer()
    {
        $magasin_louer = Magasin::where('status', 1)
            ->where('option', 1)
            ->latest()
            ->paginate(3);
        $nb_mag = $magasin_louer->count();
        return view('site.magasin.louer', ['magasin_louer' => $magasin_louer])
            ->with(['nb_mag' => $nb_mag]);
    }

    public function all_vendre()
    {
        $magasin_vendre = Magasin::where('status', 1)
            ->where('option', 2)
            ->latest()
            ->paginate(3);
        $nb_mag = $magasin_vendre->count();
        return view('site.magasin.vendre', ['magasin_vendre' => $magasin_vendre])
            ->with(['nb_mag' => $nb_mag]);
    }


    public function all_promo()
    {
        $magasin_promo = Magasin::where('status', 1)
            ->where('sold', 1)
            ->latest()
            ->paginate(3);
        $nb_mag = $magasin_promo->count();
        return view('site.magasin.promo', ['magasin_promo' => $magasin_promo])
            ->with(['nb_mag' => $nb_mag]);
    }

    //search
    public function search()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $magasins = Magasin::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(3);
        $nb_mag = $magasins->count();
        return view('site.magasin.all_magasin', ['magasins' => $magasins])
            ->with(['nb_mag' => $nb_mag]);
    }

    public function search_louer()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $magasin_louer = Magasin::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 1)
            ->latest()
            ->paginate(3);
        $nb_mag = $magasin_louer->count();
        return view('site.magasin.louer', ['magasin_louer' => $magasin_louer])
            ->with(['nb_mag' => $nb_mag]);
    }

    public function search_vendre()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $magasin_vendre = Magasin::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 2)
            ->latest()
            ->paginate(3);
        $nb_mag = $magasin_vendre->count();
        return view('site.magasin.vendre', ['magasin_vendre' => $magasin_vendre])
            ->with(['nb_mag' => $nb_mag]);
    }

    public function search_promo()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $magasin_promo = Magasin::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('sold', 1)
            ->latest()
            ->paginate(3);
        $nb_mag = $magasin_promo->count();
        return view('site.magasin.promo', ['magasin_promo' => $magasin_promo])
            ->with(['nb_mag' => $nb_mag]);
    }
}
