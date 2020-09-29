<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PertanyaanDetekos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan_detekos', function (Blueprint $table) {
            $table->id();
            $table->string('pertanyaan');
            $table->BigInteger('detekos_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('pertanyaan_detekos', function (Blueprint $table){
            $table->foreign('detekos_id')
                  ->references('id')
                  ->on('detekos')
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
