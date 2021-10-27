@extends('Admin.layout.main')
@section('content')
<div class="page-wrapper">		
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img alt="" src="{{ asset('backend/img/profiles/'.$user->Avatar) }}"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">{{ $user->Name }}</h3>
                                            <h6 class="text-muted">Nhóm Team</h6>
                                            <small class="text-muted">
                                                @if ($user->UserType == 2)
                                                    Manager
                                                @else
                                                    Developer
                                                @endif
                                            </small>
                                            <div class="staff-id">Employee ID : {{ $user->UserID }}</div>
                                            <div class="small doj text-muted">Date of Join : {{ $user->created_at->format('jS F Y') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Phone:</div>
                                                <div class="text"><a href="">{{ $user->PhoneNumber }}</a></div>
                                            </li>
                                            <li>
                                                <div class="title">Email:</div>
                                                <div class="text"><a href="">{{ $user->Email }}</a></div>
                                            </li>
                                            <li>
                                                <div class="title">Username:</div>
                                                <div class="text">{{ $user->Username }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Address:</div>
                                                <div class="text">{{ $user->Address }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Gender:</div>
                                                <div class="text">Male</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
    @include('Admin.profile.modal')

</div>
<!-- /Page Wrapper -->
@endsection