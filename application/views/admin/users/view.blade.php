@section('page_content')
<div class="row-fluid">
	<div class="span2 well well-small">
		@if (Auth::user()->role_id == 10)
		<ul class="nav nav-list">
			<li class="nav-header">Users</li>
			<li><a href="{{ URL::to_action('admin.users@all') }}">All users</a></li>
			<li><a href="{{ URL::to_action('admin.users@add') }}">Add user</a></li>
		</ul>
		@endif
		<ul class="nav nav-list">
			<li class="nav-header">Profile</li>
			<li class="active"><a href="{{ URL::to_action('admin.users@view') }}"><i class="icon-list-alt"></i> View profile</a></li>
			<li><a href="{{ URL::to_action('admin.users@password') }}"><i class="icon-lock"></i> Change password</a></li>
			<li class="divider"></li>
			<li><a href="{{ URL::to_action('admin.auth@logout') }}"><i class="icon-off"></i> Log out</a></li>
		</ul>
	</div>
	<div class="span10">
		@if (Session::has('flash'))
			<div class="alert alert-block alert-{{ Session::get('flash_type') }}">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<h4 class="alert-heading">{{ strtoupper(Session::get('flash_type')) }}</h4>
				{{ Session::get('flash_msg') }}
			</div>
		@endif
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin.auth@login','Home') }} <span class="divider">/</span></li>
			<li class="active">View profile</li>
		</ul>
		<div class="row-fluid">
			<div class="span5">
				<h1>View profile</h1>
				<table class="table table-striped">
				<tbody>
					<tr>
						<th>Username</th>
						<td>{{ $user->username }}</td>
					</tr>
					<tr>
						<th>Firstname</th>
						<td>{{ $user->firstname }}</td>
					</tr>
					<tr>
						<th>Surname</th>
						<td>{{ $user->surname }}</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>{{ $user->email }}</td>
					</tr>
					<tr>
						<th>Role ID</th>
						<td>{{ $user->role_id }}</td>
					</tr>
					<tr>
						<th></th>
						<td>{{ HTML::link('admin/users/edit', 'Edit profile', array('class' => 'btn btn-primary')) }}</td>
					</tr>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>



@endsection