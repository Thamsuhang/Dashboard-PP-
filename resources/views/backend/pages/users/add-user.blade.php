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
                            <h2>Add Users</h2>
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
                                   <div class="row">
                                       <div class="col-md-10">
                                           <form action="{{route('add-user-action')}}" method="post" enctype="multipart/form-data">
                                               @csrf
                                               <div class="form-group form-group-sm">
                                                   <label for="privilege">Select Privilege</label>
                                                   <select  id="privilege-id" multiple="multiple" name="privilege[]" class="form-control">
                                                       @foreach($privilegeData as $privilege)
                                                           <option value="{{$privilege->id}}">{{$privilege->privilege_name}}</option>
                                                       @endforeach
                                                   </select>
                                                   <a href="" style="color: red">{{$errors->first('name')}}</a>
                                               </div>
                                               <div class="form-group form-group-sm">
                                                   <label for="name">Name</label>
                                                   <input type="text" id="name" value="{{old('name')}}" name="name" class="form-control" placeholder="Enter your name here">
                                                   <a href="" style="color: red">{{$errors->first('name')}}</a>
                                               </div>
                                               <div class="form-group form-group-sm">
                                                   <label for="username">UserName</label>
                                                   <input type="text" id="username" value="{{old('username')}}" name="username" class="form-control" placeholder="Enter your username here" >
                                                   <a href="" style="color: red">{{$errors->first('username')}}</a>
                                               </div>
                                               <div class="form-group form-group-sm">
                                                   <label for="email">Email</label>
                                                   <input type="email" id="email" value="{{old('email')}}" name="email" class="form-control" placeholder="Enter your Email here">
                                                   <a href="" style="color: red">{{$errors->first('email')}}</a>
                                               </div>
                                               <div class="form-group form-group-sm">
                                                   <label for="password">Password</label>
                                                   <input type="password" id="password"  name="password" class="form-control" placeholder="Enter password">
                                                   <a href="" style="color: red">{{$errors->first('password')}}</a>
                                               </div>
                                               <div class="form-group form-group-sm">
                                                   <label for="password_confirmation">Confirm Password</label>
                                                   <input type="password" id="password"  name="password_confirmation" class="form-control" placeholder="Confirm password" >
                                                   <a href="" style="color: red">{{$errors->first('password')}}</a>
                                               </div>

                                                       <div class="form-group form-group-sm">
                                                           <label for="upload">Profile Picture</label>
                                                           <input type="file" id="change_image"  name="upload" class="btn btn-default">
                                                           <a href="" style="color: red">{{$errors->first('upload')}}</a>
                                                       </div>




                                               <div class="form-group form-group-sm">
                                                   <button class="btn btn-primary">Add Record</button>
                                               </div>



                                           </form>
                                       </div>
                                        <div class="col-md-2">

                                                <img src="{{url('svg/no.png')}}" id="target_image" class="img-responsive " width="180px" height="10"></img>

                                        </div>
                                   </div>

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