@section('page_content')
@if (Session::has('create_errors'))
<div class="alert alert-block alert-error">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<h4 class="alert-heading">CREATE FAILURE</h4>
	Failed to create new user - passwords do not match.
</div>
@endif
@if (Session::has('create_success'))
<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<h4 class="alert-heading">CREATE SUCCESS</h4>
	New user successfully created.
</div>
@endif
<h1>Admin - Create User</h1>
{{ Form::open('admin/create', 'POST', array('class' => 'span6 well well-large form-horizontal')) }}
<div class="control-group">
	{{ Form::label('username', 'Username', array('class' => 'control-label')) }}
	<div class="controls">
		{{ Form::text('username',Input::old('username'), array('class' => 'span2', 'placeholder' => 'Username')) }}
	</div>
</div>
<div class="control-group">
	{{ Form::label('password', 'Password', array('class' => 'control-label')) }}
	<div class="controls">
		{{ Form::password('password', array('class' => 'span2', 'placeholder' => 'Password')) }}
	</div>
</div>
<div class="control-group">
	{{ Form::label('confirm_password', 'Confirm new password', array('class' => 'control-label')) }}
	<div class="controls">
		{{ Form::password('confirm_password', array('class' => 'span2', 'placeholder' => 'Confirm password')) }}
	</div>
</div>
<div class="control-group">
	{{ Form::label('firstname', 'Firstname', array('class' => 'control-label')) }}
	<div class="controls">
		{{ Form::text('firstname',Input::old('firstname'), array('class' => 'span2', 'placeholder' => 'Firstname')) }}
	</div>
</div>
<div class="control-group">
	{{ Form::label('surname', 'Surname', array('class' => 'control-label')) }}
	<div class="controls">
		{{ Form::text('surname',Input::old('surname'), array('class' => 'span2', 'placeholder' => 'Surname')) }}
	</div>
</div>
<div class="control-group">
	{{ Form::label('email', 'Email', array('class' => 'control-label')) }}
	<div class="controls">
		{{ Form::text('email',Input::old('email'), array('class' => 'span2', 'placeholder' => 'Email')) }}
	</div>
</div>
<div class="control-group">
	{{ Form::label('role_id', 'Role', array('class' => 'control-label')) }}
	<div class="controls">
		{{ Form::select('role_id', array('1' => 'User', '10' => 'Admin')); }}
	</div>
</div>
<div class="control-group">
	<div class="controls">
		{{ Form::button('Create user', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
	</div>
</div>
{{ Form::close() }}
@endsection