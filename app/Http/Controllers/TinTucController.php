<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// de dung model the loai
use App\theloai;
use App\loaitin;
use App\tintuc;
use App\comment;

class TinTucController extends Controller
{
    public function getDanhSach(){
    	$tintuc =tintuc::orderBy('id', 'ASC')->get();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);

    }

    public function getThem(){
        $theloai = theloai::all();
        $loaitin = loaitin::all();
        return view('admin.tintuc.them', ['theloai'=>$theloai, 'loaitin'=>$loaitin]);

    	
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                
                'TieuDe' => 'required|min:3|unique:TinTuc,TieuDe',
                'TomTat'=>'required',
                'NoiDung'=>'required'
            ],[
                'TieuDe.required'=>'Ban chua nhap ten Tieu De',
                'TieuDe.unique'=>'Ten tieu de da ton tai',
                'TieuDe.min'=>'Ten loai tin co do dai it nhat 3 ki tu',
                'TomTat.required'=>'ban chua nhap Tom Tat',
                'NoiDung.required'=>'Ban chua nhap Noi Dung'

            ]);
        $tintuc = new tintuc;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = str_slug($request->TieuDe,'-');
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->SoLuotXem = 0;

        //kiem tra nguoi dung co up anh len ko
        if ($request->hasFile('Hinh')) {
            // luu vao bien file
            $file = $request->file('Hinh');
            // kiem tra cai duoi co dung dinh dang
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi !='jpeg') {
                return redirect('admin/tintuc/them')->with('loi', 'Ban chi duoc chon file co duoi jpg, png, jpeg');
            }
            // neu ten hinh da ton tai, lay ten hinh
            $name = $file->getClientOriginalName();
            // dat ten cho ko trung
            $Hinh = str_random(4)."-".$name;
            while(file_exists("upload/tintuc/".$Hinh)){
                $Hinh = str_random(4)."-".$name;
            }
            // luu hinh anh lai
            $file->move("upload/tintuc/",$Hinh);
            $tintuc->Hinh = $Hinh;
        
        }else{
            $tintuc->Hinh = "";
        }

        $tintuc->save();
         return redirect('admin/tintuc/them')->with('thongbao', 'Ban da them thanh cong');
    	
    }


    public function getSua($id){
        $theloai = theloai::all();
        $loaitin = loaitin::all();
        $tintuc =  tintuc::find($id);
        return view('admin.tintuc.sua',['tintuc'=>$tintuc, 'theloai'=>$theloai, 'loaitin'=>$loaitin]);
    	
    }

    public function postSua(Request $request, $id){
        $tintuc = tintuc::find($id);
        $this->validate($request,
            [
                
                'TieuDe' => 'required|min:3',
                'TomTat'=>'required',
                'NoiDung'=>'required'
            ],[
                'TieuDe.required'=>'Ban chua nhap ten Tieu De',
                'TieuDe.min'=>'Ten loai tin co do dai it nhat 3 ki tu',
                'TomTat.required'=>'ban chua nhap Tom Tat',
                'NoiDung.required'=>'Ban chua nhap Noi Dung'

            ]);
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = str_slug($request->TieuDe,'-');
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;

        //kiem tra nguoi dung co up anh len ko
        if ($request->hasFile('Hinh')) {
            // luu vao bien file
            $file = $request->file('Hinh');
            // kiem tra cai duoi co dung dinh dang
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi !='jpeg') {
                return redirect('admin/tintuc/sua')->with('loi', 'Ban chi duoc chon file co duoi jpg, png, jpeg');
            }
            // neu ten hinh da ton tai, lay ten hinh
            $name = $file->getClientOriginalName();
            // dat ten cho ko trung
            $Hinh = str_random(4)."-".$name;
            while(file_exists("upload/tintuc/".$Hinh)){
                $Hinh = str_random(4)."-".$name;
            }
            // luu hinh anh lai
            $file->move("upload/tintuc/",$Hinh);
            // xoa file cu
            unlink("upload/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh = $Hinh;
        
        }

        $tintuc->save();
         return redirect('admin/tintuc/sua/'.$id)->with('thongbao', 'Ban da sua thanh cong');
        
    	
    }


    public function getXoa($id){
        $tintuc = tintuc::find($id);
        $tintuc->delete();

        return redirect('admin/tintuc/danhsach')->with('thongbao', 'Ban da xoa thanh cong');
    	
    }















}
