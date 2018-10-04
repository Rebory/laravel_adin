@extends('layouts.adminlayout.admin_design')
@section('content')
<div class="slim-mainpanel">
<div class="container">
<div class="slim-pageheader">
<ol class="breadcrumb slim-breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
</ol>
<h6 class="slim-pagetitle">All Posts</h6>
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
<table class="table table-responsive table-bordered table-hover">
<a class="btn btn-primary btn-sm pull-right" href="{{ route('posts.create') }}">Add New</a>

<tr>
<th>Id</th>
<th>Title</th>
<th>Description</th>
<th>Image</th>
<th>Slug</th>
<th>Category</th>
<th>Status</th>
<th width="120px">Action</th>
</tr>
@foreach ($posts as $post)
<tr>

<td>{{ ++$i }}</td>
<td>{{ $post->title }}</td>
<td>{{ str_limit($post->description, 50) }}</td>
<td><img src="{{ asset($post->image) }}" style="width: 62px;"></td>
<td>{{ $post->slug }}</td>
<td>{{ $post->category }}</td>
<td>{{ $post->publish }}</td>
<td>
<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
<a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a>
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
{!! $posts->links() !!}
</div>
</div>


@endsection