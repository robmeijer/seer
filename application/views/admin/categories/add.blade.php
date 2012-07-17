@section('page_content')
<div class="row-fluid">
	<div class="span12">
		{{ render('partials.flashmsg') }}
		
		<h1>Add Category</h1>
		<em>Please supply the following information.</em>
		<hr>
		{{ Form::open('admin/categories/add', 'POST', array('class' => 'form-horizontal')) }}
		<div class="well">
			<div class="control-group">
				{{ Form::label('name', 'Name', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::text('name', Input::old('name'), array('placeholder' => 'Name')) }}
				</div>
			</div>
			<div class="control-group">
				{{ Form::label('description', 'Description', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::textarea('description', Input::old('description'), array('placeholder' => 'Description')) }}
				</div>
			</div>
		</div>
		{{ Form::button('Save', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
		<a href="{{ URL::to_action('admin.categories@all') }}" class="btn" title="Cancel">Cancel</a>
		{{ Form::close() }}
	</div>
</div>
@endsection
