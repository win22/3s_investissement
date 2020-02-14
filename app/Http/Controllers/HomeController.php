<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\villa;
use http\Message;
use Illuminate\Http\Request;
use App\Rules\Captcha;

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


}
