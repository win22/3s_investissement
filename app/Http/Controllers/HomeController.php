<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\villa;
use http\Message;
use Illuminate\Http\Request;
use App\Rules\Captcha;
use Session;
class HomeController extends Controller
{
    public function index()
    {
        $apparts = Appartement::where('status', 1)
            ->orderBy('align')
            ->paginate(3);
        $villas = villa::where('status', 1)
            ->orderBy('align')
            ->paginate(3);

        return view('welcome', ['apparts' => $apparts])
            ->with(['villas' => $villas]);
    }

    public function all_appart()
    {
        $appart = Appartement::where('status', 1)
                    ->latest()
                    ->paginate(3);
        return view('site.appart.all_appart', ['apparts' => $appart]);
    }

    public function all_villa()
    {
        $villa = villa::where('status', 1)
            ->latest()
            ->paginate(3);
        return view('site.villa.all_villa', ['villas' => $villa]);
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
        \App\Models\Message::create([
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


}
