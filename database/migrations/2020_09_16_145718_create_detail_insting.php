<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailInsting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_insting', function (Blueprint $table) {
            $table->id();
            $table->date('waktu');
            $table->string('jawaban');
            $table->BigInteger('pertanyaan_insting_id')->unsigned();
            $table->BigInteger('anak_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('detail_insting', function (Blueprint $table){
            $table->foreign('anak_id')
                  ->references('id')
                  ->on('anak')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
        Schema::table('detail_insting', function (Blueprint $table){
            $table->foreign('pertanyaan_insting_id')
                  ->references('id')
                  ->on('pertanyaan_insting')
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
        Schema::dropIfExists('detail_insting');
    }
}
