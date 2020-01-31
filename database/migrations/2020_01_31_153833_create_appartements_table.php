<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('short_description');
            $table->string('large_description');
            $table->string('adresse');
            $table->string('ville');
            $table->string('pays');
            $table->string('type',20);
            $table->string('option');
            $table->string('align',2);
            $table->string('prix');
            $table->string('devise');
            $table->string('solde');
            $table->string('pourcentage');
            $table->string('chambre', 3);
            $table->string('cuisine',3);
            $table->string('garage',3);
            $table->string('salon',3);
            $table->string('sale_de_bain',3);
            $table->string('image',10);
            $table->string('status',1);
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
        Schema::dropIfExists('appartements');
    }
}
