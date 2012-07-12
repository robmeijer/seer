@section('page_content')
<div class="row-fluid">
	<div class="span12">
		{{ render('partials.flashmsg') }}
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin.auth@login','Home') }} <span class="divider">/</span></li>
			<li class="active">Categories</li>
		</ul>

		<h1>Category Management</h1>
		<em>Manage categories.</em>
		<a class="btn btn-primary pull-right" href="{{ URL::to_action('admin.categories@add') }}" title="Add Category"><i class="icon-plus-sign icon-white"></i> Add Category</a>
		<hr>
	</div>
</div>
@endsection