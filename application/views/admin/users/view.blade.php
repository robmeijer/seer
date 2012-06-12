@section('page_content')
@if (Session::has('flash'))
<div class="alert alert-block alert-{{ Session::get('flash_type') }}">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<h4 class="alert-heading">{{ strtoupper(Session::get('flash_type')) }}</h4>
	{{ Session::get('flash_msg') }}
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
		<td>{{ HTML::link('admin/users/edit', 'Edit profile', array('class' => 'btn btn-primary')) }}</td>
	</tr>
</tbody>
</table>
@endsection