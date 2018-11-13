<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// de dung model the loai
use Illuminate\Support\Facades\Auth;

use App\User;

class UserController extends Controller
{
    public function getDanhSach(){
        $user = User::all();
        return view('admin.user.danhsach', ['user' => $user]);	
    }

    public function getThem(){
       return view('admin.user.them');
    	
    }

    public function postThem(Request $request){
       $this->validate($request,
        [
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'
        ],[
            'name.required'=>'Ban chua nhap ten',
            'name.min'=>'Ten nguoi dung lon hon ky tu',
            'email.required'=>'ban chua nhap email',
            'email.email'=>'Ban chua nhap dung dinh danh email',
            'email.unique'=>'Email da ton tai',
            'password.required'=>'ban chua nhap mat khau',
            'password.min'=>'password tu 3-32 ky tu',
            'password.max'=>'password tu 3-32 ky tu',
            'passwordAgain.required'=>'ban chua nhap lai mat khau',
            'passwordAgain.same'=>'nhap lai mat khau chua dung'


        ]);

       $user = new User;
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);
       $user->quyen = $request->quyen;
       $user->save();

       return redirect('admin/user/them')->with('thongbao','ban da them thanh cong' );

    	
    }

    public function getSua($id){
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);

    }

    public function postSua(Request $request, $id){
        $this->validate($request,
        [
            'name'=>'required|min:3',
            
        ],[
            'name.required'=>'Ban chua nhap ten',
            'name.min'=>'Ten nguoi dung lon hon ky tu',
            
        ]);

       $user = User::find($id);
       $user->name = $request->name;
       $user->quyen = $request->quyen;
       $user->save();


       if ($request->changePassword == "on") {

            $this->validate($request,
        [
            
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'
        ],[
            
            'password.required'=>'ban chua nhap mat khau',
            'password.min'=>'password tu 3-32 ky tu',
            'password.max'=>'password tu 3-32 ky tu',
            'passwordAgain.required'=>'ban chua nhap lai mat khau',
            'passwordAgain.same'=>'nhap lai mat khau chua dung'


        ]);
        $user->password = bcrypt($request->password);


       }

       return redirect('admin/user/sua/'.$id)->with('thongbao','ban da sua thanh cong' );
    }


    public function getXoa($id){

       $user = User::find($id);
       $user->delete();

        return redirect('admin/user/danhsach')->with('thongbao','ban da xoa thanh cong');
      
    	
    }

    public function getDangnhapAdmin(){
      return view('admin.login');
    }

    public function postDangnhapAdmin(Request $request){
      $this->validate($request,
        [
            'email'=>'required',
            'password'=>'required|min:3|max:32'
        ],[
            'email.required'=>'ban chua nhap email',
            'password.required'=>'ban chua nhap Password',
            'password.min'=>'password tu 3-32 ky tu',
            'password.max'=>'password tu 3-32 ky tu'

        ]);
      if (Auth::attempt(['email'=>$request->email,
                          'password'=>$request->password])) {
          return redirect('admin/theloai/danhsach');
      }else{
        return redirect('admin/dangnhap')->with('thongbao','Dang nhap khong thanh cong');
      }

    }


    public function getDangxuatAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap');


    }











}
