@section('page_content')
<div class="row-fluid">
	<div class="span12">
		{{ render('partials.flashmsg') }}
		
		<h1>Category Management</h1>
		<em>Manage categories.</em>
		<a class="btn btn-primary pull-right" href="{{ URL::to_action('admin.categories@add', array($parent)) }}" title="Add Category"><i class="icon-plus-sign icon-white"></i> Add Category</a>
		<hr>
		@if (count($categories))
		<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>NAME</th>
				<th>SHORT DESCRIPTION</th>
				<th>SLUG</th>
				<th>ACTIONS</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($categories as $category)
			<tr>
				<td>{{ $category->id }}</td>
				<td><a href="{{ URL::to_action('admin.categories@list', array($category->id)) }}" title="View category">{{ $category->name }}</a> (<a href="{{ URL::to_action('frontend.categories@view', array($category->slug)) }}" title="View in frontend">View in frontend</a>)</td>
				<td>{{ $category->short_description }}</td>
				<td>{{ $category->slug }}</td>
				<td>
					<div class="btn-group">
						<a href="{{ URL::to_action('admin.categories@edit', array($category->id)) }}" class="btn btn-small" title="Edit category"><i class="icon-edit"></i></a>
						<a class="btn btn-danger" data-toggle="modal" data-id="{{$category->id}}" href="#del-confirmation" onclick="$('#category-id').val($(this).data('id'))" title="Delete category"><i class="icon-remove icon-white"></i></a>
					</div></td>
			</tr>
			@endforeach
		</tbody>
		</table>
		@else
			<p>There are no sub-categories. <a href="{{ URL::to_action('admin.categories@list') }}" title="Top categories">Back to top.</a> | <a href="{{ URL::to_action('admin.categories@list', array($grandparent)) }}" title="Top categories">Back to parent.</a></p>
		@endif
		<div class="modal hide" id="del-confirmation">
			{{ Form::open('admin/categories/delete') }}
			<input type="hidden" id="category-id" name="id" value="">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3>Delete Confirmation</h3>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this category?</p>
			</div>
			<div class="modal-footer">
				{{ Form::button('Delete Category', array('class' => 'btn btn-danger', 'type' => 'submit')) }}
				<a href="#" class="btn" data-dismiss="modal" title="Cancel">Cancel</a>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection