<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    //this function make for make a login
    public function postLogin(Request $request)
    {
        //MAKE validate for user_email and user_password
        $request->validate([
            'user_email'=>'required|email|max:100',
            'user_password'=>'required|string|max:50|min:5',
        ]);
        //this make for try to take a user_email and user_password from database
        $is_login=Auth::attempt(['user_email'=>$request->user_email,'password'=>$request->user_password]);
        //this condition to check if user_email and user_password in database or not if find will enter to dashbord
        //else return back to login form
        if(!$is_login)
        {
            return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
        }
        else{
            return redirect("dashboard");
        }
      
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        //MAKE validate for user_email and user_password & user_nam
        $user_verified_code = Str::random(6);
        //save this code to database
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
            'user_verified_code'=>$user_verified_code,
            'user_password'=>Hash::make($request->user_password),

        ]);
        //after create in database you will direct login and go to dashboard 
        Mail::to($user->user_email)->send(new RegisterMail($user_verified_code));
        $use=DB::table('users')->where('user_email',$request->user_email )->value('user_verified_code');
        if($use==$user_verified_code)
        {
           return view('login');
        }

        //Auth::login($user);
        //$data = $request->all();
        //$check = $this->create($data);
       // return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
       'user_name' => $data['user_name'],
       'user_email' => $data['user_email'],
       'user_mobile' => $data['user_mobile'],
       'user_password' =>  Hash::make($data['user_password'])
      ]);
    }
    public function get_verification()
    {
        return view('verification_code');
    }
  /*  public function post_verification(request $re)
    {
        if($re->user_verified_code==$user_verified_code){
            return view('dashboard');
        }
        else{
            return back();
        }
    }*/
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
      
        Session::flush();
      
        
        Auth::logout();
  
        return Redirect('login');
    }
}
    //

