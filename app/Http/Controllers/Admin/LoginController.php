<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){
        if($request->cookie('user_login')){
            return redirect()->route('home');
        }
        else{
            return View('Admin.login.index');
        }
        return View('Admin.login.index');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $username = $request->name;
            $password = $request->password;

            $user = User::where('Username','=',$username)->where('UserType','!=',0)->first();
            if(!empty($user)){
                if(Hash::check($password,$user["Password"])){
                    Cookie::queue('user_login',json_encode($user),10*365*24*3600);
                    return redirect('admin');
                }else{
                    return redirect()->back()->with('message','Mật khẩu không chính xác');
                }
            }else{
                return redirect()->back()->with('message','Tài khoản không tồn tại');
            }
        }
    }

    public function logout(Request $request){
        if($request->cookie('user_login')){
            Cookie::queue(Cookie::forget('user_login'));
            return redirect('admin/login');
        }
    }
}
