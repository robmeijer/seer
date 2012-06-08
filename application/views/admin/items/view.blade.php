@section('page_content')

<ul class="breadcrumb">
	<li><a href="/">Home</a> <span class="divider">/</span></li>
	<li><a href="/admin/items/all">Items</a> <span class="divider">/</span></li>
	<li class="active">{{ $item->name }}</li>
</ul>

<h1>Admin - Item</h1>
<table class="table table-striped table-bordered table-condensed">
<thead>
<tr>
	<th>ID</th>
	<th>NAME</th>
	<th>PRICE</th>
<tr>
</thead>
<tbody>
<tr>
	<td>{{ $item->id }}</td>
	<td>{{ $item->name }}</td>
	<td>{{ $item->price }}</td>
<tr>
</tbody>
</table>
@endsection