<?php

namespace App\Http\Controllers;

use App\admin;
use App\Notifications\RepliedToThread;
use App\tbl_admin;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Notifications\Notifiable;
use Session;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{



    public function index()
    {
        $this->AdminAuthCheck();
        return view('backend.admin.all_admin');
    }
    public function all_admin()
    {
        $this->AdminAuthCheck();
        $all_info = tbl_admin::orderByDesc('id')
            ->paginate(5);
        $nb = $all_info->count();

        return view('backend.admin.all_admin', ['all_info' => $all_info])
            ->with(['nb'=> $nb ]);
    }

    public function active_admin($id)
    {
        $this->AdminAuthCheck();
        tbl_admin::where('id', $id)
            ->update(['admin_status'=> 1]);
        Session::put('message', ' Un Utilisateur a été activé ! ');
        return back();
    }
    public function desactive_admin($id)
    {
        $this->AdminAuthCheck();
        tbl_admin::where('id', $id)
            ->update(['admin_status'=> 0]);
        Session::put('message', 'Un Utilisateur a été désactivé ! ');
        return back();
    }

    public function save(Request $request)
    {
        $this->AdminAuthCheck();
        request()->validate([
            'admin_name' => ['required', 'max:90'],
            'admin_email' => ['required',  'unique:tbl_admins', 'max:191', 'email'],
            'admin_password' => ['required', 'min:8', 'max:20'],
            'admin_role' => ['required', 'max:15'],
        ]);
        $password = $request->admin_password;
        $admin = array();
        $admin['admin_name'] = $request->admin_name;
        $admin['admin_email'] = $request->admin_email;
        $admin['admin_password'] = hash::make($password);
        $admin['admin_role'] = $request->admin_role;
        $admin['admin_status'] = 0;
        $admin['admin_token'] = str_random(30);
        $image = $request->file('admin_image');
        if($image)
        {
            $image_name = str_random(6);
            $text = strtolower($image->getClientOriginalExtension());
            $image_full_name =$image_name.'.'.$text;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $admin['admin_image'] = $image_url;
            }
        }
        if($request->admin_image == null)
        {
            $admin['admin_image'] = 'image/user.png';
        }
        tbl_admin::create($admin);
        Session::put('message', 'Un utilisateur a été Ajouté ! ');
        return back();


    }

    public function update(Request $request)
    {
        $this->AdminAuthCheck();
        request()->validate([
            'admin_name' => ['required', 'max:90'],
            'admin_email' => ['required', 'max:191', 'email'],
            'admin_password' => [ 'max:20'],
            'admin_role' => ['required', 'max:15'],
        ]);
        $admin = array();
        $id = $request->id;

        $admin['admin_name'] = $request->admin_name;
        $admin['admin_email'] = $request->admin_email;
        $admin['admin_password'] = hash::make( $request->admin_password);
        $admin['admin_role'] = $request->admin_role;
        $admin['admin_token'] = str_random(30);
        $image = $request->file('admin_image');
        if($image)
        {
            $image_name = str_random(6);
            $text = strtolower($image->getClientOriginalExtension());
            $image_full_name =$image_name.'.'.$text;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $admin['admin_image'] = $image_url;
            }
        }
        DB::table('tbl_admins')
            ->where('id', $id)
            ->update($admin);
        return redirect('/all_admin');
    }

    public function delete($id)
    {
        $this->AdminAuthCheck();
        tbl_admin::where('id', $id)->delete();
        Session::put('message', 'Un Utilisateur a été supprimé... ');
        return back();
    }




    //function de verification de session
    public function AdminAuthCheck()
    {
        $admin_id = Session::get('id');
        if($admin_id)
        {
            return;
        }
        else
        {
            return redirect('investi_admin')
                ->with('message', 'Vous devez etre connecté pour acceder à cette page')
                ->send();
        }
    }
}
