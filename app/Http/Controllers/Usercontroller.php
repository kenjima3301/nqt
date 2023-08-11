<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Support\Str;
use Illuminate\Mail\Mailables\Content;

class Usercontroller extends Controller
{   
    function login()
    {
        return view('auth.login');
    }
    
    function admin()
    {
        if(Auth::check())
        {
            return view('admin.dashboard');
        }

        return redirect('login')->with('success', 'you are not allowed to access');
    }
    
    function validate_login(Request $request)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);

//        $credentials = $request->only('email', 'password');

//        if(Auth::attempt($credentials))
//        {
         if(Auth::attempt(['phone' => request('email'), 'password' => request('password')]) || Auth::attempt(['email' => request('email'), 'password' => request('password')])){
          if(Auth::user()->hasRole('admin')){
            return redirect('admin');
          }else if (Auth::user()->hasRole('staff')){
            return redirect('staff/bang-quan-tri');
          }else if (Auth::user()->hasRole('client')){
            return redirect('client/profile');
          }else if (Auth::user()->hasRole('dealer')){
            return redirect('dealer/bang-quan-tri');
          }
        }

        return redirect('login')->with('success', 'Login details are not valid');
    }
    
    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('/');
    }
    
    public function register() {
      return view('auth.register');
    }
    
    public function registerpost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required'
        ]);
        
        $user = User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);
        
        RoleUser::create([
            'role_id' => 3,
            'user_id' => $user->id
        ]);
      $subject = "Xác minh địa chỉ email tài khoản Ngọc Quyết Thắng";
      $token = Str::random(64);
      $user->remember_token = $token;
      $user->save();
      $url = url('email/verify/'.$user->id.'/'.$token);
      $data['url'] = $url;
      (new MailController)->send($request->email,$subject,'email.register' ,$data);
        
        return back()->with('message','Đăng ký thành công. Vui lòng kiểm tra email của bạn và xác thực để đăng nhập tài khoản.');
    }
    
    public function verifyemail($id, $token) {
      $user = User::where('id', $id)->where('remember_token', $token)->first();
      if($user){
        $user->remember_token = NULL;
        $user->email_verified_at = now();
        $user->save();
      }
      return redirect('login');
    }
    
    public function forgotpass() {
      return view('auth.forgotpass');
    }
    
    public function forgotpasspost(Request $request) {
      $this->validate($request, [
            'email' => 'required|email|'
        ]);
      $user = User::where('email', $request->email)->first();
      if($user){
           $subject = "Yêu cầu đổi mật khẩu trên Ngọc Quyết Thắng";
            $token = Str::random(64);
            $user->remember_token = $token;
            $user->save();
            $url = url('email/changepass/'.$user->id.'/'.$token);
            $data['url'] = $url;
        (new MailController)->send($request->email,$subject,'email.forgotpass' ,$data);
        return back()->with('success', 'Email đã được gửi vui long kiểm tra email và đổi mật khẩu theo hướng dẫn.');
      }else {
        return back()->with('message', 'Email chưa được đăng ký. Hãy đăng ký tài khoản cho email này.');
      }
    }
    
     public function changepass($id, $token, ) {
       return view('auth.changepass',['id' => $id, 'token' => $token]);
    }
    
    public function changepasspost(Request $request ) {
      $this->validate($request, [
            'password' => 'required'
        ]);
      $user = User::where('id', $request->id)->where('remember_token', $request->tocken)->first();
      if($user){
        $user->remember_token = NULL;
        $user->password = Hash::make($request->password);
        $user->save();
      }
      return redirect('login');
    }
}
