@section('page_content')
<div class="row-fluid">
	<div class="span12">
		{{ render('partials.flashmsg') }}
		
		<h1>Add User</h1>
		<em>Please supply the following information.</em>
		<hr>
		{{ Form::open('admin/users/add', 'POST', array('class' => 'form-horizontal')) }}
		<div class="well">
			<div class="control-group">
				{{ Form::label('username', 'Username', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::text('username',Input::old('username'), array('placeholder' => 'Username')) }}
				</div>
			</div>
			<div class="control-group">
				{{ Form::label('password', 'Password', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::password('password', array('placeholder' => 'Password')) }}
				</div>
			</div>
			<div class="control-group">
				{{ Form::label('confirm_password', 'Confirm new password', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::password('confirm_password', array('placeholder' => 'Confirm password')) }}
				</div>
			</div>
			<div class="control-group">
				{{ Form::label('firstname', 'Firstname', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::text('firstname',Input::old('firstname'), array('placeholder' => 'Firstname')) }}
				</div>
			</div>
			<div class="control-group">
				{{ Form::label('surname', 'Surname', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::text('surname',Input::old('surname'), array('placeholder' => 'Surname')) }}
				</div>
			</div>
			<div class="control-group">
				{{ Form::label('email', 'Email', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::text('email',Input::old('email'), array('placeholder' => 'Email')) }}
				</div>
			</div>
			<div class="control-group">
				{{ Form::label('role_id', 'Role', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::select('role_id', array('1' => 'User', '10' => 'Admin')); }}
				</div>
			</div>
		</div>
		{{ Form::button('Save', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
		<a href="{{ URL::to_action('admin.users@all') }}" class="btn" title="Cancel">Cancel</a>
		{{ Form::close() }}
	</div>
</div>
@endsection
