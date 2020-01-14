@extends('backend.master.master')
@section('content')




    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">



            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Users</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12">
                                @include('backend.layouts.messages')
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Privilege Name</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($adminData as $key=>$admin)
                                    <tr>
                                        <td>{{$key++}}</td>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->username}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>
                                        @foreach($admin->privilege as $pri)
                                                <span class="label label-success">{{$pri->privilege_name}}</span>
                                            @endforeach
                                        </td>
                                        <td>{{$admin->status}}</td>
                                        <td><img src="{{url('lib/uploads/users/'.$admin->image)}}" alt="" width="130" height="150"></td>
                                        <td>
                                            <a href="{{route('edit-user')}}" class="btn btn-success btn-xs">Edit</a>
                                            <a href="{{route('delete-user').'/'.$admin->id}}" class="btn btn-danger btn-xs">Delete</a>
                                        </td>

                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->






@endsection