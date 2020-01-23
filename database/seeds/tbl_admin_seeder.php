<?php

use Illuminate\Database\Seeder;

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

        $admin = array();
        $admin['id'] = 1;
        $admin['admin_name'] = 'Sagesse Diham';
        $admin['admin_email'] = 'dihambouroslyn@gmail.com';
        $admin['admin_password'] = md5('passer@123');
        $admin['admin_role'] = 'administrateur';
        $admin['admin_token'] = 'jdu5sja8dj8zifp';
        $admin['admin_image'] = 'image/user.png';
        $admin['admin_status'] = 1;

        DB::table('tbl_admin')->insert($admin);


    }
}
