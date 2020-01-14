@section('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title',$title) </title>

    <!-- Bootstrap -->
    <link href="{{url('admin/bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('admin/bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('admin/bower_components/gentelella/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="{{url('admin/bower_components/gentelella/vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">
    <link href="{{url('admin/bower_components/gentelella/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{url('admin/bower_components/gentelella/build/css/custom.min.css')}}" rel="stylesheet">

</head>
<body>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
@endsection