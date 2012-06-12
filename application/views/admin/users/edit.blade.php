@section('page_content')
@if (Session::has('flash'))
<div class="alert alert-block alert-{{ Session::get('flash_type') }}">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4 class="alert-heading">{{ strtoupper(Session::get('flash_type')) }}</h4>
	{{ Session::get('flash_msg') }}
</div>
@endif
<h1>Admin - Edit User</h1>
{{ Form::open('admin/users/edit', 'POST', array('class' => 'span6 well well-large form-horizontal')) }}
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