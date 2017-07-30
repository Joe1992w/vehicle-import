@extends('layouts.app')

@section('content')
	<div class="container">

		<h1>{{ $colour->name }}</h1>

		<div class="panel panel-default">
			<div class="panel-heading"><h4>Vehicles in this colour</h4></div>

			@include('_partials/vehicles/vehicles-table', compact('vehicles')) 
		</div>

	</div>
@endsection
