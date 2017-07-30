@extends('layouts.app')

@section('content')
	<div class="container">

		<h1>Manufacturers</h1>

		<div class="panel panel-default">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>No. Models</th>
						<th>No. Vehicles</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($manufacturers as $manufacturer)
						<tr>
							<td>{{ $manufacturer->id }}</td>
							<td>{{ $manufacturer->name }}</td>
							<td>{{ count($manufacturer->models) }}</td>
							<td>{{ $manufacturer->models->sum(function ($model) {
										return count($model['vehicles']);
							}) }}</td>
							<td><a href="{{ route('manufacturers.show', $manufacturer->id) }}">More Details</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</div>

	<div class="pagination-container">
		{{ $manufacturers->links() }}
	</div>

@endsection
