<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Hectare;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use File;
class HectareController extends Controller
{
    public function index()
    {
        return view('backend.hectare.add');
    }
    public function all_hectare()
    {
        $hectares_louer = Hectare::where('option', 1)
            ->latest()
            ->paginate(6);
        $nb_l = $hectares_louer->count();

        $hectares_vendre = Hectare::where('option', 2)
            ->latest()
            ->paginate(6);
        $nb_v = $hectares_vendre->count();

        $hectares_promo = Hectare::where('sold', 1)
            ->latest()
            ->paginate(6);
        $nb_p = $hectares_promo->count();
        return view('backend.hectare.all', ['hectares_louer' => $hectares_louer])
            ->with('hectares_vendre', $hectares_vendre)
            ->with('hectares_promo', $hectares_promo)
            ->with('nb_l', $nb_l)
            ->with('nb_v', $nb_v)
            ->with('nb_p', $nb_p);

    }

    public function active($id)
    {
        $hectare = hectare::findOrFail($id);
        $hectare->status = 1;
        $hectare->admin_id = Auth::id();
        $hectare->save();
        return back()->with(
            Session::put('message', "cet hectare  a été activé")
        );

    }

    public function unactive($id)
    {
        $hectare = Hectare::findOrFail($id);
        $hectare->status = 0;
        $hectare->admin_id = Auth::id();
        $hectare->save();
        return back()->with(
            Session::put('message', "cet hectare  a été désactivé")
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
        $hectare = Hectare::create([
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
                Hectare::findOrFail($hectare->id)->images()->create([
                    'image' => $image_url
                ]);
            }
        endforeach;
        return redirect('/all_hect')->with(
            Session::put('message', 'Un hectare a été ajouté ')
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

        $hectare = Hectare::findOrFail($id);
        $hectare->name = request('name');
        $hectare->short_description = request('short_description');
        $hectare->large_description = request('large_description');
        $hectare->adresse = request('adresse');
        $hectare->ville = request('ville');
        $hectare->pays = request('pays');
        $hectare->type = request('type');
        $hectare->option = request('option');
        $hectare->align = request('align');
        $hectare->prix = request('prix');
        $hectare->devise = request('devise');
        $hectare->sold = request('sold');
        $hectare->pourcentage = request('pourcentage');
        $hectare->dimension = request('dimension');
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
                $hectare->image = $image_url;
                $img_p = Hectare::findOrFail($id);
                File::delete($img_p->image);
                $img_p->image = $image_url;
            }
        }

        $photo = $request->file('images');
        if ($photo) {
            $imag = Image::where('hectare_id', $id)->get();
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
                    Hectare::findOrFail($hectare->id)->images()->create([
                        'image' => $image_url
                    ]);
                }
            endforeach;
        }
        $hectare->admin_id = Auth::id();
        $hectare->save();
        return redirect('/detail_hect/' . $hectare->id)->with(
            Session::put('message', " Information modifiée avec succèes !")
        );

    }

    public function supprimer($id)
    {
        $hectare = Hectare::findOrFail($id);
        $imag = Image::where('hectare_id', $id)->get();
        foreach ($imag as $im):
            File::delete($im->image);
            $im->delete();
        endforeach;
        File::delete($hectare->image);
        $hectare->delete();

        return back()->with(
            Session::put('message', "Le hectare " . $hectare->name . "a été supprimé")
        );
    }

    public function details($id)
    {
        $detail_hectare = Hectare::findOrFail($id);
        $admin_name = Admin::find($detail_hectare->admin_id);
        return view('backend.hectare.details', ['hectare' => $detail_hectare])
            ->with(['admin_name' => $admin_name]);
    }

    public function edits($id)
    {
        $hectare = Hectare::findOrFail($id);
        return view('backend.hectare.edit', ['hectare' => $hectare]);
    }


    //c             onfig pour le site
    public function details_hectare_site($id)
    {
        $hectare = Hectare::findOrFail($id);
        $hectare_similaire = Hectare::where('id', '!=', $id)
            ->where('status', 1)
            ->take(8)
            ->get();
        $nb_hect = $hectare_similaire->count();

        return view('site.hectare.details', ['hectare' => $hectare])
            ->with(['nb_hect' => $nb_hect])
            ->with(['hectare_similaire' => $hectare_similaire]);
    }

    public function all_louer()
    {
        $hectare_louer = Hectare::where('status', 1)
            ->where('option', 1)
            ->latest()
            ->paginate(3);
        $nb_hect = $hectare_louer->count();
        return view('site.hectare.louer', ['hectare_louer' => $hectare_louer])
            ->with(['nb_hect' => $nb_hect]);
    }

    public function all_vendre()
    {
        $hectare_vendre = Hectare::where('status', 1)
            ->where('option', 2)
            ->latest()
            ->paginate(3);
        $nb_hect = $hectare_vendre->count();
        return view('site.hectare.vendre', ['hectare_vendre' => $hectare_vendre])
            ->with(['nb_hect' => $nb_hect]);
    }


    public function all_promo()
    {
        $hectare_promo = Hectare::where('status', 1)
            ->where('sold', 1)
            ->latest()
            ->paginate(3);
        $nb_hect = $hectare_promo->count();
        return view('site.hectare.promo', ['hectare_promo' => $hectare_promo])
            ->with(['nb_hect' => $nb_hect]);
    }

    //search
    public function search()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $hectares = Hectare::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(3);
        $nb_hect = $hectares->count();
        return view('site.hectare.all_hectare', ['hectares' => $hectares])
            ->with(['nb_hect' => $nb_hect]);
    }

    public function search_louer()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $hectare_louer = Hectare::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 1)
            ->latest()
            ->paginate(3);
        $nb_hect = $hectare_louer->count();
        return view('site.hectare.louer', ['hectare_louer' => $hectare_louer])
            ->with(['nb_hect' => $nb_hect]);
    }

    public function search_vendre()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $hectare_vendre = Hectare::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 2)
            ->latest()
            ->paginate(3);
        $nb_hect = $hectare_vendre->count();
        return view('site.hectare.vendre', ['hectare_vendre' => $hectare_vendre])
            ->with(['nb_hect' => $nb_hect]);
    }

    public function search_promo()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $hectare_promo = Hectare::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('sold', 1)
            ->latest()
            ->paginate(3);
        $nb_hect = $hectare_promo->count();
        return view('site.hectare.promo', ['hectare_promo' => $hectare_promo])
            ->with(['nb_hect' => $nb_hect]);
    }
}
