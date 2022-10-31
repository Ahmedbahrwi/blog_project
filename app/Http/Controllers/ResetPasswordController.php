<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function getPassword($token) { 

        return view('reset', ['token' => $token]);
     }
   
     public function updatePassword(Request $request)
     {
   
     $request->validate([
         'user_email' => 'required|email|exists:users',
         'user_password' => 'required|string|min:6|confirmed',
         'password_confirmation' => 'required',
   
     ]);
   
     $updatePassword = DB::table('password_resets')
                         ->where(['email' => $request->email, 'token' => $request->token])
                         ->first();
   
     if(!$updatePassword)
         return back()->withInput()->with('error', 'Invalid token!');
         
         
   
       $user = User::where('user_email', $request->user_email)
                   ->update(['user_password' => Hash::make($request->user_password)]);
   
       DB::table('password_resets')->where(['email'=> $request->email])->delete();
   
       return redirect(route('login.post'))->with('message', 'Your password has been changed!');
   
     }
    //
}
