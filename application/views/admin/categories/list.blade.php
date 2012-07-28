@section('page_content')
<div class="row-fluid">
	<div class="span5">
		{{ render('partials.flashmsg') }}
		<h1>Categories</h1>
		<em>Manage categories.</em>
		<a class="btn btn-primary pull-right" href="{{ URL::to_action('admin.categories@add', array($id)) }}" title="Add Category"><i class="icon-plus-sign icon-white"></i> Add Category</a>
		<hr>
		<ul class="breadcrumb">
			@if ($id == 0)
			<li class="active">Top</li>
			@else
			<li><a href="{{ URL::to_action('admin.categories@list') }}" title="Top">Top</a> <span class="divider">></span></li>
			@foreach ($breadcrumbs as $breadcrumb)
			<li>
				<a href="{{ URL::to_action('admin.categories@list', array($breadcrumb['id'])) }}" title="{{ $breadcrumb['name'] }}">{{ $breadcrumb['name'] }}</a>
				<span class="divider">></span>
			</li>
			@endforeach
			<li class="active">{{ Category::find($id)->name }}</li>
			@endif
		</ul>
		
		<table class="table table-striped table-bordered">
		<tbody>
			@if (count($categories))
			@foreach ($categories as $category)
			<tr>
				<td>
					<a href="{{ URL::to_action('admin.categories@list', array($category->id)) }}" title="View category">{{ $category->name }}</a>
					<div id="cat-{{ $category->id }}" class="collapse">
						<hr>
						{{ $category->short_description }}
					</div>
				</td>
				<td>
					
					<div class="btn-group">
						<button type="button" class="btn" data-toggle="collapse" data-target="#cat-{{ $category->id }}">
							<i class="icon-question-sign"></i>
						</button>
						<a href="{{ URL::to_action('admin.categories@edit', array($category->id)) }}" class="btn btn-small" title="Edit category">
							<i class="icon-edit"></i>
						</a>
						<a class="btn btn-danger" data-toggle="modal" data-id="{{$category->id}}" href="#cat-del-confirmation" onclick="$('#category-id').val($(this).data('id'))" title="Delete category">
							<i class="icon-remove icon-white"></i>
						</a>
					</div></td>
			</tr>
			@endforeach
			@else
			<tr>
				<td colspan="2">No categories available.</td>
			</tr>
			@endif
		</tbody>
		</table>
		<div class="modal hide" id="cat-del-confirmation">
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

	<div class="span7">
		<h3>Products</h3>
		<em>Manage products in this category.</em>
		<a class="btn btn-primary pull-right" href="{{ URL::to_action('admin.products@add', array($id)) }}" title="Add Product"><i class="icon-plus-sign icon-white"></i> Add Product</a>
		<hr>
		<table class="table table-striped table-bordered">
		<tbody>
			@if (count($products))
			@foreach ($products as $product)
			<tr>
				<td>
					<a href="{{ URL::to_action('admin.products@view', array($product->id)) }}" title="View product">{{ $product->name }}</a>
				<div id="prod-{{ $product->id }}" class="collapse">
					<hr>
					{{ $product->short_description }}
				</div>
				</td>
				<td>
					<div class="btn-group">
						<button type="button" class="btn" data-toggle="collapse" data-target="#prod-{{ $product->id }}">
							<i class="icon-question-sign"></i>
						</button>
						<a href="{{ URL::to_action('admin.products@edit', array($product->id)) }}" class="btn btn-small" title="Edit product">
							<i class="icon-edit"></i>
						</a>
						<a class="btn btn-danger" data-toggle="modal" data-id="{{$product->id}}" href="#prod-del-confirmation" onclick="$('#product-id').val($(this).data('id'))" title="Delete product">
							<i class="icon-remove icon-white"></i>
						</a>
					</div></td>
			</tr>
			@endforeach
			@else
			<tr>
				<td colspan="2">No products available.</td>
			</tr>
			@endif
		</tbody>
		</table>
		<div class="modal hide" id="prod-del-confirmation">
			{{ Form::open('admin/products/delete') }}
			<input type="hidden" id="product-id" name="id" value="">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3>Delete Confirmation</h3>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this product?</p>
			</div>
			<div class="modal-footer">
				{{ Form::button('Delete Product', array('class' => 'btn btn-danger', 'type' => 'submit')) }}
				<a href="#" class="btn" data-dismiss="modal" title="Cancel">Cancel</a>
			</div>
			{{ Form::close() }}
		</div>
	</div>

</div>
@endsection