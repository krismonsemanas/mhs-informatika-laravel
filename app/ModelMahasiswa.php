<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelMahasiswa extends Model
{
    protected $table = 'tb_mhs';
    protected $filable = ['nim','nama','jenis_kelamin','agama','foto','alamat'];
    public function getAvatar()
    {
       if (!$this->foto) {
           return asset('images/default.jpg');
       }else{
            return asset('images/'.$this->foto);
       }
    }
}
