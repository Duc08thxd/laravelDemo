<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// de dung model the loai

use App\comment;
use App\tintuc;

class CommentController extends Controller
{
    

    public function getXoa($id, $idTinTuc){
        $comment = comment::find($id);
        $comment->delete();

        return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao', 'Ban da xoa comment thanh cong');
    	
    }















}
