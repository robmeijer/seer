@section('page_content')
<div class="row-fluid">
	<div class="span12">
		{{ render('partials.flashmsg') }}
		
		<h1>Navigation Management</h1>
		<em>Manage navigation.</em>
		<a class="btn btn-primary pull-right" href="{{ URL::to_action('admin.menus@add') }}" title="Add Menu"><i class="icon-plus-sign icon-white"></i> Add Menu</a>
		<hr>
	</div>
</div>
@endsection