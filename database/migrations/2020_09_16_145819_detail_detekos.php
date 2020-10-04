<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailDetekos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_detekos', function (Blueprint $table) {
            $table->id();
            $table->date('waktu');
            $table->string('jawaban');
            $table->BigInteger('pertanyaan_detekos_id')->unsigned();
            $table->BigInteger('anak_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('detail_detekos', function (Blueprint $table){
            $table->foreign('anak_id')
                  ->references('id')
                  ->on('anak')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
        Schema::table('detail_detekos', function (Blueprint $table){
            $table->foreign('pertanyaan_detekos_id')
                  ->references('id')
                  ->on('pertanyaan_detekos')
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
