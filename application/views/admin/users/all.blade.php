@section('page_content')
<h1>Admin - Users</h1>
<table class="table table-striped table-bordered span6">
<thead>
	<tr>
		<th>USERNAME</th>
		<th>FIRSTNAME</th>
		<th>SURNAME</th>
		<th>EMAIL</th>
		<th>ROLE ID</th>
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
	</tr>
	@endforeach
</tbody>
</table>
@endsection