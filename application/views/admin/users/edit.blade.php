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
<h1>Admin - Edit User</h1>
{{ Form::open('admin/user/edit', 'POST', array('class' => 'span6 well well-large form-horizontal')) }}
<div class="control-group">
	{{ Form::label('firstname', 'Firstname', array('class' => 'control-label')) }}
	<div class="controls">
		{{ Form::text('firstname',Auth::user()->firstname, array('class' => 'span2', 'placeholder' => 'Firstname')) }}
	</div>
</div>
<div class="control-group">
	{{ Form::label('surname', 'Surname', array('class' => 'control-label')) }}
	<div class="controls">
		{{ Form::text('surname',Auth::user()->surname, array('class' => 'span2', 'placeholder' => 'Surname')) }}
	</div>
</div>
<div class="control-group">
	{{ Form::label('email', 'Email', array('class' => 'control-label')) }}
	<div class="controls">
		{{ Form::text('email',Auth::user()->email, array('class' => 'span2', 'placeholder' => 'Email')) }}
	</div>
</div>
<div class="control-group">
	<div class="controls">
		{{ Form::button('Update profile', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
	</div>
</div>
{{ Form::close() }}
@endsection