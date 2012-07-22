@section('page_content')
<div class="row-fluid">
	<div class="span12">
		{{ render('partials.flashmsg') }}
		
		<h1>Update Product</h1>
		<em>Please update the following information.</em>
		<hr>
		{{ Form::open('admin/products/edit', 'POST', array('class' => 'well well-large form-horizontal')) }}
		<div class="control-group">
			{{ Form::label('name', 'Name', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('name',$product->name, array('placeholder' => 'Name')) }}
			</div>
		</div>
		<div class="control-group">
			{{ Form::label('short_description', 'Short description', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::textarea('short_description',$product->short_description, array('placeholder' => 'Short description')) }}
			</div>
		</div>
				<div class="control-group">
			<div class="controls">
				{{ Form::button('Save Changes', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
				<a href="{{ URL::to_action('admin.product@view', array($product->id)) }}" class="btn" title="Cancel">Cancel</a>
			</div>
		</div>
		{{ Form::hidden('id', $product->id) }}
		{{ Form::close() }}
	</div>
</div>
@endsection