<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->string('statu')->default("unread");
            $table->unsignedBigInteger("sender_id") ;
            $table->foreign('sender_id')->references('id')->on('users') ;
            $table->unsignedBigInteger("reciever_id") ;
            $table->foreign('reciever_id')->references('id')->on('users') ;
            $table->unsignedBigInteger("objet_id") ;
            $table->foreign('objet_id')->references('id')->on('objets') ;
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
};
