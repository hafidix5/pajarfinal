<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanInsting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan_insting', function (Blueprint $table) {
            $table->id();
            $table->string('pertanyaan');
            $table->BigInteger('insting_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('pertanyaan_insting', function (Blueprint $table){
            $table->foreign('insting_id')
                  ->references('id')
                  ->on('insting')
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
        Schema::dropIfExists('pertanyaan_insting');
    }
}
