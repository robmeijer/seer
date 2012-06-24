@section('page_content')
<div class="row-fluid">
	<div class="span2 well well-small">
		<ul class="nav nav-list">
		  <li class="nav-header">
		    List header
		  </li>
		  <li class="active">
		    <a href="#">Home</a>
		  </li>
		  <li>
		    <a href="#">Library</a>
		  </li>
		  ...
		</ul>
	</div>
	<div class="span10">
		<h1>Dashboard</h1>
		<p>This view has been auto-generated to accompany the Dashboard_Controller's get_index()</p>
		<p>{{ HTML::link_to_action('admin.auth@login','Go to Admin') }}</p>
	</div>
</div>
@endsection