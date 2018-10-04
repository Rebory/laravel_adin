<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
<div class="container">
<div class="row">
<h1>First Query data</h1>
<div>
{{date('D,d-m-Y')}}
</div>
</div>
</div>
<hr>

					
<div class="container">
<h2>Latest Posts</h2>
<div class="row">
@foreach ($posts as $post)
<div class="col-sm-4 col-xs-12" style="padding-bottom: 30px;">
<h3><a target="_blank" href="{{$post->slug}}" title="{{$post->title}}"> {!! str_limit($post->title,28) !!}</a> </h3>
<img src="{{$post->image}}" class="img img-responsive"  style="overflow: hidden;">
<p>{!! str_limit($post->description,120) !!} <a target="_blank" href="{{$post->slug}}">read more...</a></p>
</div>
@endforeach
</div>

</div>
<!-- {!! str_limit($post->description,120) !!} -->

</body>
</html>