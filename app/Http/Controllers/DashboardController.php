<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $this->AdminAuthCheck();
        return view('backend.admin.dashboard');

    }

    public function logout()
    {
        Session::flush();
        return redirect('investi_admin');
    }


    public function AdminAuthCheck()
    {
        $admin_id = Session::get('id');
        if($admin_id){
            return;
        }else
        {

            return redirect('/investi_admin')
                ->with( Session::put('message', 'Vous devez etre connecté pour acceder à cette page '))
                ->send();
        }
    }
}
