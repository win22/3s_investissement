<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Hash;

session_start();

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('backend.connexion.login');
    }

    public function connexion(Request $request)
    {
        request()->validate([
            'admin_email' => ['required', 'email'],
            'admin_password' => ['required', 'min:8']
        ]);

        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $log1 = DB::table('tbl_admin')
            ->where('admin_email', $admin_email)->first();

        $redirect = '/investi_admin';
        $errors = Session::put('message', 'Vos identifiants sont incorrectes');
        if (isset($log1))
        {
            if ($log1->admin_status == "Desactivé")
            {
                $errors = Session::put('message', 'Votre compte n\'est pas activé');
            }
            else if (hash::check($admin_password, $log1->admin_password))
            {
                Session::put('id', $log1->id);
                Session::put('admin_name', $log1->admin_name);
                Session::put('admin_email', $log1->admin_email);
                Session::put('admin_role', $log1->admin_role);
                Session::put('admin_image', $log1->admin_image);
                Session::put('admin_status', $log1);
                $redirect = '/dashboard';
                $errors = null;
            }
        }

        return redirect($redirect)->with($errors);
    }
}
