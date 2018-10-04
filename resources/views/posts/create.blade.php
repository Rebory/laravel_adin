@extends('layouts.adminlayout.admin_design')
@section('content')
<div class="slim-mainpanel">
<div class="container">
<div class="slim-pageheader">
<ol class="breadcrumb slim-breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
</ol>
<h6 class="slim-pagetitle">New Post</h6>

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
<div class="col-sm-9">
<form id="selectForm2" class="parsley-style-1" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data" >
@csrf
<div class="form-group">
<label>Title <span class="tx-danger">*</span></label>
<input type="text" name="title" class="form-control " placeholder="Title" data-parsley-class-handler="#fnWrapper" required>
</div><!-- form-group -->

<div class="form-group">
<label>Post Body: <span class="tx-danger">*</span></label>
<textarea class="summernote"   name="description" ></textarea>
</div><!-- form-group -->



</div>

<div class="col-sm-3" style="background-color: #eeeeee; padding-top: 20px;">

<div class="form-group">
<label>Select Category: <span class="tx-danger">*</span></label>
<select class="form-control select2" data-placeholder="Choose Category" name="category" required>
   <option label="Choose Category"></option>
   @foreach($categories as $category)
    <option value="{{$category->catname}}">{{$category->catname}}</option>
    @endforeach
</select>
</div><!-- form-group -->


<div class="form-group">
<label>Post Photo: <span class="tx-danger">*</span></label>
<input type="file" name="image" class="form-control"  accept="image/*">
</div><!-- form-group -->

<div class="form-group">
<label>Publish: <span class="tx-danger">*</span></label>
<select class="form-control select2" data-placeholder="Publish" name="publish">
    <option value="Publish">Publish</option>
    <option value="Draft">Draft</option>
</select>
</div><!-- form-group -->

<div class="form-group">
<button type="submit" class="btn btn-primary btn-block">Publish</button>
<a class="btn btn-danger btn-block " href="{{ route('posts.index') }}">Cancel</a>
</div>
</form>
</div>


  
</div>
</div><!-- section-wrapper -->
</div>
<!-- container -->
<script type="text/javascript">
	$('.summernote').summernote({
  height: 400,   
  codemirror: { 
    theme: 'monokai'
  }
});
</script>
@endsection