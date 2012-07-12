@section('page_content')
<div class="row-fluid">
	<div class="span12">
		{{ render('partials.flashmsg') }}
				
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
						<td>{{ HTML::link('admin/users/edit/' . $user->id, 'Edit profile', array('class' => 'btn btn-primary')) }}</td>
					</tr>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection