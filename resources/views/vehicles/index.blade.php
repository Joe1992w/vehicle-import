@extends('layouts.app')

@section('content')
	<div class="container">

		<h1>Vehicles</h1>

		<div class="panel panel-default">
			@include('_partials/vehicles/vehicles-table', compact('vehicles'))
		</div>

	</div>

	<div class="pagination-container">
		{{ $vehicles->links() }}
	</div>

@endsection
