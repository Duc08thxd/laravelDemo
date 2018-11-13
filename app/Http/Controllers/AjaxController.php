<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// de dung model the loai
use App\theloai;
use App\loaitin;
use App\tintuc;

class AjaxController extends Controller
{
    
    public function getLoaiTin($idTheLoai){
        // truy van lay loai tin trong the loai
        // sau in ra cac loai tin da lay
        $loaitin = loaitin::where('idTheLoai',$idTheLoai)->get();
        foreach($loaitin as $lt) {   
             echo "<option value='".$lt->id."'>".$lt->Ten."</option>" ;
        }
    }





}
