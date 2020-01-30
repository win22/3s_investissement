<?php

namespace App\Http\Controllers;

use \App\Models\Admin;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index()
    {
        return view('backend.admin.all_admin');
    }
    public function all_admin()
    {
        $all_info = Admin::orderByDesc('id')
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
        ]);
        $data_image = null;
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
                $image = $image_url;
            }
        }
        else
        {
            $image = 'image/user.png';
        }
        $data_image = $image;
         $data = Admin::create([
             'name' => request('name'),
             'email' => request('email'),
             'password' => bcrypt(request('password')),
             'role' => request('role'),
             'status' => 0,
             'image' => $data_image
        ]);
         return back()->with(Session::put('message', 'Un utilisateur a été ajouté'));

    }

    public function update(Request $request)
    {
//        $this->AdminAuthCheck();
//        request()->validate([
//            'admin_name' => ['required', 'max:90'],
//            'admin_email' => ['required', 'max:191', 'email'],
//            'admin_password' => [ 'max:20'],
//            'admin_role' => ['required', 'max:15'],
//        ]);
//
//        $data = Admin::where([
//             'id' => request('id'),
//             'name' => request('name'),
//             'email' => request('email'),
//             'password' => bcrypt(request('password')),
//             'role' => request('role'),
//             'status' => 0,
//             'image' => $data_image
//
//        ]);
//        Admin::updat($data);
//        $image = $request->file('admin_image');
//        if($image)
//        {
//            $image_name = str_random(6);
//            $text = strtolower($image->getClientOriginalExtension());
//            $image_full_name =$image_name.'.'.$text;
//            $upload_path = 'image/';
//            $image_url = $upload_path.$image_full_name;
//            $success = $image->move($upload_path,$image_full_name);
//            if($success){
//                $admin['admin_image'] = $image_url;
//            }
//        }
       return back();
    }

    public function delete($id)
    {
        if(Auth::user()->role == 1)
        {
            Admin::where('id', $id)->delete();
            Session::put('message', 'Un Utilisateur a été supprimé... ');
            return back();
        }
    }

}
