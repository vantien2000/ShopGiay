<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;


class UserController extends Controller
{
    public function index(){
        $users = User::where('UserType',1)->paginate(5);
        return View('admin.user.index')->with(['users'=>(object)$users]);
    }

    public function list(){
        $users = User::where('UserType',1)->paginate(5);
        return View('admin.user.list')->with(['users'=>(object)$users]);
    }

    public function showUser($id){
        $user = User::where('UserID',$id)->first();
        return response()->json($user);
    }

    public function addUser(Request $request){
        if(in_array(null, (array)$request->all(), true)){
            return response()->json(['error'=>'Vui lòng nhập đầy đủ thông tin!!']);
        }else{
            if(User::where('Username',$request->username)->first()){
               return response()->json(['error'=>'Username đã tồn tại!!']);
            }else if(User::where('Email',$request->email)->first()){
                return response()->json(['error'=>'Email đã tồn tại!!']);
            }else if(User::where('Email',$request->email)->where('Username',$request->username)->first()){
                return response()->json(['error'=>'Tài khoản đã tồn tại!!']);
            }else{
                if($request->password == $request->conf){
                    $user = new User();
                    $user->Username = $request->username;
                    $user->Name = $request->first_name.' '.$request->last_name;
                    $user->Email = $request->email;
                    $user->Password = bcrypt($request->password);
                    $user->Avatar = 'user.jpg';
                    $user->PhoneNumber = $request->phone;
                    $user->Address = $request->address;
                    $user->Status = 1;
                    $user->UserType = 1;
                    $user->save();
                    return response()->json(['success'=>'Thêm thành công']);
                }else{
                    return response()->json(['error'=>'Vui lòng kiểm tra lại thông tin']);
                }
            }
            
        }
    }

    public function editUser(Request $request,$id){
        if(in_array(null, (array)$request->all(), true)){
            return response()->json(['error'=>'Vui lòng nhập đầy đủ thông tin!!']);
        }else{
            if($request->password == $request->conf){
                User::where('UserID',$id)->update([
                    'Username'=> $request->username,
                    'Name' => $request->first_name.' '.$request->last_name,
                    'Email' =>$request->email,
                    'Password'=>bcrypt($request->password),
                    'PhoneNumber'=>$request->phone,
                    'Address'=>$request->address
                ]);
                return response()->json(['success'=>'Sửa thành công']);
            }else{
                return response()->json(['error'=>'Vui lòng kiểm tra lại thông tin']);
            }
        }
    }

    public function search(Request $request){
        if(empty($request->user) && empty($request->name)){
            $users = User::all()->get();
        }else{
            if(empty($request->name))
                $users = User::where("UserType",1)->where('Username','like','%'.$request->user.'%')->get();
            else if(empty($request->user))
                $users = User::where("UserType",1)->where('Name','like','%'.$request->name.'%')->get();
            else
                $users = User::where("UserType",1)->where('Username','like','%'.$request->user.'%')
                ->where('Name','like','%'.$request->name.'%')
                ->get();
        }

        $output = "";

        $result = "";
        if(count($users) > 0){
            foreach($users as $user)
            {
                $output = $output.'<tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="profile.html" class="avatar"><img alt="" src="'.$request->root().'/backend/img/profiles/'.$user->Avatar.'"></a>
                                    <a href="profile.html">'.$user->Name.'<span>'.$user->Username.'</span></a>
                                </h2>
                            </td>
                            <td>'.$user->Email.'</td>
                            <td>'.$user->PhoneNumber.'</td>
                            <td>'.$user->Address.'</td>
                            <td>
                                <div class="dropdown">
                                    <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Web Developer </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Software Engineer</a>
                                        <a class="dropdown-item" href="#">Software Tester</a>
                                        <a class="dropdown-item" href="#">Frontend Developer</a>
                                        <a class="dropdown-item" href="#">UI/UX Developer</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item btn-edit" href="#" data-id="'.$user->UserID.'" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item btn-delete" data-id="'.$user->UserID.'" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>';
                    
                    $result = $result.'<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                                    <div class="profile-widget">
                                        <div class="profile-img">
                                            <a href="profile.html" class="avatar"><img src="'.$request->root().'/backend/img/profiles/'.$user->Avatar.'" alt=""></a>
                                        </div>
                                        <div class="dropdown profile-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item btn-edit" data-id="'.$user->UserID.'" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item btn-delete" data-id="'.$user->UserID.'" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">'.$user->Name.'</a></h4>
                                        <div class="small text-muted">'.$user->Username.'</div>
                                    </div>
                                </div> ';
            }
        }else{
            return ['output'=>$output,'result'=>$result];
        }
        return ['output'=>$output,'result'=>$result];
    }

    public function deleteUser($id){
        User::where('UserID',$id)->delete();
        return response()->json(['ok'=>true]);
    }
}
