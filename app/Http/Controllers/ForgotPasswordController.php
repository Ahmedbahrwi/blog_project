<?php

namespace App\Http\Controllers;

use App\Mail\forgetPassword;
use Illuminate\Support\Str;
use Carbon\Carbon; 
use App\Models\User; 
use Illuminate\Support\Facades\Mail;        
use Illuminate\Mail\Mailable; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Mail as FacadesMail;

class ForgotPasswordController extends Controller
{
     /**
       * Write code on Method
       *
       * @return response()
       */
      public function getEmail()
  {

     return view('email');
  }

 public function postEmail(Request $request)
  {
    $request->validate([
        'user_email' => 'required|email|exists:users',
    ]);

    $token = Str::random(64);

    $user_email=DB::table('password_resets')->insert(
          ['email' => $request->user_email, 'token' => $token, 'created_at' => Carbon::now()]
      );

      Mail::to($request->user_email)->send(new forgetPassword($token));

      return redirect(route('get.email'));
      // back()->with('message', 'We have e-mailed your password reset link!');
  }
}
    //

