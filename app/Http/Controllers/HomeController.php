<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Bureau;
use App\Models\Immeuble;
use App\Models\Terrain;
use App\Models\villa;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Rules\Captcha;
use Session;
class HomeController extends Controller
{
    public function index()
    {
        $apparts = Appartement::where('status', 1)
            ->orderBy('align')
            ->take(3)
            ->get();
        $nb_app = $apparts->count();

        $villas = villa::where('status', 1)
            ->orderBy('align')
            ->take(3)
            ->get();
        $nb_vill = $villas->count();

        $immeubs = Immeuble::where('status', 1)
            ->orderBy('align')
            ->take(3)
            ->get();
        $nb_im = $immeubs->count();

        $terrains = Terrain::where('status', 1)
            ->orderBy('align')
            ->take(8)
            ->get();
        $nb_terre = $terrains->count();

        return view('welcome', ['apparts' => $apparts])
            ->with(['villas' => $villas])
            ->with(['immeubs' => $immeubs])
            ->with(['terrains' => $terrains])
            ->with(['' => $immeubs])
            ->with(['nb_im' => $nb_im])
            ->with(['nb_app' => $nb_app])
            ->with(['nb_vill' => $nb_vill])
            ->with(['nb_terre' => $nb_terre]);
    }

    public function all_appart()
    {
        $appart = Appartement::where('status', 1)
                    ->latest()
                    ->paginate(3);
        $nb_app = $appart->count();
        return view('site.appart.all_appart', ['apparts' => $appart])
            ->with(['nb_app' => $nb_app]);
    }

    public function all_villa()
    {
        $villa = villa::where('status', 1)
            ->latest()
            ->paginate(3);
        $nb_vill = $villa->count();
        return view('site.villa.all_villa', ['villas' => $villa])
            ->with(['nb_vill' => $nb_vill]);
    }

    public function all_immeub()
    {
        $immeubs = Immeuble::where('status', 1)
            ->latest()
            ->paginate(3);
        $nb_im = $immeubs->count();
        return view('site.immeuble.all_immeub', ['immeubs' => $immeubs])
            ->with(['nb_im' => $nb_im]);
    }

    public function all_bureau()
    {
        $bureaux = Bureau::where('status', 1)
            ->latest()
            ->paginate(3);
        $nb_bur = $bureaux->count();
        return view('site.bureau.all_bureau', ['bureaux' => $bureaux])
            ->with(['nb_bur' => $nb_bur]);
    }

    public function all_terrain()
    {
        $terrains = Terrain::where('status', 1)
            ->latest()
            ->paginate(3);
        $nb_terre = $terrains->count();
        return view('site.terrain.all_terrain', ['terrains' => $terrains])
            ->with(['nb_terre' => $nb_terre]);
    }

    public function captcha_send($name)
    {
        request()->validate([
            'name' => ['required', 'max:60', 'min:2'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'max:60', 'min:2'],
            'message' => ['required'],
            'g-recaptcha-response' => new Captcha(),
        ]);
        Message::create([
            'name_p' => $name,
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'message' => request('message'),
            'status' => 0,
            'confirm' => 0
        ]);
        return back()->with(
            Session::put('message', 'Merci '.request('name').' pour votre réservation')
        );
    }


    //              Configuration du footer
    public function foot()
    {
        $apparts = Appartement::where('status', 1)
            ->orderBy('align')
            ->take(1)
            ->get();
        $nb_app = $apparts->count();

        $villas = villa::where('status', 1)
            ->orderBy('align')
            ->take(1)
            ->get();
        $nb_vill = $villas->count();

        $terrains = Terrain::where('status', 1)
            ->orderBy('align')
            ->take(1)
            ->get();
        $nb_terre = $terrains->count();
        return view('site.footer', ['terrains' => $terrains])
            ->with(['villas' => $villas])
            ->with(['apparts' => $apparts])
            ->with(['nb_app' => $nb_app])
            ->with(['nb_vill' => $nb_vill])
            ->with(['nb_terre' => $nb_terre]);
    }

    public function contacts()
    {
        return view('site.contact');
    }
}
