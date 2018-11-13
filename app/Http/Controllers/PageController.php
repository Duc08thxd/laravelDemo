<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;
use App\slide;
use App\loaitin;
use App\tintuc;

class PageController extends Controller
{

	function __construct(){
		$theloai = theloai::all();
		$slide = slide::all();
		view()->share('theloai', $theloai);
		view()->share('slide', $slide);
	}
    function trangchu(){
    //	$theloai = theloai::all();
    	return view('pages.trangchu');
    }
    function lienhe(){
    	return view('pages.lienhe');
    }
    function loaitin($id){
    	// lay loai tin theo id
    	$loaitin = loaitin::find($id);
    	//lay tat ca tin tuc theo loai tin, dung luon phan tranh
    	$tintuc = tintuc::where('idLoaiTin',$id)->paginate(5);
    	return view('pages.loaitin', ['loaitin'=>$loaitin, 'tintuc'=>$tintuc]);
    }

    function tintuc($id){
    	$tintuc = tintuc::find($id);
    	$tinnoibat = tintuc::where('NoiBat',1)->take(4)->get();
    	$tinlienquan = tintuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
    	return view('pages.tintuc', ['tintuc'=>$tintuc, 'tinnoibat'=>$tinnoibat, 'tinlienquan'=>$tinlienquan]);
    }













}
