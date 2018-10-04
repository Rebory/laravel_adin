@extends('layouts.adminlayout.admin_design')
@section('content')
<div class="slim-mainpanel">
<div class="container">
<div class="slim-pageheader">
<ol class="breadcrumb slim-breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Settings</li>
</ol>
<h6 class="slim-pagetitle">Settings</h6>
</div>
<!-- slim-pageheader -->

@if ($errors->any())
<div class="alert alert-solid alert-danger divhide5">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
@if(Session::has('flash_message_error'))
<div class="alert alert-solid alert-danger divhide5">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong>{!! session('flash_message_error') !!}</strong>
</div>
@endif

@if(Session::has('flash_message_success'))
<div class="alert alert-solid alert-success divhide5">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong>{!! session('flash_message_success') !!}</strong>
</div>
@endif
<div class="section-wrapper mg-t-20">
<div class="col-lg-12 mg-t-20 mg-lg-t-0">
<div class="section-wrapper">
<label class="section-title">Update Information</label> <hr>

<form id="selectForm2" class="parsley-style-1" method="post" action="{{ url('/admin/update-profile') }}"  >
@csrf
<div class="form-layout form-layout-5">
<div class="row mg-t-20">
<div class="col-sm-3 mg-t-10 mg-sm-t-0">
<input type="text" name="name" class="form-control" value="{{Auth::user()->name}}"  placeholder="Enter username" required>
</div>

<div class="col-sm-7 mg-t-10 mg-sm-t-0">
<input name="address" class="form-control" placeholder="Address" value="{{Auth::user()->address}}">
</div>
<div class="col-sm-2 mg-t-10 mg-sm-t-0">
<button class="btn btn-primary  bd-0">Save</button>
</div>
</form>
</div><!-- row -->


</div><!-- form-layout -->
</div><!-- section-wrapper -->
</div><!-- col-6 -->
</div><!-- row -->
<div class="section-wrapper mg-t-20" style="padding-top: 0">
<form id="selectForm1" class="parsley-style-1" method="post" action="{{ url('/admin/update-dp') }}" enctype="multipart/form-data">
@csrf
<label class="section-title">Update Dispaly Photo</label>
<br>
<div class="d-flex align-items-center justify-content-center bg-gray-100 ht-md-80 bd pd-x-20">
<div  style="margin-right: 50px;">
<img src="{{ asset(Auth::user()->upic) }}"  style="width: 52px;border:1px #ffffff solid;">
</div>
<div class="d-md-flex pd-y-20 pd-md-y-0">

<input type="file" name="profile_photo" class="form-control" placeholder="Email address">
<button class="btn btn-primary pd-y-13 pd-x-20 bd-0 mg-md-l-10 mg-t-10 mg-md-t-0">Save</button>
</div>
</form>
</div><!-- d-flex -->
</div><!-- section-wrapper -->
<div class="section-wrapper mg-t-20" style="padding-top: 0">
<form id="selectForm2" class="parsley-style-1" method="post" action="{{ url('/admin/update-pwd') }}"  >
@csrf
<label class="section-title">Manage Password</label>
<br>
<div class="d-flex align-items-center justify-content-center bg-gray-100 ht-md-80 bd pd-x-20">
<div class="d-md-flex pd-y-20 pd-md-y-0">

<input type="password" name="current_pwd" id="current_pwd" class="form-control mg-md-l-10 mg-t-10 mg-md-t-0" placeholder="Currunt Password"> <span id="chkPwd"></span>
<input type="password" name="new_pwd" id="new_pwd" class="form-control mg-md-l-10 mg-t-10 mg-md-t-0" placeholder="New Password" >
<button class="btn btn-primary pd-y-13 pd-x-20 bd-0 mg-md-l-10 mg-t-10 mg-md-t-0">Update</button>
</div>
</form>
</div><!-- d-flex -->
</div><!-- section-wrapper -->
<div class="section-wrapper mg-t-20">
<div>
<div class="col-lg-12 mg-t-20 mg-lg-t-0">
<div class="section-wrapper">
<label class="section-title">Important Updates</label> <hr>

<form id="selectForm2" class="parsley-style-1" method="post" action="{{ url('/admin/update-username') }}"  >
@csrf
<div class="form-layout form-layout-5">
<div class="row mg-t-20">

<label class="col-sm-3 form-control-label"><span class="tx-danger">*</span> Username:</label>

<div class="col-sm-7 mg-t-10 mg-sm-t-0">
<input type="text" name="username" class="form-control" value="{{Auth::user()->username }}"  placeholder="Enter username" required>
</div>
<div class="col-sm-2 mg-t-10 mg-sm-t-0">
<button class="btn btn-primary  bd-0">Save</button>
</div>
</form>
</div><!-- row -->
<form id="selectForm2" class="parsley-style-1" method="post" action="{{ url('/admin/update-email') }}"  >
@csrf
<div class="form-layout form-layout-5">
<div class="row mg-t-20">
<label class="col-sm-3 form-control-label">Email: <span class="tx-danger">*</span></label>
<div class="col-sm-7 mg-t-10 mg-sm-t-0">
<input type="email" class="form-control" name="email" value="{{Auth::user()->email }}" placeholder="username" required>
</div>
<div class="col-sm-2 mg-t-10 mg-sm-t-0">
<button class="btn btn-primary  bd-0">Save</button>
</div>
</form>
</div> </div>
<div class="form-layout form-layout-5">
<form id="selectForm2" class="parsley-style-1" method="post" action="{{ url('/admin/update-mobile') }}"  >
@csrf  
<div class="row mg-t-20">
<label class="col-sm-3 form-control-label">Mobile No: <span class="tx-danger">*</span></label>
<div class="col-sm-7 mg-t-10 mg-sm-t-0">
<input type="number" class="form-control" name="mobile" value="{{Auth::user()->mobile}}" placeholder="Mobile Number" required>
</div>
<div class="col-sm-2 mg-t-10 mg-sm-t-0">
<button class="btn btn-primary  bd-0">Save</button>
</div>
</form>
</div>
<div class="row mg-t-20">

</div><!-- row -->

</div><!-- col-8 -->
</div>
</div><!-- form-layout -->
</div><!-- section-wrapper -->
</div><!-- col-6 -->
</div><!-- row -->
</div>
@endsection