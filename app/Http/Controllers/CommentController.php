<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //this function return view
    public function get_comment()
    {
        return view('comment');
    }
    //this function make a comment
    public function post_comment(Request $req)
    {
        //make validate on data
        $req->validate([
            'comment_description'=>'required|string|max:100',
            
            
        ]);
        //store data in database
        Comment::create([
            'comment_description'=>$req->comment_description,


        ]); 
        
        /*$user_email=DB::table('comments')->insert(
            ['comments_ibfk_1' => $req->user_uid]
        );*/
        return redirect(route('comment.get'));
    }
    
    public function edit($comment_description)
    {
        //make to find id
        $comment=Comment::findOrFail($comment_description);
        return view('edit_comment',compact('comment'));
    }
    public function update(Request $re,$comment_uid)
    {
        //make to find id and updata on data in database
        Comment::findOrFail($comment_uid)->update([
            'comment_description'=>$re->comment_description,
        ]);
        return view('welcome');

    }
    //delete comment
    public function comment_delete($comment_uid)
    {
        Comment::findOrFail($comment_uid)->delete();
        return view('welcome');
    }
    //
}
