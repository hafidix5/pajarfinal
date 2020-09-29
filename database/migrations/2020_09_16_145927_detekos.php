<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Detekos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detekos', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('video');
            $table->BigInteger('jenis_edukasi_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('detekos', function (Blueprint $table){
            $table->foreign('jenis_edukasi_id')
                  ->references('id')
                  ->on('jenis_edukasi')
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
