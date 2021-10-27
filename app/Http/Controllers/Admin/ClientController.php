<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ClientController extends Controller
{

    public function index(){
        $users = User::where('UserType',0)->paginate(5);
        return View('admin.clients.index')->with(['users'=>(object)$users]);
    }

    public function list(){
        $users = User::where('UserType',0)->paginate(5);
        return View('admin.clients.list')->with(['users'=>(object)$users]);
    }

    public function showUser($id){
        $user = User::where('UserID',$id)->first();
        return response()->json($user);
    }

    public function status(Request $request){
        $user = User::where('UserID',$request->get('id'))->update(['status'=>$request->get('status')]);
        $output = '';
        if($request->get('status') == 1){
            $output.= '<i class="fa fa-dot-circle-o text-success"></i> Active';
        }else{
            $output.= '<i class="fa fa-dot-circle-o text-danger"></i> Inactive';
        }
        return ['output'=>$output];
    }

    public function search(Request $request){
        $users = User::where("UserType",0)->where('Username','like','%'.$request->user.'%')
        ->where('Name','like','%'.$request->name.'%')
        ->get();

        $output = "";

        $result = "";
        if(!empty($users)){
            foreach($users as $user)
            {
                $output = $output.'<tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="profile.html" class="avatar"><img alt="" src="'.$request->root().'/backend/img/profiles/'.$user->Avatar.'"></a>
                                    <a href="profile.html">'.$user->Name.'</a>
                                </h2>
                            </td>
                            <td>'.$user->Username.'</td>
                            <td>'.$user->Email.'</td>
                            <td>'.$user->PhoneNumber.'</td>
                            <td>'.$user->Address.'</td>
                            <td>
                                <div class="dropdown action-label">
                                    <a href="#" id="status" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false">'.($user->status == 1 ? ' <i class="fa fa-dot-circle-o text-success"></i> Active' : '<i class="fa fa-dot-circle-o text-danger"></i> Inactive').'</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item action" data-id="'.$user->UserID.'" status="1"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                        <a class="dropdown-item action" data-id="'.$user->UserID.'" status="0"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
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
                                        <a href="client-profile.html" class="btn btn-white btn-sm m-t-10 justify-content-center">View Profile</a>
                                    </div>
                                </div> ';
            }
        }else{
            return ['output'=>$output,'result'=>$result];
        }
        return ['output'=>$output,'result'=>$result];
    }
    
}


