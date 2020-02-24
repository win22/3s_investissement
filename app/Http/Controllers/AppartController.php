<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Rules\Captcha;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\Appartement;
use App\Models\Message;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Session;
use File;

class AppartController extends Controller
{
    public function index()
    {
        return view('backend.appartement.add');
    }

    public function all_appart()
    {
        $appart = Appartement::where('option', 1)
            ->latest()
            ->paginate(4);
        $nb = $appart->count();
        $appart_vendre = Appartement::where('option', 2)
            ->latest()
            ->paginate(4);
        $nb_v = $appart_vendre->count();
        $appart_sold = Appartement::where('sold', 1)
            ->latest()
            ->paginate(4);
        $nb_s = $appart_sold->count();
        return view('backend.appartement.all', ['all_appart' => $appart])
            ->with(['nb' => $nb])
            ->with(['all_appart_vendre' => $appart_vendre])
            ->with(['nb_v' => $nb_v])
            ->with(['all_appart_sold' => $appart_sold])
            ->with(['nb_s' => $nb_s]);

    }

    public function search_data()
    {
        $search = request('search');
        $apparts =  Appartement::where('name', 'like', '%' . $search . '%')
                    ->latest()
                    ->paginate(6);
        $nb = $apparts->count();
        return view('backend.appartement.search', ['apparts' => $apparts])
            ->with(['nb' => $nb]);
    }

    public function save(Request $request)
    {
        request()->validate([
            'name' => ['required','max:60'],
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
            'image' => ['required','image'],
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
                $image = $image_url;
            }
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
                Appartement::findOrFail($appart->id)->images()->create([
                    'image' => $image_url
                ]);
            }
        endforeach;
        return redirect('/all_appartement')->with(
            Session::put('message', 'Un appartement a été ajouté ')
        );
    }

    public function updates(Request $request, $id)
    {
        request()->validate([
            'name' => ['required','max:60'],
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
            'salon' => ['required', 'max:3',],
            'image' => ['image'],
        ]);

        $appart = Appartement::findOrFail($id);
        $appart->name = request('name');
        $appart->short_description = request('short_description');
        $appart->large_description = request('large_description');
        $appart->adresse = request('adresse');
        $appart->ville = request('ville');
        $appart->pays = request('pays');
        $appart->type = request('type');
        $appart->option = request('option');
        $appart->align = request('align');
        $appart->prix = request('prix');
        $appart->devise = request('devise');
        $appart->sold = request('sold');
        $appart->pourcentage = request('pourcentage');
        $appart->chambre = request('chambre');
        $appart->cuisine = request('cuisine');
        $appart->garage = request('garage');
        $appart->salon = request('salon');
        $appart->sale_de_bain = request('cuisine');
        $appart->admin_id = Auth::id();
        $image = $request->file('image');
        if ($image) {
            request()->validate([
                'image' => ['required','image']
            ]);
            $image_name = str_random(6);
            $text = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $text;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $img = Appartement::findOrFail($id);
                File::delete($img->image);
                $appart->image = $image_url;
            }
        }

        $gale = $request->file('images');
        if ($gale) {
            $images = Image::where('appartement_id', $id)->get();
            foreach ($images as $im):
                File::delete($im->image);
                $im->delete();
            endforeach;
            foreach ($gale as $img) :
                $image_name = str_random(6);
                $text = strtolower($img->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $text;
                $upload_path = 'image/';
                $image_url = $upload_path . $image_full_name;

                $success = $img->move($upload_path, $image_full_name);
                if ($success) {
                    Image::create([
                        'appartement_id' => $id,
                        'image' => $image_url
                    ]);
                }
            endforeach;
        }

        $appart->save();
        return redirect('/detail_appart/' . $appart->id)->with(
            Session::put('message', " Information modifiée avec succès !")
        );

    }


    public function active($id)
    {
        $appart = Appartement::findOrFail($id);
        $appart->status = 1;
        $appart->admin_id = Auth::id();
        $appart->save();
        return redirect('/all_appartement')->with(
            Session::put('message', "Vous avez activé l'appartement " .$appart->name)
        );

    }

    public function unactive($id)
    {
        $appart = Appartement::findOrFail($id);
        $appart->status = 0;
        $appart->admin_id = Auth::id();
        $appart->save();
        return redirect('/all_appartement')->with(
            Session::put('message', "Vous avez désactivé l'appartement " .$appart->name)
        );
    }

    public function supprimer($id)
    {
        $appart = Appartement::findOrFail($id);
        $images = Image::where('appartement_id', $id)->get();
        foreach ($images as $im):
            File::delete($im->image);
            $im->delete();
        endforeach;
        File::delete($appart->image);
        $appart->delete();
        return redirect('/all_appartement')->with(
            Session::put('message', "Cet appartement a été supprimé")
        );
    }

    public function details($id)
    {
        $detail_appart = Appartement::findOrFail($id);
        $admin_name = Admin::find($detail_appart->admin_id);
        return view('backend.appartement.details', ['appart' => $detail_appart])
            ->with(['admin_name' => $admin_name]);
    }

    public function edits($id)
    {
        $appart = Appartement::findOrFail($id);
        return view('backend.appartement.edit', ['appart' => $appart]);
    }

    //Partie admin du site
    public function details_site($id)
    {
        $appart = Appartement::where('status', 1)
            ->findOrFail($id);
        $appart_similaire = Appartement::where('id', '!=', $id)
            ->where('status', 1)
            ->take(8)
            ->get();
        $nb_sim = $appart_similaire->count();
        return view('site.appart.details', ['appart' => $appart])
            ->with(['appart_similaire' => $appart_similaire])
            ->with(['nb_sim' => $nb_sim]);
    }

    // appartement louer
    public function all_louer()
    {
        $appart_louer = Appartement::where('status', 1)
            ->where('option', 1)
            ->latest()
            ->paginate(3);
        $nb_app = $appart_louer->count();
        return view('site.appart.louer', ['appart_louer' => $appart_louer])
            ->with(['nb_app' => $nb_app]);
    }

    public function all_vendre()
    {
        $appart_vendre = Appartement::where('status', 1)
            ->where('option', 2)
            ->latest()
            ->paginate(3);
        $nb_app = $appart_vendre->count();
        return view('site.appart.vendre', ['appart_vendre' => $appart_vendre])
            ->with(['nb_app' => $nb_app]);
    }

    public function all_promo()
    {
        $appart_promo = Appartement::where('status', 1)
            ->where('sold', 1)
            ->latest()
            ->paginate(3);
        $nb_app = $appart_promo->count();
        return view('site.appart.promo', ['appart_promo' => $appart_promo])
            ->with(['nb_app' => $nb_app]);
    }

    //search
    public function search()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $apparts = Appartement::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(3);
        $nb_app = $apparts->count();
        return view('site.appart.all_appart', ['apparts' => $apparts])
            ->with(['nb_app' => $nb_app]);
    }

    public function search_louer()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $appart_louer = Appartement::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 1)
            ->latest()
            ->paginate(3);
        $nb_app = $appart_louer->count();
        return view('site.appart.louer', ['appart_louer' => $appart_louer])
            ->with(['nb_app' => $nb_app]);
    }

    public function search_vendre()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $appart_vendre = Appartement::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('option', 2)
            ->latest()
            ->paginate(3);
        $nb_app = $appart_vendre->count();
        return view('site.appart.vendre', ['appart_vendre' => $appart_vendre])
            ->with(['nb_app' => $nb_app]);
    }

    public function search_promo()
    {
        request()->validate([
            'search' => ['required', 'max: 60']
        ]);
        $search = request('search');
        $appart_promo = Appartement::where('status', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->where('sold', 1)
            ->latest()
            ->paginate(3);
        $nb_app = $appart_promo->count();
        return view('site.appart.promo', ['appart_promo' => $appart_promo])
            ->with(['nb_app' => $nb_app]);
    }


}


