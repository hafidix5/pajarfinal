<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class puskesmas extends Model
{
    protected $table ='puskesmas';

    protected $fillable = [
        'nama','alamat',
    ];
    public function puskesmas(){
        return $this->hasMany('App\admin');
    }
    public function pasien(){
        return $this->hasMany('App\pasien');
    }
}
