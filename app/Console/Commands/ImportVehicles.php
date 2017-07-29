<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\VehicleManufacturer;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use App\Models\VehicleTransmission;
use App\Models\VehicleColour;
use App\Models\FuelType;
use App\Models\Company;
use App\Models\Owner;
use App\Models\Vehicle;
use Storage;

class ImportVehicles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:vehicles {path=imports/VehicleSample.xml : optionally provide a path to an import file relative to the storage/app directory}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import vehicles from xml file, if no path is supplied then the import will use the default xml file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Begin importing from the XML File
        $filePath = $this->argument('path');

        // Check to see if the file exists
        if(!Storage::exists($filePath)) {
            $this->error("Couldn't find the specified file: " . $filePath);
            return false;
        }

        // File exists, get the contents 
        $importFile = Storage::get($filePath);
        
        // Try to parse the document
        try {
            $parsedXML = simplexml_load_string($importFile);
        } catch( \Exception $e) {
            $this->error($e);
            return false;            
        }

        // $parsedXML contains an array of data from the supplied XML

        // Create a progress bar
        $progressBar = $this->output->createProgressBar(count($parsedXML));

        // Loop through each vehicle in the array
        foreach ($parsedXML as $vehicle) {
            // The vehicle's Manufacturer and Model are attributes
            $manufacturer = $vehicle->attributes()->manufacturer;
            $model = $vehicle->attributes()->model;

            // Get or create the VehicleManufacturer
            $manufacturerModel = VehicleManufacturer::firstOrCreate(['name' => $manufacturer]);

            // Get or create the VehicleModel
            $modelModel = VehicleModel::firstOrCreate(['name' => $model, 'vehicle_manufacturer_id' => $manufacturerModel->id]);
            
            // Vehicle Manufacturer and Model both exist for certain at this point.
            
            // Get or create the VehicleType
            $vehicleType = VehicleType::firstOrCreate(['name' => $vehicle->type]);

            // Get or create the VehicleTransmission
            $vehicleTransmission = VehicleTransmission::firstOrCreate(['name' => $vehicle->transmission]);

            // Get or create the VehicleColour
            $vehicleColour = VehicleColour::firstOrCreate(['name' => $vehicle->colour]);

            // Get or create the FuelType
            $fuelType = FuelType::firstOrCreate(['name' => $vehicle->fuel_type]);

            // Get or create the Company
            $company = Company::firstOrCreate(['name' => $vehicle->owner_company]);

            // Get or create the Owner
            // I'm presuming that the users name is unique which may not be the case with a larger data set,
            // if that was the case a second parameter such as DOB could be used to verify that the correct owner was being identified
            $owner = Owner::firstOrCreate(['name' => $vehicle->owner_name, 'company_id' => $company->id, 'profession' => $vehicle->owner_profession]);

            // Create the Vehicle
            $vehicle = Vehicle::create([
                    'vehicle_model_id' => $modelModel->id,
                    'vehicle_type_id' => $vehicleType->id,
                    'vehicle_colour_id' => $vehicleColour->id,
                    'vehicle_transmission_id' => $vehicleTransmission->id,
                    'fuel_type_id' => $fuelType->id,
                    'owner_id' => $owner->id,
                    'usage' => $vehicle->usage,
                    'license_plate' => $vehicle->license_plate,
                    'weight_category' => $vehicle->weight_category,
                    'seats' => $vehicle->no_seats,
                    'boot' => (bool)$vehicle->has_boot,
                    'trailer' => (bool)$vehicle->has_trailer,
                    'hgv' => (bool)$vehicle->is_hgv,
                    'doors' => $vehicle->no_doors,
                    'sunroof' => $vehicle->sunroof,
                    'gps' => (bool)$vehicle->has_gps,
                    'wheels' => $vehicle->no_wheels,
                    'engine_capacity' => $vehicle->engine_cc,
                ]);

            // $this->performTask($user);

            $progressBar->advance();
        }

        $progressBar->finish();
        
        // Add an empty line to return the console under the progress bar
        $this->line('');

    }

}
