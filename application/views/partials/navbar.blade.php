<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="brand" href="/">Seer</a>
			<ul class="nav">
				<li class="dropdown">
					<a href="#"
						class="dropdown-toggle"
						data-toggle="dropdown">
						Items
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::to_action('admin.items@all') }}" title="All items">All items</a></li>
					</ul>
				</li>
			</ul>
			@if (Auth::user()->role_id == 10)
			<ul class="nav">
				<li class="dropdown">
					<a href="#"
						class="dropdown-toggle"
						data-toggle="dropdown">
						Admin
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::to_action('admin.users@add') }}" title="Add User">Add User</a></li>
						<li><a href="{{ URL::to_action('admin.users@all') }}" title="All Users">View All Users</a></li>
					</ul>
				</li>
			</ul>
			@endif
			@if (Auth::check())
			<div class="btn-group pull-right">
				<a href="#" data-toggle="dropdown" class="btn dropdown-toggle">
					<i class="icon-user"></i> {{ Auth::user()->firstname.' '.Auth::user()->surname }}
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="{{ URL::to_action('admin.users@view') }}" title="View Profile"><i class="icon-list-alt"></i> View Profile</a></li>
					<li><a href="{{ URL::to_action('admin.users@password') }}" title="Change Password"><i class="icon-lock"></i> Change Password</a></li>
					<li class="divider"></li>
					<li><a href="{{ URL::to_action('admin.auth@logout') }}" title="Log Out"><i class="icon-off"></i> Log Out</a></li>
				</ul>
			</div>
			@else
			<p class="navbar-text pull-right">{{ HTML::link_to_action('admin.auth@login', 'You are not logged in') }}</p>
			@endif
		</div>
	</div>
</div>