@section('page_content')
<div class="row-fluid">
	<div class="span2 well well-small">
		@if (Auth::user()->role_id == 10)
		<ul class="nav nav-list">
			<li class="nav-header">Users</li>
			<li><a href="{{ URL::to_action('admin.users@all') }}">All users</a></li>
			<li><a href="{{ URL::to_action('admin.users@add') }}">Add user</a></li>
		</ul>
		@endif
		<ul class="nav nav-list">
			<li class="nav-header">Profile</li>
			<li class="active"><a href="{{ URL::to_action('admin.users@view') }}"><i class="icon-list-alt"></i> View profile</a></li>
			<li><a href="{{ URL::to_action('admin.users@password') }}"><i class="icon-lock"></i> Change password</a></li>
			<li class="divider"></li>
			<li><a href="{{ URL::to_action('admin.auth@logout') }}"><i class="icon-off"></i> Log out</a></li>
		</ul>
	</div>
	<div class="span10">
		@if (Session::has('flash'))
			<div class="alert alert-block alert-{{ Session::get('flash_type') }}">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<h4 class="alert-heading">{{ strtoupper(Session::get('flash_type')) }}</h4>
				{{ Session::get('flash_msg') }}
			</div>
		@endif
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin.auth@login','Home') }} <span class="divider">/</span></li>
			<li class="active">View profile</li>
		</ul>
		<div class="row-fluid">
			<div class="span6">
				<h1>Edit profile</h1>
				{{ Form::open('admin/users/edit', 'POST', array('class' => 'well well-large form-horizontal')) }}
				<div class="control-group">
					{{ Form::label('firstname', 'Firstname', array('class' => 'control-label')) }}
					<div class="controls">
						{{ Form::text('firstname',$user->firstname, array('placeholder' => 'Firstname')) }}
					</div>
				</div>
				<div class="control-group">
					{{ Form::label('surname', 'Surname', array('class' => 'control-label')) }}
					<div class="controls">
						{{ Form::text('surname',$user->surname, array('placeholder' => 'Surname')) }}
					</div>
				</div>
				<div class="control-group">
					{{ Form::label('email', 'Email', array('class' => 'control-label')) }}
					<div class="controls">
						{{ Form::text('email',$user->email, array('placeholder' => 'Email')) }}
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						{{ Form::button('Update profile', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
					</div>
				</div>
				{{ Form::hidden('id', $user->id) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@endsection