<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="brand" href="/">Seer</a>
			<ul class="nav">
				<li><a href="{{ URL::to_action('admin.dashboard@index') }}" title="Dashboard">Dashboard</a></li>
				<li class="dropdown">
					<a href="#"
						class="dropdown-toggle"
						data-toggle="dropdown">
						Catalogue
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::to_action('admin.categories@list') }}" title="Attributes">Attributes</a></li>
						<li><a href="{{ URL::to_action('admin.categories@list') }}" title="Categories">Categories</a></li>
						<li><a href="{{ URL::to_action('admin.categories@list') }}" title="Products">Products</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#"
						class="dropdown-toggle"
						data-toggle="dropdown">
						Design
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::to_action('admin.categories@list') }}" title="Layouts">Layouts</a></li>
						<li><a href="{{ URL::to_action('admin.categories@list') }}" title="Navigation">Navigation</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#"
						class="dropdown-toggle"
						data-toggle="dropdown">
						Reports
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::to_action('admin.categories@list') }}" title="Sales">Sales</a></li>
					</ul>
				</li>
				@if (Auth::user()->role_id == 10)
				<li class="dropdown">
					<a href="#"
						class="dropdown-toggle"
						data-toggle="dropdown">
						System
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::to_action('admin.users@all') }}" title="Settings">Settings</a></li>
						<li><a href="{{ URL::to_action('admin.users@all') }}" title="Users">Users</a></li>
					</ul>
				</li>
				@endif
			</ul>
			@if (Auth::check())
			<div class="btn-group pull-right">
				<a href="#" data-toggle="dropdown" class="btn dropdown-toggle">
					<i class="icon-user"></i> {{ Auth::user()->firstname.' '.Auth::user()->surname }}
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="{{ URL::to_action('admin.users@view') }}" title="View Profile"><i class="icon-list-alt"></i> View profile</a></li>
					<li><a href="{{ URL::to_action('admin.users@password') }}" title="Change Password"><i class="icon-lock"></i> Change password</a></li>
					<li class="divider"></li>
					<li><a href="{{ URL::to_action('admin.auth@logout') }}" title="Log Out"><i class="icon-off"></i> Log out</a></li>
				</ul>
			</div>
			@else
			<p class="navbar-text pull-right">{{ HTML::link_to_action('admin.auth@login', 'You are not logged in') }}</p>
			@endif
		</div>
	</div>
</div>