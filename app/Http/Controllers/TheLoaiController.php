<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// de dung model the loai
use App\theloai;

class TheLoaiController extends Controller
{
    public function getDanhSach(){
    	$theloai = theloai::all();
    	return view('admin.theloai.danhsach', ['theloai'=>$theloai]);
    }

    public function getThem(){
    	return view('admin.theloai.them');
    }

    public function postThem(Request $request){
    	$this->validate($request,
	    	[
	    		'Ten'=>'required|unique:theloai,Ten|min:3|max:100'
	    	],
	    	[
	    		'Ten.require'=>'ban chua nhap ten the loai',
	    		'Ten.min'=>'ten the loai trong khoang tu 3-100 ky tu',
	    		'Ten.max'=>'ten the loai trong khoang tu 3-100 ky tu',
	    		'Ten.unique' => 'Ten the loai da ton tai'

	    	]);
    	$theloai = new theloai;
    	$theloai->Ten = $request->Ten;
    	$theloai->TenKhongDau = str_slug($request->Ten,'-');
    	$theloai->save();

    	return redirect('admin/theloai/them')->with('thongbao', 'Them thanh cong');
    }


    public function getSua($id){
    	$theloai = theloai::find($id);
    	return view('admin.theloai.sua', ['theloai'=>$theloai]);
    }

    public function postSua(Request $request, $id){
    	$theloai = theloai::find($id);
    	$this->validate($request,
    		[
    			'Ten' => 'required|unique:theloai,Ten|min:3|max:100'
    		],
    		[
    			'Ten.required' => 'ban chua nhap ten the loai',
    			'Ten.unique' => 'Ten the loai da ton tai',
    			'Ten.min'=>'ten the loai trong khoang tu 3-100 ky tu',
	    		'Ten.max'=>'ten the loai trong khoang tu 3-100 ky tu'

    		]);

    	$theloai->Ten = $request->Ten;
    	$theloai->TenKhongDau = str_slug($request->Ten,'-');
    	$theloai->save();

    	return redirect('admin/theloai/sua/'.$id)->with('thongbao', 'Sua thanh cong');
    }


    public function getXoa($id){
    	$theloai = theloai::find($id);
    	$theloai->delete();

    	return redirect('admin/theloai/danhsach')->with('thongbao','Ban da xoa thanh cong');
    }















}
