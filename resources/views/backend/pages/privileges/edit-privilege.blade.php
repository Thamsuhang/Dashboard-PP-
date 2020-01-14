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
                            <h2>Edit Privilege</h2>
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
                                    <form action="{{route('edit-privilege-action')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="criteria" value="{{$privilegeData->id}}">
                                        <div class="form-group form-group-sm">
                                            <label for="name">Privilege Name</label>
                                            <input type="text" name="privilege_name" class="form-control" id="name" value="{{$privilegeData->privilege_name}}" >
                                            <a href="" style="color: red;"> {{$errors->first('privilege_name')}}</a>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <button class="btn btn-success btn-sm">Update Privilege</button>
                                        </div>
                                    </form>

                                </div>
                                <hr>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->






@endsection