@section('page_content')
<div class="row-fluid">
	<div class="span12">
		{{ render('partials.flashmsg') }}
				
		<div class="row-fluid">
			<div class="span12">
				<h1>{{ $category->name }}</h1>
				{{ $category->short_description }}
			</div>
		</div>
	</div>
</div>
@endsection