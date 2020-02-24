<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Image;
use App\Models\Terrain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use File;
class TerrainController extends Controller
{
    public function index()
    {
        return view('backend.terrain.add');
    }
    public function all_terrain()
    {
        $terrains_louer = Terrain::where('option', 1)
            ->latest()
            ->paginate(6);
        $nb_l = $terrains_louer->count();

        $terrains_vendre = Terrain::where('option', 2)
            ->latest()
            ->paginate(6);
        $nb_v = $terrains_vendre->count();

        $terrains_promo = Terrain::where('sold', 1)
            ->latest()
            ->paginate(6);
        $nb_p = $terrains_promo->count();
        return view('backend.terrain.all', ['terrains_louer' => $terrains_louer])
            ->with('terrains_vendre', $terrains_vendre)
            ->with('terrains_promo', $terrains_promo)
            ->with('nb_l', $nb_l)
            ->with('nb_v', $nb_v)
            ->with('nb_p', $nb_p);

    }

    public function search_data()
    {
        $search = request('search');
        $terrains =  Terrain::where('name', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(6);
        $nb = $terrains->count();
        return view('backend.terrain.search', ['terrains' => $terrains])
            ->with(['nb' => $nb]);
    }

    public function active($id)
    {
        $terrain = Terrain::findOrFail($id);
        $terrain->status = 1;
        $terrain->admin_id = Auth::id();
        $terrain->save();
        return redirect('/all_terre')->with(
            Session::put('message', 'Vous avez activé le terrain ' .$terrain->name)
        );

    }

    public function unactive($id)
    {
        $terrain = Terrain::findOrFail($id);
        $terrain->status = 0;
        $terrain->admin_id = Auth::id();
        $terrain->save();
        return redirect('/all_terre')->with(
            Session::put('message', 'Vous avez desactivé le terrain ' .$terrain->name)
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
        $terrain = Terrain::create([
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
                Terrain::findOrFail($terrain->id)->images()->create([
                    'image' => $image_url
                ]);
            }
        endforeach;
        return redirect('/all_terre')->with(
            Session::put('message', 'Un terrain a été ajouté ')
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

        $terrain = Terrain::findOrFail($id);
        $terrain->name = request('name');
        $terrain->short_description = request('short_description');
        $terrain->large_description = request('large_description');
        $terrain->adresse = request('adresse');
        $terrain->ville = request('ville');
        $terrain->pays = request('pays');
        $terrain->type = request('type');
        $terrain->option = request('option');
        $terrain->align = request('align');
        $terrain->prix = request('prix');
        $terrain->devise = request('devise');
        $terrain->sold = request('sold');
        $terrain->pourcentage = request('pourcentage');
        $terrain->dimension = request('dimension');
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
                $terrain->image = $image_url;
                $img_p = Terrain::findOrFail($id);
                File::delete($img_p->image);
                $img_p->image = $image_url;
            }
        }

        $photo = $request->file('images');
        if ($photo) {
            $imag = Image::where('terrain_id', $id)->get();
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
                    Terrain::findOrFail($terrain->id)->images()->create([
                        'image' => $image_url
                    ]);
                }
            endforeach;
        }
        $terrain->admin_id = Auth::id();
        $terrain->save();
        return redirect('/detail_terre/' . $terrain->id)->with(
            Session::put('message', " Information modifiée avec succès !")
        );

    }

    public function supprimer($id)
    {
        $terrain = Terrain::findOrFail($id);
        $imag = Image::where('terrain_id', $id)->get();
        foreach ($imag as $im):
            File::delete($im->image);
            $im->delete();
        endforeach;
        File::delete($terrain->image);
        $terrain->delete();

        return back()->with(
            Session::put('message', "Le terrain " . $terrain->name . "a été supprimé")
        );
    }

    public function details($id)
    {
        $detail_terrain = Terrain::findOrFail($id);
        $admin_name = Admin::find($detail_terrain->admin_id);
        return view('backend.terrain.details', ['terrain' => $detail_terrain])
            ->with(['admin_name' => $admin_name]);
    }

    public function edits($id)
    {
        $terrain = Terrain::findOrFail($id);
        return view('backend.terrain.edit', ['terrain' => $terrain]);
    }


    //c             onfig pour le site
    public function details_terrain_site($id)
    {
        $terrain = Terrain::findOrFail($id);
        $terrain_similaire = Terrain::where('id', '!=', $id)
            ->where('status', 1)
            ->take(8)
            ->get();
        $nb_terre = $terrain_similaire->count();

        return view('site.terrain.details', ['terrain' => $terrain])
            ->with(['nb_terre' => $nb_terre])
            ->with(['terrain_similaire' => $terrain_similaire]);
    }

    public function all_louer()
    {
        $terrain_louer = Terrain::where('status', 1)
            ->where('option', 1)
            ->latest()
            ->paginate(3);
        $nb_terre = $terrain_louer->count();
        return view('site.terrain.louer', ['terrain_louer' => $terrain_louer])
            ->with(['nb_terre' => $nb_terre]);
    }

    public function all_vendre()
    {
        $terrain_vendre = Terrain::where('status', 1)
            ->where('option', 2)
            ->latest()
            ->paginate(3);
        $nb_terre = $terrain_vendre->count();
        return view('site.terrain.vendre', ['terrain_vendre' => $terrain_vendre])
            ->with(['nb_terre' => $nb_terre]);
    }


    public function all_promo()
    {
        $terrain_promo = Terrain::where('status', 1)
            ->where('sold', 1)
            ->latest()
            ->paginate(3);
        $nb_terre = $terrain_promo->count();
        return view('site.terrain.promo', ['terrain_promo' => $terrain_promo])
            ->with(['nb_terre' => $nb_terre]);
    }

    //search
    public function search()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $terrains = Terrain::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(3);
        $nb_terre = $terrains->count();
        return view('site.terrain.all_terrain', ['terrains' => $terrains])
            ->with(['nb_terre' => $nb_terre]);
    }

    public function search_louer()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $terrain_louer = Terrain::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 1)
            ->latest()
            ->paginate(3);
        $nb_terre = $terrain_louer->count();
        return view('site.terrain.louer', ['terrain_louer' => $terrain_louer])
            ->with(['nb_terre' => $nb_terre]);
    }

    public function search_vendre()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $terrain_vendre = Terrain::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 2)
            ->latest()
            ->paginate(3);
        $nb_terre = $terrain_vendre->count();
        return view('site.terrain.vendre', ['terrain_vendre' => $terrain_vendre])
            ->with(['nb_terre' => $nb_terre]);
    }

    public function search_promo()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $terrain_promo = Terrain::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('sold', 1)
            ->latest()
            ->paginate(3);
        $nb_terre = $terrain_promo->count();
        return view('site.terrain.promo', ['terrain_promo' => $terrain_promo])
            ->with(['nb_terre' => $nb_terre]);
    }
}
