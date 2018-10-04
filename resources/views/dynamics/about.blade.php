@extends('layouts.adminlayout.admin_design')
@section('content')
<div class="slim-mainpanel">
<div class="container">
<div class="slim-pageheader">
<ol class="breadcrumb slim-breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
</ol>
<h6 class="slim-pagetitle">Edit about us</h6>

</div>
<!-- slim-pageheader -->
<div class="section-wrapper">
  @if ($errors->any())
<div class="alert alert-solid alert-danger divhide5">
@foreach ($errors->all() as $error)
{{ $error }}
@endforeach
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
<div class="row">
<div class="col-sm-12">

<form id="selectForm2" class="parsley-style-1" method="post" action="{{ url('/admin/about-update') }}"  >
@csrf  

@foreach ($dynamics as $dynamic)


<div class="form-group">
<label>About Us: <span class="tx-danger">*</span></label>
<textarea class="form-control" rows="12" name="aboutus" >{{ $dynamic->aboutus }}</textarea>
</div><!-- form-group -->
@endforeach

<div class="form-group">
<button type="submit" class="btn btn-primary pull-right">Save</button>
</div>
</form>
</div>


  
</div>
</div><!-- section-wrapper -->
</div>
<!-- container -->

@endsection