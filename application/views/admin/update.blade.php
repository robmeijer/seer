@section('page_content')
@if (Session::has('login_errors'))
<div class="alert alert-block alert-error">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<h4 class="alert-heading">UPDATE FAILURE</h4>
	Current password doesn't match, or new passwords do not match.
</div>
@endif
<h1>Admin - Change Password</h1>
{{ Form::open('admin/update', 'POST', array('class' => 'span6 well well-large form-horizontal')) }}
<div class="control-group">
	{{ Form::label('current_password', 'Current password', array('class' => 'control-label')) }}
	<div class="controls">
		{{ Form::password('current_password', array('class' => 'span2', 'placeholder' => 'Current password')) }}
	</div>
</div>
<div class="control-group">
	{{ Form::label('new_password', 'New password', array('class' => 'control-label')) }}
	<div class="controls">
		{{ Form::password('new_password', array('class' => 'span2', 'placeholder' => 'New password')) }}
	</div>
</div>
<div class="control-group">
	{{ Form::label('confirm_password', 'Confirm new password', array('class' => 'control-label')) }}
	<div class="controls">
		{{ Form::password('confirm_password', array('class' => 'span2', 'placeholder' => 'Confirm new password')) }}
	</div>
</div>
<div class="control-group">
	<div class="controls">
		{{ Form::button('Change password', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
	</div>
</div>
{{ Form::close() }}
@endsection