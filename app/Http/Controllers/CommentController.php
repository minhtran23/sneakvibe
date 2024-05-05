<?php

namespace App\Http\Controllers;

use App\Models\tbl_comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
     public function index(){
        $comment = tbl_comment::orderBy('created_at','desc')->get();
        return view('admin.comment.index',compact('comment'));
    }

    public function delete(Request $request, $id){

        $comment = tbl_comment::findOrfail($id);
         $comment->delete();
           
            Session::flash('message','Đã xóa bình luận thành công');
            return redirect()->back();
        

        
        
    }
}