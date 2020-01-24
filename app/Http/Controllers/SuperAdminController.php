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

    public function  connexion(Request $request)
    {
        request()->validate([
                'admin_email' => ['required', 'email'],
                'admin_password' => ['required', 'min:8']
        ]);

        $admin_email = $request->admin_email;
        $admin_password = sha1($request->admin_password);

        $log1 = DB::table('tbl_admin')
            ->where('admin_email', '=', $admin_email)
            ->where('admin_password', '=',  $admin_password)
            ->where('admin_status', '=', 'Activé')
            ->first();
        $log2 = DB::table('tbl_admin')
            ->where('admin_email', '=', $admin_email)
            ->where('admin_password', '=', $admin_password)
            ->where('admin_status', '=', 'Desactivé')
            ->first();

        if($log1)
        {
          Session::put('id', $log1->id);
          Session::put('admin_name', $log1->admin_name);
          Session::put('admin_email', $log1->admin_email);
          Session::put('admin_role', $log1->admin_role);
          Session::put('admin_image', $log1->admin_image);
          Session::put('admin_status', $log1->admin_status);
         return redirect('/dashboard');
        }
        if($log2)
        {
            return redirect('/investi_admin')->with(
                Session::put('message', "Votre compte n'est pas activé"));
        }
        else
        {
            return redirect('/investi_admin')->with(
                Session::put('message', 'Vos identifiants sont incorrectes'));


        }
    }
}
