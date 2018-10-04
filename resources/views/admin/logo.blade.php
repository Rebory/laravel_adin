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

<div class="section-wrapper mg-t-20" style="padding-top: 0">
<form id="selectForm1" class="parsley-style-1" method="post" action="{{ url('/admin/updatelogo') }}" enctype="multipart/form-data">
@csrf
<label class="section-title">Update Logo</label>
<br>
@if(is_null($logos))
        <p><span style="color: red">No logo Found !</span></p>
    @else 
@foreach ($logos as $log)
<img class="img img-responsive" src="{{asset($log->image)}}"  style="max-width: 280px;">
@endforeach

@endif
<div class="d-flex align-items-center justify-content-center bg-gray-100 ht-md-80 bd pd-x-20">
<div class="d-md-flex pd-y-20 pd-md-y-0">
<select class="form-control" data-placeholder="Choose size" name="size" required="">
                      <option label="Choose Size"></option>
                      <option value="small">Small</option>
                      <option value="medium">Medium</option>
                      <option value="large">Large</option>
                    </select>
<input type="file" name="image" class="form-control" required>
<button class="btn btn-primary pd-y-13 pd-x-20 bd-0 mg-md-l-10 mg-t-10 mg-md-t-0">Save</button>
</div>
</form>
</div><!-- d-flex -->
</div><!-- section-wrapper -->

</div>
@endsection