@section('page_content')
<div class="row-fluid">
	<div class="span12">
		{{ render('partials.flashmsg') }}
				
		<div class="row-fluid">
			<div class="span5">
				<h1>View category</h1>
				<table class="table table-striped">
				<tbody>
					<tr>
						<th>Name</th>
						<td>{{ $category->name }}</td>
					</tr>
					<tr>
						<th>Short description</th>
						<td>{{ $category->short_description }}</td>
					</tr>
					<tr>
						<th>Slug</th>
						<td>{{ $category->slug }}</td>
					</tr>
					<tr>
						<th></th>
						<td>{{ HTML::link('admin/categories/edit/' . $category->id, 'Edit category', array('class' => 'btn btn-primary')) }}</td>
					</tr>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection