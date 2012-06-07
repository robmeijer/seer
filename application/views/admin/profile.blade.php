@section('page_content')
@if (Session::has('update_successful'))
<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<h4 class="alert-heading">SUCCESS</h4>
	You have changed your password successfully.
</div>
@endif
@if (Session::has('update_success'))
<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<h4 class="alert-heading">SUCCESS</h4>
	You have updated your profile successfully.
</div>
@endif
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
	<tr>
		<th>Role ID</th>
		<td>{{ Auth::user()->role_id }}</td>
	</tr>
	<tr>
		<th></th>
		<td>{{ HTML::link('admin/edit', 'Edit profile', array('class' => 'btn btn-primary')) }}</td>
	</tr>
</tbody>
</table>
@endsection