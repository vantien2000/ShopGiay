@extends('Admin.clients.main')
@section('section')
<div id="data-show" class="row staff-grid-row ">
    @foreach ($users as $user)
    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
        <div class="profile-widget">
            <div class="profile-img">
                <a href="profile.html" class="avatar"><img src="{{ asset('backend/img/profiles/'.$user->Avatar) }}" alt=""></a>
            </div>
            <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item btn-edit" data-id="{{ $user->UserID }}" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                    <a class="dropdown-item btn-delete" data-id="{{ $user->UserID }}" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                </div>
            </div>
            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">{{ $user->Name }}</a></h4>
            <div class="small text-muted">{{ $user->Username }}</div>
            <a href="client-profile.html" class="btn btn-white btn-sm m-t-10 justify-content-center">View Profile</a>
        </div>
    </div> 
    @endforeach
</div>
@endsection
