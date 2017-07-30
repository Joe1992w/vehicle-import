@extends('layouts.app')

@section('content')
	<div class="container">

		<h1>{{ $owner->name }}</h1>

		<div class="panel panel-default">
			<div class="panel-heading"><h4>Vehicles with this owner</h4></div>

			@include('_partials/vehicles/vehicles-table', compact('vehicles')) 
		</div>

	</div>
@endsection
