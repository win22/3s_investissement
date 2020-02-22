<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Image;
use App\Models\Entrepot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use File;
class EntrepotController extends Controller
{
    public function index()
    {
        return view('backend.entrepot.add');
    }
    public function all_entrepot()
    {
        $entrepots_louer = Entrepot::where('option', 1)
            ->latest()
            ->paginate(6);
        $nb_l = $entrepots_louer->count();

        $entrepots_vendre = Entrepot::where('option', 2)
            ->latest()
            ->paginate(6);
        $nb_v = $entrepots_vendre->count();

        $entrepots_promo = Entrepot::where('sold', 1)
            ->latest()
            ->paginate(6);
        $nb_p = $entrepots_promo->count();
        return view('backend.entrepot.all', ['entrepots_louer' => $entrepots_louer])
            ->with(['entrepots_vendre'=> $entrepots_vendre])
            ->with(['entrepots_promo'=> $entrepots_promo])
            ->with('nb_l', $nb_l)
            ->with('nb_v', $nb_v)
            ->with('nb_p', $nb_p);

    }

    public function active($id)
    {
        $entrepot = Entrepot::findOrFail($id);
        $entrepot->status = 1;
        $entrepot->admin_id = Auth::id();
        $entrepot->save();
        return back()->with(
            Session::put('message', "Le entrepot " . $entrepot->name . "a été activé")
        );

    }

    public function unactive($id)
    {
        $entrepot = Entrepot::findOrFail($id);
        $entrepot->status = 0;
        $entrepot->admin_id = Auth::id();
        $entrepot->save();
        return back()->with(
            Session::put('message', "Le entrepot " . $entrepot->name . "a été désactivé")
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
        $entrepot = Entrepot::create([
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
                entrepot::findOrFail($entrepot->id)->images()->create([
                    'image' => $image_url
                ]);
            }
        endforeach;
        return redirect('/all_entr')->with(
            Session::put('message', 'Un entrepot a été ajouté ')
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

        $entrepot = Entrepot::findOrFail($id);
        $entrepot->name = request('name');
        $entrepot->short_description = request('short_description');
        $entrepot->large_description = request('large_description');
        $entrepot->adresse = request('adresse');
        $entrepot->ville = request('ville');
        $entrepot->pays = request('pays');
        $entrepot->type = request('type');
        $entrepot->option = request('option');
        $entrepot->align = request('align');
        $entrepot->prix = request('prix');
        $entrepot->devise = request('devise');
        $entrepot->sold = request('sold');
        $entrepot->pourcentage = request('pourcentage');
        $entrepot->dimension = request('dimension');
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
                $entrepot->image = $image_url;
                $img_p = Entrepot::findOrFail($id);
                File::delete($img_p->image);
                $img_p->image = $image_url;
            }
        }

        $photo = $request->file('images');
        if ($photo) {
            $imag = Image::where('entrepot_id', $id)->get();
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
                    Entrepot::findOrFail($entrepot->id)->images()->create([
                        'image' => $image_url
                    ]);
                }
            endforeach;
        }
        $entrepot->admin_id = Auth::id();
        $entrepot->save();
        return redirect('/detail_entr/' . $entrepot->id)->with(
            Session::put('message', " Information modifiée avec succès !")
        );

    }

    public function supprimer($id)
    {
        $entrepot = Entrepot::findOrFail($id);
        $imag = Image::where('entrepot_id', $id)->get();
        foreach ($imag as $im):
            File::delete($im->image);
            $im->delete();
        endforeach;
        File::delete($entrepot->image);
        $entrepot->delete();

        return back()->with(
            Session::put('message', "Le entrepot " . $entrepot->name . "a été supprimé")
        );
    }

    public function details($id)
    {
        $detail_entrepot = Entrepot::findOrFail($id);
        $admin_name = Admin::find($detail_entrepot->admin_id);
        return view('backend.entrepot.details', ['entrepot' => $detail_entrepot])
            ->with(['admin_name' => $admin_name]);
    }

    public function edits($id)
    {
        $entrepot = Entrepot::findOrFail($id);
        return view('backend.entrepot.edit', ['entrepot' => $entrepot]);
    }


    //c             onfig pour le site
    public function details_entrepot_site($id)
    {
        $entrepot = Entrepot::findOrFail($id);
        $entrepot_similaire = Entrepot::where('id', '!=', $id)
            ->where('status', 1)
            ->take(8)
            ->get();
        $nb_entr = $entrepot_similaire->count();

        return view('site.entrepot.details', ['entrepot' => $entrepot])
            ->with(['nb_entr' => $nb_entr])
            ->with(['entrepot_similaire' => $entrepot_similaire]);
    }

    public function all_louer()
    {
        $entrepot_louer = Entrepot::where('status', 1)
            ->where('option', 1)
            ->latest()
            ->paginate(3);
        $nb_entr = $entrepot_louer->count();
        return view('site.entrepot.louer', ['entrepot_louer' => $entrepot_louer])
            ->with(['nb_entr' => $nb_entr]);
    }

    public function all_vendre()
    {
        $entrepot_vendre = Entrepot::where('status', 1)
            ->where('option', 2)
            ->latest()
            ->paginate(3);
        $nb_entr = $entrepot_vendre->count();
        return view('site.entrepot.vendre', ['entrepot_vendre' => $entrepot_vendre])
            ->with(['nb_entr' => $nb_entr]);
    }


    public function all_promo()
    {
        $entrepot_promo = Entrepot::where('status', 1)
            ->where('sold', 1)
            ->latest()
            ->paginate(3);
        $nb_entr = $entrepot_promo->count();
        return view('site.entrepot.promo', ['entrepot_promo' => $entrepot_promo])
            ->with(['nb_entr' => $nb_entr]);
    }

    //search
    public function search()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $entrepots = Entrepot::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(3);
        $nb_entr = $entrepots->count();
        return view('site.entrepot.all_entrepot', ['entrepots' => $entrepots])
            ->with(['nb_entr' => $nb_entr]);
    }

    public function search_louer()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $entrepot_louer = Entrepot::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 1)
            ->latest()
            ->paginate(3);
        $nb_entr = $entrepot_louer->count();
        return view('site.entrepot.louer', ['entrepot_louer' => $entrepot_louer])
            ->with(['nb_entr' => $nb_entr]);
    }

    public function search_vendre()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $entrepot_vendre = Entrepot::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 2)
            ->latest()
            ->paginate(3);
        $nb_entr = $entrepot_vendre->count();
        return view('site.entrepot.vendre', ['entrepot_vendre' => $entrepot_vendre])
            ->with(['nb_entr' => $nb_entr]);
    }

    public function search_promo()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $entrepot_promo = Entrepot::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('sold', 1)
            ->latest()
            ->paginate(3);
        $nb_entr = $entrepot_promo->count();
        return view('site.entrepot.promo', ['entrepot_promo' => $entrepot_promo])
            ->with(['nb_entr' => $nb_entr]);
    }
}
