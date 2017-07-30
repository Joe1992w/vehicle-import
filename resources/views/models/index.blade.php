@extends('layouts.app')

@section('content')
	<div class="container">

		<h1>Models</h1>

		<div class="panel panel-default">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>No. Vehicles</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($models as $model)
						<tr>
							<td>{{ $model->id }}</td>
							<td>{{ $model->name }}</td>
							<td>{{ count($model->vehicles) }}</td>
							<td><a href="{{ route('models.show', $model->id) }}">More Details</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</div>

	<div class="pagination-container">
		{{ $models->links() }}
	</div>

@endsection
