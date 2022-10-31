<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    //this function return view
    public function get_blog()
    {
        return view('blog');
    }
    //this function create blog
    public function post_blog(request $r)
    {
        //make a validate on data from database
        $r->validate([
            'blog_title'=>'required|string|max:10',
            'blog_description'=>'required|string',
            'blog_img'=>'required|image|mimes:jpg,png',
        ]);
        //take the image
        $img=$r->file('blog_img');
        //make extension for image
        $exe=$img->getClientOriginalExtension();
        //give a unique name for image
        $name="blog-". uniqid() . ".$exe";
        //move image for uploads file
        $img->move(public_path('public/uploads') , $name);
        //store data in database
        Blog::create([
            'blog_title'=>$r->blog_title,
            'blog_description'=>$r->blog_description,
            'blog_img'=>$name,
        
        ]);
        return back();
    }
    //make edite
    public function blog_edit($blog_uid)
    {
        //this line take a blog_uid and return it
       $blog=Blog::findOrFail($blog_uid);
        return view('blog_edit',compact('blog'));
    }
    public function blog_update(Request $requ,$blog_uid)
    {
        //make a validate on data from database
        $requ->validate([
            'blog_title'=>'required|string|max:10',
            'blog_description'=>'required|string',
            'blog_img'=>'required|image|mimes:jpg,png',
        ]);
        //this line take a blog_uid and return it
        $blog=Blog::findOrFail($blog_uid);
        $name=$blog->blog_img;
        //check if requesrt has file or not
        if($requ->hasFile('blog_img'))
        {
            //if name is exist or not
           /* if($name!==null){
                //if it is happen make unlink
            unlink(public_path('public/uploads') . $name);
            }*/
            //take the new image
            $img=$requ->file('blog_img');
            //make new extension for image
        $exe=$img->getClientOriginalExtension();
        //give a new unique name for image
        $name="blog-". uniqid() . ".$exe";
        $img->move(public_path('public/uploads') , $name);

        }
        //make updata on blog
        $blog->update([
            'blog_title'=>$requ->blog_title,
            'blog_description'=>$requ->blog_description,
            'blog_img'=>$name,

        ]);
        return back();

    }
    //delete blog
    public function blog_delete($blog_uid)
    {
        $blog=Blog::findOrFail($blog_uid);
        if($blog->blog_img!==null)
        {
            unlink(public_path('uploads') . $blog->blog_img);
        }
        $blog->delete();
        return view('welcome');

    }
    //function to get all blogs
    public function index()
    {
        $blogs=Blog::get();
        return view('index',compact('blogs'));
    }
    //function to show blog by
    public function show($blog_uid)
    {
        echo'hii';exit();
        $blog=Blog::findOrFail($blog_uid);
        return view('show',compact('blog'));

    }
    public function activate($blog_uid)
    {
        //echo'hii';exit();

        Blog::findOrFail($blog_uid);
        DB::table('blogs')->where('blog_uid', $blog_uid)->update([
                
            'blog_status'=>1,

        ]);
        //echo $blog;
       /* if($blog==0)
        {
            $blog->update([
                
                'blog_status'=>1,
    
            ]);
            return view('act_massage');
        } */

    }
    /*public function activate($blog_uid, Request $req)
    {
        Blog::findOrFail($blog_uid);
        $b=Blog::get('blog_status');
        if($b==0)
        {
            $b->update([
                
                'blog_status'=>$req->user_status,
    
            ]);
            return view('act_massage');
        }
    } */
    public function get_active($blog_uid)
    {
        $blog=Blog::findOrFail($blog_uid);
        return view('active',compact('blog'));
    }

    //
}
