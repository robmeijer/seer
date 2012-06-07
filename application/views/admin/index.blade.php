@section('page_content')
@if (Session::has('login_successful'))
<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<h4 class="alert-heading">SUCCESS</h4>
	You have logged in successfully.
</div>
@endif

<h1>Admin</h1>

<p>This view has been auto-generated to accompany the Admin_Controller's get_index()</p>
@endsection