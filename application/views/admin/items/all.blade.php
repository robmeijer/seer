@section('page_content')

<ul class="breadcrumb">
	<li><a href="/admin">Home</a> <span class="divider">/</span></li>
	<li class="active">All items</li>
</ul>

<h1>Admin - Items</h1>
{{ $items->links() }}
<table class="table table-striped table-bordered table-condensed">
<thead>
<tr>
	<th>ID</th>
	<th>NAME</th>
	<th>PRICE</th>
<tr>
</thead>
<tbody>
@foreach ($items->results as $item)
<tr style="
@if ($item->status == 0)
color: #CCC;
font-style: italic
@endif
;">
	<td>{{ $item->id }}</td>
	<td>{{ HTML::link_to_action('admin.items@view', $item->name, array($item->id)) }}</td>
	<td>{{ $item->price }}</td>
<tr>
@endforeach
</tbody>
</table>
{{ $items->links() }}
@endsection
