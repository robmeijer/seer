<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>{{ $page_title }}</title>

	{{ HTML::style('css/bootstrap.css') }}
	@if (Auth::check())
	{{ HTML::style('css/navbar.css') }}
	@endif
	{{ HTML::style('css/default.css') }}
	{{ HTML::style('css/bootstrap-responsive.css') }}
</head>
<body>
@if (Auth::check())
{{ render('partials.navbar') }}
@endif

<div class="container-fluid">
	@yield('page_content')
</div>

{{ HTML::script('js/jquery.js') }}
{{ HTML::script('js/bootstrap.js') }}
</body>
</html>