<?php

namespace App\Http\Controllers;

use App\Models\Message;
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
        return view('backend.admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('investi_admin')->withErrors([
            'email' => 'Vous avez été déconnecté']);;
    }

    public function all_message()
    {
        $all_messages = Message::latest()
                        ->paginate(5);
        $nb = $all_messages->count();
        return view('backend.admin.dashboard', ['all_messages' => $all_messages ])
            ->with(['nb' => $nb])
            ;
    }

    public function details_view($id)
    {
        $messages = Message::findOrFail($id);
    }
}
