<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function myProfile($id){
        $user = User::where('UserID',$id)->first();
        return View('Admin.profile.index')->with(['user'=>$user]);
    }

    public function edit(Request $request,$id){
        $filename = '';
        if(in_array(null, (array)$request->all(), true)){
            return response()->json(['error'=>'Vui lòng nhập đầy đủ thông tin!!']);
        }else{
            if (!$request->hasFile('image_profile')) {
                $user = User::where('UserID',$id)->first();
                // Nếu không thì in ra thông báo
                $filename =  $user->Avatar;
            }else{
                $image = $request->file('image_profile');
                $image->move(public_path('/backend/img/profiles'), $image->getClientOriginalName());
                $filename = $image->getClientOriginalName();
            }
            User::where('UserID',$id)->update([
                'Username'=> $request->username,
                'Name' => $request->fullname,
                'Email' =>$request->email,
                'PhoneNumber'=>$request->phone,
                'Address'=>$request->address,
                'Avatar'=> $filename
            ]);
            return response()->json(['success'=>'Sửa thông tin thành công']);
        }
    }
}
