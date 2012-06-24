@section('page_content')
<div class="row-fluid">
	<div class="span2 well well-small">
		@if (Auth::check())
		<ul class="nav nav-list">
			<li class="nav-header">Users</li>
			<li class="active"><a href="{{ URL::to_action('admin.users@all') }}"><i class="icon-user"></i> All users</a></li>
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
	<div class="span10">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin.auth@login','Home') }} <span class="divider">/</span></li>
			<li class="active">Users</li>
		</ul>
		<div class="row-fluid">
			<div class="span12">
				<h1>All users</h1>
				<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>USERNAME</th>
						<th>FIRSTNAME</th>
						<th>SURNAME</th>
						<th>EMAIL</th>
						<th>ROLE ID</th>
						<th>ACTIONS</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
					<tr>
						<td>{{ $user->username }}</td>
						<td>{{ $user->firstname }}</td>
						<td>{{ $user->surname }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->role_id }}</td>
						<td>
							<div class="btn-group">
								<a href="{{ URL::to_action('admin.users@edit', array($user->id)) }}" class="btn btn-primary" title="Edit user"><i class="icon-edit icon-white"></i></a>
								<button class="btn btn-danger"><i class="icon-remove icon-white"></i></button>
							</div></td>
					</tr>
					@endforeach
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection