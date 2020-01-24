<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hashlara ;

class tbl_admin_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_admin')->truncate();
        $password = 'passer1234';

        $admin = array();
        $admin['id'] = 1;
        $admin['admin_name'] = 'Sagesse Diham';
        $admin['admin_email'] = 'dihambouroslyn@gmail.com';
        $admin['admin_password'] =sha1($password);
        $admin['admin_role'] = 'Administrateur';
        $admin['admin_token'] = 'jdu5sja8dj8zifp';
        $admin['admin_image'] = 'image/user.png';
        $admin['admin_status'] = 'Activé';

        DB::table('tbl_admin')->insert($admin);


    }
}
