@extends('Admin.clients.main')
@section('section')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="data">
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="profile.html" class="avatar"><img alt="" src="{{ asset('backend/img/profiles/'.$user->Avatar) }}"></a>
                                    <a href="profile.html">{{ $user->Name }}</a>
                                </h2>
                            </td>
                            <td>{{ $user->Username}}</td>
                            <td>{{ $user->Email}}</td>
                            <td>{{ $user->PhoneNumber}}</td>
                            <td>{{ $user->Address }}</td>
                            <td>
                                <div class="dropdown action-label">
                                    <a href="#" id="status" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        @if ($user->status == 1)
                                            <i class="fa fa-dot-circle-o text-success"></i> Active
                                        @else
                                            <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                        @endif
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item action" data-id="{{ $user->UserID }}" status="1"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
										<a class="dropdown-item action" data-id="{{ $user->UserID }}" status="0"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
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