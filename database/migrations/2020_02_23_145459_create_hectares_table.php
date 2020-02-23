<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHectaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hectares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->string('name');
            $table->string('short_description');
            $table->text('large_description');
            $table->string('adresse');
            $table->string('ville');
            $table->string('pays');
            $table->string('type',20);
            $table->string('option');
            $table->string('align',2);
            $table->string('prix');
            $table->string('devise');
            $table->string('sold',1);
            $table->string('pourcentage')->nullable();
            $table->string('dimension');
            $table->string('status');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hectares');
    }
}
