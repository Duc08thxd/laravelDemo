<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaitin extends Model
{
        protected $table = "loaitin";
        // khai bao cac lien ket
        // 1-1
        public function theloai(){
        	return $this->belongsTo('App\theloai', 'idTheLoai', 'id');
        }
        // 1-n
        public function tintuc(){
        	return $this->hasMany('App\tintuc', 'idLoaiTin', 'id');
        }
}
