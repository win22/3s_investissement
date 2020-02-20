<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Immeuble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Admin;
use File;
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

        $immeubs_vendre = Immeuble::where('option', 2)
            ->latest()
            ->paginate(6);
        $nb_v = $immeubs_vendre->count();

        $immeubs_promo = Immeuble::where('sold', 1)
            ->latest()
            ->paginate(6);
        $nb_p = $immeubs_promo->count();
        return view('backend.immeuble.all', ['immeubs_louer' => $immeubs_louer])
            ->with('immeubs_vendre', $immeubs_vendre)
            ->with('immeubs_promo', $immeubs_promo)
            ->with('nb_l', $nb_l)
            ->with('nb_v', $nb_v)
            ->with('nb_p', $nb_p);

    }

    public function active($id)
    {
        $immeuble = Immeuble::findOrFail($id);
        $immeuble->status = 1;
        $immeuble->admin_id = Auth::id();
        $immeuble->save();
        return back()->with(
            Session::put('message', "L'immeuble " . $immeuble->name . "a été activé")
        );

    }

    public function unactive($id)
    {
        $immeuble = Immeuble::findOrFail($id);
        $immeuble->status = 0;
        $immeuble->admin_id = Auth::id();
        $immeuble->save();
        return back()->with(
            Session::put('message', "L'immeuble " . $immeuble->name . "a été désactivé")
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
            'piscine' => ['required'],
            'dimension' => ['required'],
            'option' => ['required', 'max:3'],
            'sold' => ['required', 'max:3'],
            'garage' => ['required', 'max:3'],
            'appartement' => ['required', 'max:3'],
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
            'piscine' => ['required'],
            'dimension' => ['required'],
            'option' => ['required', 'max:3'],
            'sold' => ['required', 'max:3'],
            'garage' => ['required', 'max:3'],
            'appartement' => ['required', 'max:3'],
        ]);

        $immeub = Immeuble::findOrFail($id);
        $immeub->name = request('name');
        $immeub->short_description = request('short_description');
        $immeub->large_description = request('large_description');
        $immeub->adresse = request('adresse');
        $immeub->ville = request('ville');
        $immeub->pays = request('pays');
        $immeub->type = request('type');
        $immeub->option = request('option');
        $immeub->align = request('align');
        $immeub->prix = request('prix');
        $immeub->devise = request('devise');
        $immeub->sold = request('sold');
        $immeub->pourcentage = request('pourcentage');
        $immeub->dimension = request('dimension');
        $immeub->piscine = request('piscine');
        $immeub->garage = request('garage');
        $immeub->appartement = request('appartement');
        $immeub->etage = request('etage');
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
                $immeub->image = $image_url;
                $img_p = Immeuble::findOrFail($id);
                File::delete($img_p->image);
                $img_p->image = $image_url;
            }
        }

        $photo = $request->file('images');
        if ($photo) {
            $imag = Image::where('immeuble_id', $id)->get();
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
                    Immeuble::findOrFail($immeub->id)->images()->create([
                        'image' => $image_url
                    ]);
                }
            endforeach;
        }
        $immeub->admin_id = Auth::id();
        $immeub->save();
        return redirect('/detail_im/' . $immeub->id)->with(
            Session::put('message', " Information modifiée avec succès !")
        );
    }


    public function details($id)
    {
        $detail_immeub = Immeuble::findOrFail($id);
        $admin_name = Admin::find($detail_immeub->admin_id);
        return view('backend.immeuble.details', ['immeub' => $detail_immeub])
            ->with(['admin_name' => $admin_name]);
    }

    public function edits($id)
    {
        $immeub = Immeuble::findOrFail($id);
        return view('backend.immeuble.edit', ['immeub' => $immeub]);
    }

    public function supprimer($id)
    {
        $immeub = Immeuble::findOrFail($id);
        $imag = Image::where('immeuble_id', $id)->get();
        foreach ($imag as $im):
            File::delete($im->image);
            $im->delete();
        endforeach;
        File::delete($immeub->image);
        $immeub->delete();

        return back()->with(
            Session::put('message', "L'immeuble " . $immeub->name . "a été supprimé")
        );
    }

    //Configuration site
    public function search(Request $request)
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $immeubs = Immeuble::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(4);
        $nb_im = $immeubs->count();
        return view('site.immeuble.all_immeub', ['immeubs' => $immeubs])
            ->with(['nb_im' => $nb_im]);
    }

    public function details_site($id)
    {
        $immeub = Immeuble::findOrFail($id);
        $immeub_similaire = Immeuble::where('id', '!=', $id)
            ->where('status', 1)
            ->take(8)
            ->get();
        $nb_sim = $immeub_similaire->count();

        return view('site.immeuble.details', ['immeub' => $immeub])
            ->with(['nb_sim' => $nb_sim])
            ->with(['immeub_similaire' => $immeub_similaire]);

    }

    public function all_louer()
    {
        $immeub_louer = Immeuble::where('status', 1)
            ->where('option', 1)
            ->latest()
            ->paginate(4);
        $nb_im = $immeub_louer->count();
        return view('site.immeuble.louer', ['immeub_louer' => $immeub_louer])
            ->with(['nb_im' => $nb_im]);
    }

    public function all_vendre()
    {
        $immeub_vendre = Immeuble::where('status', 1)
            ->where('option', 2)
            ->latest()
            ->paginate(4);
        $nb_im = $immeub_vendre->count();
        return view('site.immeuble.vendre', ['immeub_vendre' => $immeub_vendre])
            ->with(['nb_im' => $nb_im]);
    }

    public function all_promo()
    {
        $immeub_promo = Immeuble::where('status', 1)
            ->where('sold', 1)
            ->latest()
            ->paginate(4);
        $nb_im = $immeub_promo->count();
        return view('site.immeuble.promo', ['immeub_promo' => $immeub_promo])
            ->with(['nb_im' => $nb_im]);
    }

    public function search_louer()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $immeub_louer = Immeuble::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 1)
            ->latest()
            ->paginate(4);
        $nb_im = $immeub_louer->count();
        return view('site.immeuble.louer', ['immeub_louer' => $immeub_louer])
            ->with(['nb_im' => $nb_im]);
    }

    public function search_vendre()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $immeub_vendre = Immeuble::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 1)
            ->latest()
            ->paginate(4);
        $nb_im = $immeub_vendre->count();
        return view('site.immeuble.vendre', ['immeub_vendre' => $immeub_vendre])
            ->with(['nb_im' => $nb_im]);
    }

    public function search_promo()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $immeub_promo = Immeuble::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('sold', 1)
            ->latest()
            ->paginate(4);
        $nb_im = $immeub_promo->count();
        return view('site.immeuble.promo', ['immeub_promo' => $immeub_promo])
            ->with(['nb_im' => $nb_im]);
    }

}
