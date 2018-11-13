<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tintuc extends Model
{
        protected $table = "tintuc";
        //1-1
        public function loaitin(){
        	return $this->belongsTo('App\loaitin', 'idLoaiTin', 'id');
        }
        // vi khi co loaitin ta tro tiep sang de lay the loai duoc
        // 1-n
        public function comment(){
        	return $this->hasMany('App\comment', 'idTinTuc', 'id');
        }
}
