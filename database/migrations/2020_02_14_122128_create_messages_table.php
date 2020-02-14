<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appartement_id')->nullable();
            $table->integer('burreau_id')->nullable();
            $table->integer('entrepot_id')->nullable();
            $table->integer('immeuble_id')->nullable();
            $table->integer('magasin_id')->nullable();
            $table->integer('terrain_id')->nullable();
            $table->integer('hectare_id')->nullable();
            $table->integer('villa_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('message');
            $table->string('status');
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
        Schema::dropIfExists('messages');
    }
}
