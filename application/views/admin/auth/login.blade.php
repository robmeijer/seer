@section('page_content')
@if (Session::has('flash'))
<div class="alert alert-block alert-{{ Session::get('flash_type') }}">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4 class="alert-heading">{{ strtoupper(Session::get('flash_type')) }}</h4>
	{{ Session::get('flash_msg') }}
</div>
@endif

<h1>Admin - Log In</h1>

{{ Form::open('admin/auth/login', 'POST', array('class' => 'offset2 span6 well well-large form-inline')) }}
	{{ Form::text('username', Input::old('username'), array('class' => 'span2', 'placeholder' => 'Username')) }}
	{{ Form::password('password', array('class' => 'span2', 'placeholder' => 'Password')) }}
	{{ Form::label('remember', 'Remember me', array('class' => 'checkbox')) }}
	{{ Form::checkbox('remember', 'remember', true) }}
	{{ Form::button('Log in', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
{{ Form::close(); }}
@endsection