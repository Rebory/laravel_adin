@extends('layouts.adminlayout.admin_design')
@section('content')
<div class="slim-mainpanel">
<div class="container">
<div class="slim-pageheader">
<ol class="breadcrumb slim-breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
</ol>
<h6 class="slim-pagetitle">Add Category</h6>
</div>
<!-- slim-pageheader -->
<div class="section-wrapper ">
<div class="row">

<div class="col-sm-6">
@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-solid alert-danger divhide5">
{{ $error }}
</div>
@endforeach
@endif
<a class="btn btn-primary btn-sm pull-right" href="{{ route('categories.index') }}">back</a>
<label class="section-title">Add Post Category</label>

<form id="selectForm2" class="parsley-style-1" method="post" action="{{ route('categories.store') }}"  >
@csrf
<div class="form-group">
<label>Category: <span class="tx-danger">*</span></label>
<input type="text" name="catname" class="form-control " placeholder="eg: Political,Social" data-parsley-class-handler="#fnWrapper" required>
</div><!-- form-group -->

<div class="form-group">
<button type="submit" class="btn btn-primary">Save</button>
</div>

</form>
</div>


</div>
</div><!-- section-wrapper -->
</div>
<!-- container -->

@endsection