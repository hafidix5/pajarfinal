<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('hp')->unique();
            $table->BigInteger('puskesmas_id')->unsigned();
            $table->BigInteger('user_id')->unsigned()->unique();
            $table->timestamps();
        });
        Schema::table('admin', function (Blueprint $table){
            $table->foreign('puskesmas_id')
                  ->references('id')
                  ->on('puskesmas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
        Schema::table('admin', function (Blueprint $table){
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
