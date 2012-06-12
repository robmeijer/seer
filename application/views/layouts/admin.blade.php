<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>{{ $page_title }}</title>

	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/navbar.css') }}
	{{ HTML::style('css/default.css') }}
	{{ HTML::style('css/bootstrap-responsive.css') }}
</head>
<body>
{{ render('partials.navbar') }}

<div class="container">
	@yield('page_content')
</div>

{{ HTML::script('js/jquery.js') }}
{{ HTML::script('js/bootstrap.js') }}
</body>
</html>