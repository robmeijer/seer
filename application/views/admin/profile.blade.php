@section('page_content')
<h1>Admin - Profile</h1>
<table class="table table-striped table-bordered table-condensed span6">
<tbody>
	<tr>
		<th>Username</th>
		<td>{{ Auth::user()->username }}</td>
	</tr>
	<tr>
		<th>Firstname</th>
		<td>{{ Auth::user()->firstname }}</td>
	</tr>
	<tr>
		<th>Surname</th>
		<td>{{ Auth::user()->surname }}</td>
	</tr>
	<tr>
		<th>Email</th>
		<td>{{ Auth::user()->email }}</td>
	</tr>
</tbody>
</table>
@endsection