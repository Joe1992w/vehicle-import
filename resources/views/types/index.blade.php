@extends('layouts.app')

@section('content')

	<div class="container">

		<h1>Types</h1>

		<div class="panel panel-default">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($types as $type)
						<tr>
							<td>{{ $type->id }}</td>
							<td>{{ $type->name }}</td>
							<td><a href="{{ route('types.show', $type->id) }}">More Details</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="pagination-container">
		{{ $types->links() }}
	</div>

@endsection
