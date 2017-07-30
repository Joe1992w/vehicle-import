<div class="panel-body">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Manufacturer</th>
				<th>Model</th>
				<th>Owner</th>
				<th>License Plate</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($vehicles as $vehicle)
				<tr>
					<td>{{ $vehicle->id }}</td>
					<td>{{ $vehicle->manufacturer->name }}</td>
					<td>{{ $vehicle->model->name }}</td>
					<td>{{ $vehicle->owner->name }}</td>
					<td>{{ $vehicle->license_plate }}</td>
					<td><a href="{{ route('vehicles.show', $vehicle->id) }}">More Details</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>