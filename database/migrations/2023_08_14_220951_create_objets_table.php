<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objets', function (Blueprint $table) {
            $table->id();
            $table->string('Titre');
            $table->string('Categorie');
            $table->string('Description');
            $table->date('Date_Annonce');
            $table->date ('Date_Recuperation');
            $table->string('Lieu_Recuperation');
            $table->string('Etet_Objet');
            $table->string('Image_Objet')->nullable();
            $table->unsignedBigInteger("user_id") ;
            $table->foreign('user_id')->references('id')->on('users') ;
            $table->integer('visitor_count')->default(0);
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
        Schema::dropIfExists('objets');
    }
};
