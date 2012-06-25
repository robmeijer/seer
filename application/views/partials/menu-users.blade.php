<div class="span2 well well-small">
	@if (Auth::user()->role_id == 10)
	<ul class="nav nav-list">
		<li class="nav-header">Users</li>
		<li><a href="{{ URL::to_action('admin.users@all') }}"><i class="icon-user"></i> All users</a></li>
		<li><a href="{{ URL::to_action('admin.users@add') }}"><i class="icon-plus-sign"></i> Add user</a></li>
	</ul>
	@endif
	<ul class="nav nav-list">
		<li class="nav-header">Profile</li>
		<li><a href="{{ URL::to_action('admin.users@view') }}"><i class="icon-list-alt"></i> View profile</a></li>
		<li><a href="{{ URL::to_action('admin.users@password') }}"><i class="icon-lock"></i> Change password</a></li>
		<li class="divider"></li>
		<li><a href="{{ URL::to_action('admin.auth@logout') }}"><i class="icon-off"></i> Log out</a></li>
	</ul>
</div>