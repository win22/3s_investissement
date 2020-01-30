<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class tbl_admin_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        $password = 'passer1234';
        $admin = array();
        $admin['id'] = 1;
        $admin['name'] = 'Sagesse Diham';
        $admin['email'] = 'dihambouroslyn@gmail.com';
        $admin['password'] = bcrypt($password);
        $admin['role'] = 1;
        $admin['token'] = 'jdu5sja8dj8zifp';
        $admin['remember_token'] = null;
        $admin['image'] = 'image/user.png';
        $admin['status'] = 1;

        DB::table('admins')->insert($admin);


    }
}
