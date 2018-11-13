<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theloai extends Model
{
        protected $table = "theloai";
        // khai bao lien ket khoa ngoai
        public function loaitin(){
        	return $this->hasMany('App\loaitin','idTheLoai', 'id');
        }
        // muon lay het tat ca tin tuc, lien ket thong qua bang loai tin
        public function tintuc(){
        	return $this->hasManyThrough('App\tintuc','App\loaitin', 'idTheLoai', 'idLoaiTin', 'id');
        }
}
