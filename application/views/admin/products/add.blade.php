@section('page_content')
<div class="row-fluid">
	<div class="span12">
		{{ render('partials.flashmsg') }}
		
		<h1>Add Product</h1>
		<em>Please supply the following information.</em>
		<hr>
		{{ Form::open('admin/products/add', 'POST', array('class' => 'form-horizontal')) }}
		<div class="well">
			<div class="control-group">
				{{ Form::label('name', 'Name', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::text('name', Input::old('name'), array('placeholder' => 'Name')) }}
				</div>
			</div>
			<div class="control-group">
				{{ Form::label('short_description', 'Short description', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::textarea('short_description', Input::old('short_description'), array('placeholder' => 'Short description')) }}
				</div>
			</div>
		</div>
		{{ Form::hidden('category_id', $category_id) }}
		{{ Form::button('Save', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
		<a href="{{ URL::to_action('admin.categories@list') }}" class="btn" title="Cancel">Cancel</a>
		{{ Form::close() }}
	</div>
</div>
@endsection
