<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Mail;

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
        if ($result) {
            if (Auth::user()->status == 0) {
                $errors = Session::put('message', "Désolé votre compte n'est pas activé");
                $redirect = '/investi_admin';
            } else {
                $errors = Session::put('message', "Bienvenue " . Auth::user()->name);
                $redirect = '/dashboard';
            }
        }

        return redirect($redirect)->with($errors);
    }

    public function ren()
    {
        return view('backend.connexion.ren');
    }

    public function send_email()
    {
        request()->validate([
            'email' => ['required', 'email'],
        ]);
        $email = request('email');
        $admin = Admin::where('email', $email)->first();
        if ($admin) {
            $data = array();
            $admin['token'] = $data['token'] = str_random(30);
            $admin['email'] = $data['email'] = $email;
            $admin['password'] = $data['password'] = bcrypt('adminren@1234');
            Mail::send('backend.mail.reset', $data, function ($message) use ($data) {
                $message->to($data['email']);
                $message->from('mailtrapmail@gmail.com');
                $message->subject('Réinitialisation de mot de passe ');
            });
            $admin->save();
            return view('backend.connexion.SendMailReset')
                ->with('data', $data);
        } else {
            Session::put('message', "Désolé cette adresse email n'existe pas");
            return back();
        }

    }

    //verification de token
    public function res($token)
    {
        $check = Admin::where('token', $token)
            ->first();

        if($check)
        {
            return view('backend.connexion..password2')
                ->with('token', $token);
        }
        else
        {
            return Redirect::to('/investi_admin')
                ->withInput()->withErrors([
                    'email' => "Ce token n'est plus valide",
                ]);
        }

    }

    public function active_compte2(Request $request, $token)
    {
        request() -> validate([
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required'],
        ]);
        $password = request('password');
        $admin = Admin::where('token', $token)->first();
        $admin['password'] = bcrypt($password);
        $admin['token'] = null;
        $admin->save();
        Session::put('succes', "Votre mot de passe a été modifié avec succès !");
        return redirect('/investi_admin');

    }

}
