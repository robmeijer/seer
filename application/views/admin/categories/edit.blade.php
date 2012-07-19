@section('page_content')
<div class="row-fluid">
	<div class="span12">
		{{ render('partials.flashmsg') }}
		
		<h1>Update Category</h1>
		<em>Please update the following information.</em>
		<hr>
		{{ Form::open('admin/categories/edit', 'POST', array('class' => 'well well-large form-horizontal')) }}
		<div class="control-group">
			{{ Form::label('name', 'Name', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('name',$category->name, array('placeholder' => 'Name')) }}
			</div>
		</div>
		<div class="control-group">
			{{ Form::label('short_description', 'Short description', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::textarea('short_description',$category->short_description, array('placeholder' => 'Short description')) }}
			</div>
		</div>
				<div class="control-group">
			<div class="controls">
				{{ Form::button('Save Changes', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
				<a href="{{ URL::to_action('admin.categories@view', array($category->id)) }}" class="btn" title="Cancel">Cancel</a>
			</div>
		</div>
		{{ Form::hidden('id', $category->id) }}
		{{ Form::close() }}
	</div>
</div>
@endsection