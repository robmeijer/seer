@section('page_content')
<div class="row-fluid">
	<div class="span12">
		{{ render('partials.flashmsg') }}
		
		<h1>Update User</h1>
		<em>Please update the following information.</em>
		<hr>
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
				{{ Form::button('Save Changes', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
				<a href="{{ URL::to_action('admin.users@view', array($user->id)) }}" class="btn" title="Cancel">Cancel</a>
			</div>
		</div>
		{{ Form::hidden('id', $user->id) }}
		{{ Form::close() }}
	</div>
</div>
@endsection