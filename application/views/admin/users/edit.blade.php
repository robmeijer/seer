@section('page_content')
<div class="row-fluid">
	{{ render('partials.menu-users') }}
	<div class="span10">
		{{ render('partials.flashmsg') }}
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