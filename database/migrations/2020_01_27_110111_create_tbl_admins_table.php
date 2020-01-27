<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admin_name', 90);
            $table->string('admin_email', 191);
            $table->string('admin_password',200);
            $table->string('admin_token',30);
            $table->string('admin_image',20);
            $table->string('admin_role',15);
            $table->string('admin_status',10);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_admins');
    }
}
