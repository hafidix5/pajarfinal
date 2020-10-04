<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anak extends Model
{
    protected $table='anak';
    protected $fillable = [
        'nama','jk','tgl_lahir','usia','anak_ke','pasien_id'
    ];
    public function admin(){
        return $this->belongsTo('App\pasien');
    }
}
