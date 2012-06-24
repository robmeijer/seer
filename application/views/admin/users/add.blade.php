@section('page_content')
<div class="row-fluid">
	<div class="span2 well well-small">
		<ul class="nav nav-list">
			<li class="nav-header">Users</li>
			<li><a href="{{ URL::to_action('admin.users@all') }}">View all users</a></li>
			<li class="active"><a href="{{ URL::to_action('admin.users@add') }}">Add user</a></li>
		</ul>
	</div>
	<div class="span10">
		
		@if (Session::has('flash'))
		<div class="alert alert-block alert-{{ Session::get('flash_type') }}">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4 class="alert-heading">{{ strtoupper(Session::get('flash_type')) }}</h4>
			{{ Session::get('flash_msg') }}
		</div>
		@endif

		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin.auth@login','Home') }} <span class="divider">/</span></li>
			<li>{{ HTML::link_to_action('admin.users@all','Users') }} <span class="divider">/</span></li>
			<li class="active">Add user</li>
		</ul>

		<h1>Add user</h1>
		{{ Form::open('admin/users/add', 'POST', array('class' => 'form-horizontal')) }}
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
		<div class="control-group">
			<div class="controls">
				{{ Form::button('Add user', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
			</div>
		</div>
		{{ Form::close() }}

	</div>
</div>
@endsection