<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    protected $table='pasien';

    protected $fillable = [
        'hp','nama','tgl_lahir','jk','alamat','pekerjaan','pendidikan',
        'tinggal_dengan','status_rumah','nama_pasangan','tgl_lahir_pasangan',
        'pekerjaan_pasangan','pendidikan_pasangan',
        'puskesmas_id','user_id'
    ];
    public function pasien(){
        return $this->belongsTo('App\puskesmas');
    }

    public function pasien_user(){
        return $this->belongsTo('App\User');
    }
    public function pasien_anak(){
        return $this->hasMany('App\anak');
    }
}
