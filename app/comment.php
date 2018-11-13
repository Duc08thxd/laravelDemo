<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = "comment";
    //1-1
    public function tintuc(){
    	return $this->belongsTo('App\tintuc', 'idTinTuc', 'id');
    }
    //1-1
    public function user(){
    	return $this->belongsTo('App\User', 'idUser', 'id');
    }
}
