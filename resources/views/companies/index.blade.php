@extends('layouts.app')

@section('content')
	<div class="container">

		<h1>Companies</h1>

		<div class="panel panel-default">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>No. Employees</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($companies as $company)
						<tr>
							<td>{{ $company->id }}</td>
							<td>{{ $company->name }}</td>
							<td>{{ count($company->employees) }}</td>
							<td><a href="{{ route('companies.show', $company->id) }}">More Details</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</div>

	<div class="pagination-container">
		{{ $companies->links() }}
	</div>
	
@endsection
