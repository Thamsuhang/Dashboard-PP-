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
                            <h2>Manage Privilege</h2>
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
                                <div class="col md-12">
                                    @include('backend.layouts.messages')
                                    <form action="{{route('add-privilege')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group form-group-sm">
                                            <label for="name">Privilege Name</label>
                                            <input type="text" name="privilege_name" class="form-control" id="name" >
                                            <a href="" style="color: red;"> {{$errors->first('privilege_name')}}</a>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <button class="btn btn-success btn-sm">Add Privileges</button>
                                  </div>
                                    </form>

                                </div>
                                <hr>
                                <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Pivilege Name</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($privilegeData as $key=>$privilege)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{ucfirst($privilege->privilege_name)}}</td>
                                        <td>
                                            <form action="{{route('update-privilege-status')}}" method="Post">
                                                @csrf
                                                <input type="hidden" name="criteria" value="{{$privilege->id}}">
                                            @if($privilege->status==1)
                                            <button name="active" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                                @else
                                                <button name="inactive" class="btn btn-warning btn-xs"><i class="fa fa-times"></i></button>
                                            @endif
                                            </form>
                                        </td>
                                        <td>{{$privilege->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{route('edit-privilege').'/'.$privilege->id}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('delete-privilege').'/'.$privilege->id}}" class="btn btn-danger btn-xs" onclick="return confirm('are you sure?')"><i class="fa fa-trash-o"></i></a>
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