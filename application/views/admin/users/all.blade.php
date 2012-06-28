@section('page_content')
<div class="row-fluid">
	{{ render('partials.menu-users') }}
	<div class="span10">
		{{ render('partials.flashmsg') }}
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin.auth@login','Home') }} <span class="divider">/</span></li>
			<li class="active">Users</li>
		</ul>
		<div class="row-fluid">
			<div class="span12">
				<h1>User Management</h1>
				<em>Manage users, groups, and access rights.</em>
				<hr>
				<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>ID</th>
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
						<td>{{ $user->id }}</td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->firstname }}</td>
						<td>{{ $user->surname }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->role_id }}</td>
						<td>
							<div class="btn-group">
								<a href="{{ URL::to_action('admin.users@edit', array($user->id)) }}" class="btn btn-small" title="Edit user"><i class="icon-edit"></i></a>
								<a class="btn btn-danger" data-toggle="modal" data-id="{{$user->id}}" href="#del-confirmation" onclick="$('#user-id').val($(this).data('id'))" title="Delete user"><i class="icon-remove icon-white"></i></a>
							</div></td>
					</tr>
					@endforeach
				</tbody>
				</table>
				<div class="modal hide fade" id="del-confirmation">
					{{ Form::open('admin/users/delete') }}
					<input type="hidden" id="user-id" name="id" value="">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<h3>Delete Confirmation</h3>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete this user?</p>
					</div>
					<div class="modal-footer">
						{{ Form::button('Delete User', array('class' => 'btn btn-danger', 'type' => 'submit')) }}
						<a href="#" class="btn" data-dismiss="modal" title="Cancel">Cancel</a>
					</div>
					{{ Form::close() }}
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection