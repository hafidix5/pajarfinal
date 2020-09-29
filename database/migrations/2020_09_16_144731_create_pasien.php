<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tgl_lahir');
            $table->string('jk');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('hp',12);
            $table->string('tinggal_dengan');
            $table->string('alamat');
            $table->string('status_rumah');
            $table->string('nama_pasangan');
            $table->date('tgl_lahir_pasangan');
            $table->string('pekerjaan_pasangan');
            $table->string('pendidikan_pasangan');
            $table->bigInteger('puskesmas_id')->unsigned();
            $table->foreign('puskesmas_id')->references('id')->on('puskesmas');
            $table->bigInteger('user_id')->unsigned()->unique();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
    }
}
