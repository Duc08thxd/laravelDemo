<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// de dung model the loai

use App\slide;

class SlideController extends Controller
{
    public function getDanhSach(){
    	$slide = slide::all();
        return view('admin.slide.danhsach', ['slide'=>$slide]);

    }

    public function getThem(){
        return view('admin.slide.them');
    	
    }

    public function postThem(Request $request){
       $this->validate($request,[
            'Ten'=>'required',
            'NoiDung'=>'required'
       ],[
            'Ten.required'=>'ban chua nhap ten',
            'NoiDung.required'=>'ban chua nhap noi dung'
       ]);

       $slide = new slide;
       $slide->Ten = $request->Ten;
       $slide->NoiDung = $request->NoiDung;
       if ($request->has('link')) {
           $slide->link = $request->link;
       }
       if ($request->hasFile('Hinh')) {
            // luu vao bien file
            $file = $request->file('Hinh');
            // kiem tra cai duoi co dung dinh dang
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi !='jpeg') {
                return redirect('admin/slide/them')->with('loi', 'Ban chi duoc chon file co duoi jpg, png, jpeg');
            }
            // neu ten hinh da ton tai, lay ten hinh
            $name = $file->getClientOriginalName();
            // dat ten cho ko trung
            $Hinh = str_random(4)."-".$name;
            while(file_exists("upload/slide/".$Hinh)){
                $Hinh = str_random(4)."-".$name;
            }
            // luu hinh anh lai
            $file->move("upload/slide/",$Hinh);
            $slide->Hinh = $Hinh;
        
        }else{
            $silde->Hinh = "";
        }

        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','ban da them slide thanh cong');
    	
    }


    public function getXoa($id){

        $slide = slide::find($id);
        $slide->delete();

        return redirect('admin/slide/danhsach')->with('thongbao','xoa thanh cong');
      
    	
    }















}
