@extends('Admin.user.main')
@section('section')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th class="text-right no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody id="data">
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="profile.html" class="avatar"><img alt="" src="{{ asset('backend/img/profiles/'.$user->Avatar) }}"></a>
                                    <a href="profile.html">{{ $user->Name }} <span>{{ $user->Username }}</span></a>
                                </h2>
                            </td>
                            <td>{{ $user->Email}}</td>
                            <td>{{ $user->PhoneNumber}}</td>
                            <td>{{ $user->Address }}</td>
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
                                        <a class="dropdown-item btn-edit" href="#" data-id="{{ $user->UserID }}" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item btn-delete" data-id="{{ $user->UserID }}" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection