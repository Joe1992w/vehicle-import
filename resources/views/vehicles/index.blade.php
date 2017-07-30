@extends('layouts.app')

@section('content')
	<div class="container">

		<h1>Vehicles</h1>

		<div class="panel panel-default">
			<div class="panel-heading"><h4>Filter Vehicles</h4></div>
			<div class="panel-body">
				<form class="form">

					<div class="row">

						@foreach(['manufacturer', 'model', 'colour', 'transmission', 'type', 'fuel', 'owner'] as $filter)
							<div class="col-sm-6 col-md-4 col-lg-3">
								<div class="form-group">
									<label for="{{ $filter }}-filter">{{ ucfirst($filter) }}</label>
									<select name="{{ $filter }}" id="{{ $filter }}-filter" class="form-control">
										<option value="">All {{ ucfirst($filter) }}s</option>
										@foreach(${$filter.'s'} as ${$filter})
											<option value="{{ ${$filter}->id }}" @if(request($filter) == ${$filter}->id) selected @endif>{{ ${$filter}->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						@endforeach

					</div>

					<div class="row">
						<div class="col-xs-12">
							<button class="btn-primary btn" type="submit">Filter Vehicles</button>
						</div>
					</div>

				</form>
			</div>
		</div>		

		<div class="panel panel-default">
			@include('_partials/vehicles/vehicles-table', compact('vehicles'))
		</div>

	</div>

	<div class="pagination-container">
		{{ $vehicles->links() }}
	</div>

@endsection
