@extends('layouts.app')

@section('content')
	<div class="container">

		<h1>Owners</h1>

		<div class="panel panel-default">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Company</th>
						<th>Profession</th>
						<th>No. Vehicles</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($owners as $owner)
						<tr>
							<td>{{ $owner->id }}</td>
							<td>{{ $owner->name }}</td>
							<td>{{ $owner->company->name }}</td>
							<td>{{ $owner->profession }}</td>
							<td>{{ count($owner->vehicles) }}</td>
							<td><a href="{{ route('owners.show', $owner->id) }}">More Details</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</div>

	<div class="pagination-container">
		{{ $owners->links() }}
	</div>

@endsection
