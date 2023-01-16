<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use App\Models\VehicleCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehicleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicleCategories = [
            ['name' => 'Motorcycle', 'created_at' => now()],
            ['name' => 'Private Car', 'created_at' => now()],
        ];
        VehicleCategory::insert($vehicleCategories);
    }
}
