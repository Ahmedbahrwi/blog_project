<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function get_user()
    {
        return view('add_user');
    }
    public function add_user(Request $request)
    {  
        //MAKE validate for user_email and user_password & user_nam
        $request->validate([
            'user_name'=>'required|string|max:100',
            'user_email'=>'required|email|max:100',
            'user_password'=>'required|string|max:50|min:5',
            
        ]);
        //create in table users username and password and usermobile and email in database that take from user
        $user=User::create([
            'user_name'=>$request->user_name,
            'user_email'=>$request->user_email,
            'user_mobile'=>$request->user_mobile,
            
            'user_password'=>Hash::make($request->user_password),

        ]);
       
        //$data = $request->all();
        //$check = $this->create($data);
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    public function user_edit($user_uid)
    {
        //make to find id
        $user=User::findOrFail($user_uid);
        return view('edit_comment',compact('user'));
    }
    public function user_update(Request $re,$user_uid)
    {
        //make to find id and updata on data in database
        User::findOrFail($user_uid)->update([
            'user_name'=>$re->user_name,
            'user_email '=>$re->user_email,
            'user_password'=>$re->user_password, 
        ]);
        return view('welcome');

    }
    public function user_delete($user_uid)
    {
        User::findOrFail($user_uid)->delete();
        return view('welcome');
    }
    public function user_index()
    {
        $users=User::get();
        return view('user_index',compact('users'));
    }
    //function to show blog by id
    public function user_show($user_uid)
    {
        $user=User::findOrFail($user_uid);
        return view('user_show',compact('user'));

    }
    //
}
