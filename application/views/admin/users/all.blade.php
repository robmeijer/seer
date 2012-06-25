@section('page_content')
<div class="row-fluid">
	{{ render('partials.menu-users') }}
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