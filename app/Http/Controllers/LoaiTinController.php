<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// de dung model the loai
use App\loaitin;
use App\theloai;

class LoaiTinController extends Controller
{
    public function getDanhSach(){
    	$loaitin = loaitin::all();
    	return view('admin.loaitin.danhsach', ['loaitin'=>$loaitin]);
    }

    public function getThem(){
        $theloai = theloai::all();
    	return view('admin.loaitin.them', ['theloai'=>$theloai]);
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'Ten' => 'required|unique:loaitin,Ten|min:1|max:100',
                'theloai'=>'required'
            ],[
                'Ten.required'=>'Ban chua nhap ten loai tin',
                'Ten.unique'=>'Ten loai tin da ton tai',
                'Ten.min'=>'Ten loai tin co do dai tu 1 - 100 ki tu',
                'Ten.max'=>'Ten loai tin co do dai tu 1 - 100 ki tu',
                'theloai.required'=>'Ban chua chon ten the loai'

            ]);
        $loaitin = new loaitin;
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = str_slug($request->Ten,'-');
        $loaitin->idTheLoai = $request->theloai;
        $loaitin->save();

        return redirect('admin/loaitin/them')->with('thongbao', 'Ban da them thanh cong');


    	
    }


    public function getSua($id){
        $theloai = theloai::all();
        $loaitin = loaitin::find($id);
        return view('admin.loaitin.sua',['loaitin'=>$loaitin ,'theloai'=>$theloai]);
    	
    }

    public function postSua(Request $request, $id){

    	$this->validate($request,
            [
                'Ten' => 'required|unique:loaitin,Ten|min:1|max:100',
                'theloai'=>'required'
            ],[
                'Ten.required'=>'Ban chua nhap ten loai tin',
                'Ten.unique'=>'Ten loai tin da ton tai',
                'Ten.min'=>'Ten loai tin co do dai tu 1 - 100 ki tu',
                'Ten.max'=>'Ten loai tin co do dai tu 1 - 100 ki tu',
                'theloai.required'=>'Ban chua chon ten the loai'

            ]);

        $loaitin = loaitin::find($id);
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = str_slug($request->Ten,'-');
        $loaitin->idTheLoai = $request->theloai;
        $loaitin->save();

        return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Ban da sua thanh cong');

    }


    public function getXoa($id){
    	$loaitin = loaitin::find($id);
    	$loaitin->delete();

    	return redirect('admin/loaitin/danhsach')->with('thongbao','Ban da xoa thanh cong');
    }















}
