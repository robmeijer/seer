@if (Session::has('flash'))
<div class="alert alert-block alert-{{ Session::get('flash_type') }}">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4 class="alert-heading">{{ strtoupper(Session::get('flash_type')) }}</h4>
	{{ Session::get('flash_msg') }}
</div>
@endif