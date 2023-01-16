<?php

namespace Database\Seeders;

use App\Models\VehicleBrand;
use App\Models\VehicleCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehicleBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicleBrands = [
            ['name' => 'Honda', 'created_at' => now()],
            ['name' => 'Hero', 'created_at' => now()],
        ];
        VehicleBrand::insert($vehicleBrands);
    }
}
