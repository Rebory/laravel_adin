@extends('layouts.adminlayout.admin_design')
@section('content')
<div class="slim-mainpanel">
<div class="container">
<div class="slim-pageheader">
<ol class="breadcrumb slim-breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
</ol>
<h6 class="slim-pagetitle">Manage Category</h6>
</div>
<!-- slim-pageheader -->
<div class="section-wrapper ">
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
<table class="table table-bordered table-hover">
<tr>
<a class="btn btn-primary btn-sm pull-right" href="{{ route('categories.create') }}">Add New</a>
<th>Name</th>
<th width="280px">Action</th>
</tr>
@foreach ($categories as $category)
<tr>

<td>{{ $category->catname }}</td>
<td>
<form action="{{ route('categories.destroy', $category->id) }}" method="POST">
<a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $category->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger btn-sm">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>

</div>
</div>
</div>
</div>
@endsection