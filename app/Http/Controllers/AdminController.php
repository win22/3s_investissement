<?php

namespace App\Http\Controllers;

use \App\Models\Admin;
use App\Models\Image;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Session;
use File;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.admin.all_admin');
    }
    public function all_admin()
    {
        $all_info = Admin::latest()
            ->paginate(5);
        $nb = $all_info->count();
        return view('backend.admin.all_admin', ['all_info' => $all_info])
            ->with(['nb'=> $nb ]);
    }

    public function active_admin($id)
    {
        Admin::where('id', $id)
            ->update(['status'=> 1]);
        Session::put('message', ' Un Utilisateur a été activé ! ');
        return back();
    }

    public function desactive_admin($id)
    {
        Admin::where('id', $id)
            ->update(['status'=> 0]);
        Session::put('message', 'Un Utilisateur a été désactivé ! ');
        return back();
    }

    public function save(Request $request)
    {
        request()->validate([
            'name' => ['required', 'max:90'],
            'email' => ['required',  'unique:admins', 'max:191', 'email'],
            'password' => ['required', 'min:8', 'max:20'],
            'role' => ['required', 'max:15'],
            'image' => ['required', 'file'],
        ]);
        $image = $request->file('image');
        if($image)
        {
            $image_name = str_random(6);
            $text = strtolower($image->getClientOriginalExtension());
            $image_full_name =$image_name.'.'.$text;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $defaut_image = $image_url;
            }
        }
         Admin::create([
             'name' => request('name'),
             'email' => request('email'),
             'password' => bcrypt(request('password')),
             'role' => request('role'),
             'status' => 0,
             'image' => $defaut_image,
        ]);
         return back()->with(Session::put('message', 'Un utilisateur a été ajouté'));
    }

    public function update(Request $request)
    {
        request()->validate([
           'name'  => ['required', 'max:90'],
           'email' => ['required', 'max:191'],
           'password' => ['required'],
           'role' => ['required'],
        ]);
        $id = request('id');

        $admin = Admin::findOrFail($id);
        $admin->name = request('name');
        $admin->email = request('email');
        $admin->password = bcrypt(request('password'));
        $admin->role = request('role');
        $image = $request->file('image');
        if($image)
        {
            $image_name = str_random(10);
            $text = strtolower($image->getClientOriginalExtension());
            $image_full_name =$image_name.'.'.$text;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                File::delete($admin->image);
                $admin->image = $image_url;
            }
        }
        $admin->save();
        return back();
    }

    public function supprimer($id)
    {
        if(Auth::user()->role == 1)
        {
            $admin =  Admin::findOrFail($id);
            File::delete($admin->image);
            $admin->delete();
            Session::put('message', 'Un Utilisateur a été supprimé... ');
            return back();
        }
    }

}
