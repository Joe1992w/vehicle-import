@extends('layouts.app')

@section('content')
	<div class="container">

		<h1>Transmissions</h1>

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
					@foreach ($transmissions as $transmission)
						<tr>
							<td>{{ $transmission->id }}</td>
							<td>{{ $transmission->name }}</td>
							<td><a href="{{ route('transmissions.show', $transmission->id) }}">More Details</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</div>

	<div class="pagination-container">
		{{ $transmissions->links() }}
	</div>

@endsection
