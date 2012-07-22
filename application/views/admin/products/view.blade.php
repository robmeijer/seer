@section('page_content')
<div class="row-fluid">
	<div class="span12">
		{{ render('partials.flashmsg') }}
				
		<div class="row-fluid">
			<div class="span5">
				<h1>View product</h1>
				<table class="table table-striped">
				<tbody>
					<tr>
						<th>Name</th>
						<td>{{ $product->name }}</td>
					</tr>
					<tr>
						<th>Short description</th>
						<td>{{ $product->short_description }}</td>
					</tr>
					<tr>
						<th>Slug</th>
						<td>{{ $product->slug }}</td>
					</tr>
					<tr>
						<th></th>
						<td>{{ HTML::link('admin/products/edit/' . $product->id, 'Edit product', array('class' => 'btn btn-primary')) }}</td>
					</tr>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection