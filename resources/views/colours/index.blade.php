@extends('layouts.app')

@section('content')
	<div class="container">
		
		<h1>Colours</h1>

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
					@foreach ($colours as $colour)
						<tr>
							<td>{{ $colour->id }}</td>
							<td>{{ $colour->name }}</td>
							<td><a href="{{ route('colours.show', $colour->id) }}">More Details</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	<div class="pagination-container">
		{{ $colours->links() }}
	</div>
	
	</div>

@endsection
