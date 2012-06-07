<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>{{ $page_title }}</title>

	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/bootstrap-responsive.css') }}
</head>
<body>
<div class="container">
	@yield('page_content')
	@if(Auth::check())
		{{ HTML::link_to_action('admin@index', 'Go to Admin') }}
	@else
		{{ HTML::link_to_action('admin@login', 'Go to Login') }}
	@endif

</div>
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/bootstrap.js') }}
</body>
</html>