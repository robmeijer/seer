@section('page_content')
@if (Session::has('login_errors'))
<div class="alert alert-block alert-error">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<h4 class="alert-heading">LOGIN FAILURE</h4>
	Username or password incorrect.
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