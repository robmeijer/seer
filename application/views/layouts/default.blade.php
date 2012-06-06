<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>{{ $page_title }}</title>

	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/default.css') }}
	{{ HTML::style('css/bootstrap-responsive.css') }}
</head>
<body>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="/">WorldStores</a>
			<ul class="nav">
				<li><a href="/admin">Admin</a></li>
			</ul>
			@if (Auth::check())
			<div class="btn-group pull-right">
				<a href="#" data-toggle="dropdown" class="btn dropdown-toggle">
					<i class="icon-user"></i> {{ Auth::user()->firstname.' '.Auth::user()->surname }}
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="{{ URL::to_action('admin@profile') }}" title="View Profile"><i class="icon-list-alt"></i> View Profile</a></li>
					<li><a href="{{ URL::to_action('admin@profile') }}" title="Change Password"><i class="icon-lock"></i> Change Password</a></li>
					<li class="divider"></li>
					<li><a href="{{ URL::to_action('admin@logout') }}" title="Log Out"><i class="icon-off"></i> Log Out</a></li>
				</ul>
			</div>
			@else
			<p class="navbar-text pull-right">You are not logged in</p>
			@endif
		</div>
	</div>
</div>
<div class="container">
	@yield('page_content')
</div>
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/bootstrap.js') }}
</body>
</html>