<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Bureau;
use App\Models\Entrepot;
use App\Models\Hectare;
use App\Models\Immeuble;
use App\Models\Magasin;
use App\Models\Message;
use App\Models\Terrain;
use App\Models\villa;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Session;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $apparts = Appartement::count();
        $villas = villa::count();
        $immeubles = Immeuble::count();
        $bureaux = Bureau::count();
        $terrains = Terrain::count();
        $entrepots = Entrepot::count();
        $Magasin = Magasin::count();
        $hectare = Hectare::count();


        $all_messages = Message::latest()
            ->paginate(5);
        $nb = $all_messages->count();

        $last_mess = Message::where('status', 0)
            ->latest()
            ->first();

        return view('backend.admin.dashboard', ['all_messages' => $all_messages ])
            ->with(['apparts' => $apparts])
            ->with(['villas' => $villas])
            ->with(['bureaux' => $bureaux])
            ->with(['immeubles' => $immeubles])
            ->with(['terrains' => $terrains])
            ->with(['entrepots' => $entrepots])
            ->with(['Magasin' => $Magasin])
            ->with(['hectare' => $hectare])
            ->with(['nb' => $nb])
            ->with(['last_mess' => $last_mess]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('investi_admin')->withErrors([
            'email' => 'Vous avez été déconnecté']);;
    }



    public function details_view($id)
    {
        $messages = Message::findOrFail($id);
    }

    public function view_mess()
    {
       $id = request('id');
       $message =  Message::findOrFail($id);
       $message->status = 1;
       $message->save();
       return back();
    }

    public function delete_mess($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return back()->with(
            Session::put('message', 'Vous avez supprimé un message ')
        );
    }
}
