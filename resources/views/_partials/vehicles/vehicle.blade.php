<div class="vehicle">

	<div class="row">
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Model</h4></div>
				<div class="panel-body">
					{{ $vehicle->model->name }}
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Manufacturer</h4></div>
				<div class="panel-body">
					{{ $vehicle->manufacturer->name }}
				</div>
			</div>
		</div>
	</div>

	<div class="row">		
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Specification</h4></div>
				<div class="panel-body">
					<ul class="list-unstyled">
						<li>
							<span>Vehicle Type</span>
							{{ $vehicle->type->name }}	
						</li>
						<li>
							<span>Colour</span>
							{{ $vehicle->colour->name }}	
						</li>
						<li>
							<span>Transmission</span>
							{{ $vehicle->transmission->name }}	
						</li>
						<li>
							<span>Fuel Type</span>
							{{ $vehicle->fuelType->name }}	
						</li>
						<li>
							<span>License Plate</span>
							{{ $vehicle->license_plate }}	
						</li>
						<li>
							<span>Weight Category</span>
							{{ $vehicle->weight_category }}	
						</li>
						<li>
							<span>No. Seats</span>
							{{ $vehicle->seats }}	
						</li>
						<li>
							<span>No. Doors</span>
							{{ $vehicle->doors }}
						</li>
						<li>
							<span>No. Wheels</span>
							{{ $vehicle->wheels }}
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Owner</h4></div>
				<div class="panel-body">
					<ul class="list-unstyled">
						<li>
							<span>Owner</span>
							{{ $vehicle->owner->name }}
						</li>
						<li>
							<span>Company</span>
							{{ $vehicle->owner->company->name }}
						</li>
						<li>
							<span>Usage</span>
							{{ $vehicle->usage }}
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Features</h4></div>
				<div class="panel-body">
					<ul class="list-unstyled">
						<li>
							<span>Engine Capacity (cc)</span>
							{{ $vehicle->engine_capacity }}
						</li>
						<li>
							<span>Boot</span>
							{{ $vehicle->boot }}
						</li>
						<li>
							<span>Trailer</span>
							{{ $vehicle->trailer }}
						</li>
						<li>
							<span>HGV</span>
							{{ $vehicle->hgv }}
						</li>
						<li>
							<span>Sunroof</span>
							{{ $vehicle->sunroof }}
						</li>
						<li>
							<span>GPS</span>
							{{ $vehicle->gps }}
						</li>
					</ul>
				</div>
			</div>

		</div>

	</div>
</div>