<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PertanyaanRamodif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan_ramodif', function (Blueprint $table) {
            $table->id();
            $table->string('pertanyaan');
            $table->BigInteger('ramodif_id')->unsigned();
            $table->String('tahap');
            $table->timestamps();
        });
        Schema::table('pertanyaan_ramodif', function (Blueprint $table){
            $table->foreign('ramodif_id')
                  ->references('id')
                  ->on('ramodif')
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
