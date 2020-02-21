<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Bureau;
use App\Models\Image;
use DemeterChain\B;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Session;
use File;
class BureauController extends Controller
{
    public function index()
    {
        return view('backend.bureau.add');
    }

    public function all_bureau()
    {
        $bureaux_louer = Bureau::where('option', 1)
            ->latest()
            ->paginate(6);
        $nb_l = $bureaux_louer->count();

        $bureaux_vendre = Bureau::where('option', 2)
            ->latest()
            ->paginate(6);
        $nb_v = $bureaux_vendre->count();

        $bureaux_promo = Bureau::where('sold', 1)
            ->latest()
            ->paginate(6);
        $nb_p = $bureaux_promo->count();
        return view('backend.bureau.all', ['bureaux_louer' => $bureaux_louer])
            ->with('bureaux_vendre', $bureaux_vendre)
            ->with('bureaux_promo', $bureaux_promo)
            ->with('nb_l', $nb_l)
            ->with('nb_v', $nb_v)
            ->with('nb_p', $nb_p);

    }

    public function active($id)
    {
        $bureau = Bureau::findOrFail($id);
        $bureau->status = 1;
        $bureau->admin_id = Auth::id();
        $bureau->save();
        return back()->with(
            Session::put('message', "Le bureau " . $bureau->name . "a été activé")
        );

    }

    public function unactive($id)
    {
        $bureau = Bureau::findOrFail($id);
        $bureau->status = 0;
        $bureau->admin_id = Auth::id();
        $bureau->save();
        return back()->with(
            Session::put('message', "Le bureau " . $bureau->name . "a été désactivé")
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
            'etage' => ['required'],
            'dimension' => ['required'],
            'option' => ['required', 'max:3'],
            'sold' => ['required', 'max:3'],
            'garage' => ['required', 'max:3'],
            'piece' => ['required', 'max:3'],
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
        $bureau = Bureau::create([
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
            'piece' => request('piece'),
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
                Bureau::findOrFail($bureau->id)->images()->create([
                    'image' => $image_url
                ]);
            }
        endforeach;
        return redirect('/all_villa')->with(
            Session::put('message', 'Un bureau a été ajouté ')
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
            'etage' => ['required'],
            'dimension' => ['required'],
            'option' => ['required', 'max:3'],
            'sold' => ['required', 'max:3'],
            'garage' => ['required', 'max:3'],
            'piece' => ['required', 'max:3'],
        ]);

        $bureau = Bureau::findOrFail($id);
        $bureau->name = request('name');
        $bureau->short_description = request('short_description');
        $bureau->large_description = request('large_description');
        $bureau->adresse = request('adresse');
        $bureau->ville = request('ville');
        $bureau->pays = request('pays');
        $bureau->type = request('type');
        $bureau->option = request('option');
        $bureau->align = request('align');
        $bureau->prix = request('prix');
        $bureau->devise = request('devise');
        $bureau->sold = request('sold');
        $bureau->pourcentage = request('pourcentage');
        $bureau->dimension = request('dimension');
        $bureau->etage = request('etage');
        $bureau->garage = request('garage');
        $bureau->piece = request('piece');
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
                $bureau->image = $image_url;
                $img_p = Bureau::findOrFail($id);
                File::delete($img_p->image);
                $img_p->image = $image_url;
            }
        }

        $photo = $request->file('images');
        if ($photo) {
            $imag = Image::where('bureau_id', $id)->get();
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
                    Bureau::findOrFail($bureau->id)->images()->create([
                        'image' => $image_url
                    ]);
                }
            endforeach;
        }
        $bureau->admin_id = Auth::id();
        $bureau->save();
        return redirect('/detail_bur/' . $bureau->id)->with(
            Session::put('message', " Information modifiée avec succès !")
        );

    }

    public function details($id)
    {
        $detail_bureau = Bureau::findOrFail($id);
        $admin_name = Admin::find($detail_bureau->admin_id);
        return view('backend.bureau.details', ['bureau' => $detail_bureau])
            ->with(['admin_name' => $admin_name]);
    }

    public function edits($id)
    {
        $bureau = Bureau::findOrFail($id);
        return view('backend.bureau.edit', ['bureau' => $bureau]);
    }

    public function supprimer($id)
    {
        $bureau = Bureau::findOrFail($id);
        $imag = Image::where('bureau_id', $id)->get();
        foreach ($imag as $im):
            File::delete($im->image);
            $im->delete();
        endforeach;
        File::delete($bureau->image);
        $bureau->delete();

        return back()->with(
            Session::put('message', "Le bureau " . $bureau->name . "a été supprimé")
        );
    }


    //          Configuration du site
    public function search(Request $request)
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $bureaux = Bureau::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(3);
        $nb_bur = $bureaux->count();
        return view('site.bureau.all_bureau', ['bureaux' => $bureaux])
            ->with(['nb_bur' => $nb_bur]);
    }

    public function details_site($id)
    {
        $bureau = Bureau::findOrFail($id);
        $bureau_similaire = Bureau::where('id', '!=', $id)
            ->where('status', 1)
            ->take(8)
            ->get();
        $nb_sim = $bureau_similaire->count();

        return view('site.bureau.details', ['bureau' => $bureau])
            ->with(['nb_sim' => $nb_sim])
            ->with(['bureau_similaire' => $bureau_similaire]);

    }

    public function all_louer()
    {
        $bureau_louer = Bureau::where('status', 1)
            ->where('option', 1)
            ->latest()
            ->paginate(3);
        $nb_bur = $bureau_louer->count();
        return view('site.bureau.louer', ['bureau_louer' => $bureau_louer])
            ->with(['nb_bur' => $nb_bur]);
    }

    public function all_vendre()
    {
        $bureau_vendre = Bureau::where('status', 1)
            ->where('option', 2)
            ->latest()
            ->paginate(3);
        $nb_bur = $bureau_vendre->count();
       return view('site.bureau.vendre', ['bureau_vendre' => $bureau_vendre])
        ->with(['nb_bur' => $nb_bur]);
    }

    public function all_promo()
    {
        $bureau_promo = Bureau::where('status', 1)
            ->where('sold', 1)
            ->latest()
            ->paginate(3);
        $nb_bur = $bureau_promo->count();
        return view('site.bureau.promo', ['bureau_promo' => $bureau_promo])
            ->with(['nb_bur' => $nb_bur]);
    }

    public function search_louer()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $bureau_louer = Bureau::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 1)
            ->latest()
            ->paginate(3);
        $nb_bur = $bureau_louer->count();
        return view('site.bureau.louer', ['bureau_louer' => $bureau_louer])
            ->with(['nb_bur' => $nb_bur]);
    }

    public function search_vendre()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $bureau_vendre = Bureau::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 2)
            ->latest()
            ->paginate(3);
        $nb_bur = $bureau_vendre->count();
        return view('site.bureau.vendre', ['bureau_vendre' => $bureau_vendre])
            ->with(['nb_bur' => $nb_bur]);
    }

    public function search_promo()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $bureau_promo = Bureau::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('sold', 1)
            ->latest()
            ->paginate(3);
        $nb_bur = $bureau_promo->count();
        return view('site.bureau.promo', ['bureau_promo' => $bureau_promo])
            ->with(['nb_bur' => $nb_bur]);
    }
}
