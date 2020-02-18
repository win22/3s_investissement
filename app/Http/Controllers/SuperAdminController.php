<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
session_start();

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('backend.connexion.login');
    }

    public function connexion()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
       $result = Auth::attempt([
           'email' => request('email'),
           'password' => request('password'),
        ]);
        $redirect = '/investi_admin';
        $errors = Session::put('message', 'Vos identifiants sont incorrectes');
       if($result)
       {
        if(Auth::user()->status == 0)
        {
            $errors = Session::put('message', "Désolé votre compte n'est pas activé");
            $redirect = '/investi_admin';
        }else
        {
            $errors = Session::put('message', "Bienvenue ".Auth::user()->name);
            $redirect = '/dashboard';
        }
       }

        return redirect($redirect)->with($errors);

    }
}
