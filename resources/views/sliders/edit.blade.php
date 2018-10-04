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
<label class="section-title">Important Updates</label> <hr>

<form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
<div class="form-layout form-layout-5">
<div class="row mg-t-20">
	<div class="col-sm-12">
<img src="{{ asset($slider->banner) }}" style="width: 180px;">
</div>
</div>

<div class="row mg-t-20">
<label class="col-sm-3 form-control-label"><span class="tx-danger">*</span> Choose Banner:</label>

<div class="col-sm-9 mg-t-10 mg-sm-t-0">
<input type="hidden" name="oldphotourl" value="{{ $slider->banner }}">
<input type="file" name="banner" class="form-control"  accept="image/*" >
</div>

</div><!-- row -->

<div class="form-layout form-layout-5">
<div class="row mg-t-20">
<label class="col-sm-3 form-control-label">Text 1: <span class="tx-danger">*</span></label>
<div class="col-sm-9 mg-t-10 mg-sm-t-0">
<input type="text" class="form-control" name="txt1" value="{{ $slider->txt1 }}" >
</div>
</div>
 </div>

<div class="form-layout form-layout-5">
<div class="row mg-t-20">
<label class="col-sm-3 form-control-label">Text 2: <span class="tx-danger">*</span></label>
<div class="col-sm-9 mg-t-10 mg-sm-t-0">
<input type="text" class="form-control" name="txt2" value="{{ $slider->txt2 }}"  >
</div>
</div>
 </div>

<div class="form-layout form-layout-5">
<div class="row mg-t-20">
<label class="col-sm-3 form-control-label">Text 3: <span class="tx-danger">*</span></label>
<div class="col-sm-9 mg-t-10 mg-sm-t-0">
<input type="text" class="form-control" name="txt3" value="{{ $slider->txt3 }}"  >
</div>
</div>
 </div>

 <div class="form-layout form-layout-5">
<div class="row mg-t-20">
<label class="col-sm-3 form-control-label">Text 4: <span class="tx-danger">*</span></label>
<div class="col-sm-9 mg-t-10 mg-sm-t-0">
<input type="text" class="form-control" name="txt4" value="{{ $slider->txt4 }}"  >
</div>
</div>
 </div>

 <div class="form-layout form-layout-5">
<div class="row mg-t-20">
<label class="col-sm-3 form-control-label">Text 5: <span class="tx-danger">*</span></label>
<div class="col-sm-9 mg-t-10 mg-sm-t-0">
<input type="text" class="form-control" name="txt5" value="{{ $slider->txt5 }}"  >
</div>
</div>
 </div>

<div class="row mg-t-20">
<div class="col-sm-12 mg-t-10 mg-sm-t-0">
<button class="btn btn-primary  bd-0 pull-right">Save</button>
</div>
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