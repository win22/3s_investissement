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
        $messages = Message::all()
                    ->latest();
        return view('backend.dashboard', ['messages' => $messages ]);
    }
}
