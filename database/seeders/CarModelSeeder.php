<?php

namespace Database\Seeders;

use App\Models\CarModel;
use App\Models\CarVendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include('resources/cars/cars.php');
        $array = json_decode($json, true);
        foreach ($array as $items => $item) {
            $return = CarVendor::factory()->create([
                'title' => $item['name'],
                'cyrillic_title' => $item['cyrillic-name']
            ]);
            foreach ($item['models'] as $models => $model) {
                CarModel::factory()->create([
                    'car_vendor_id' => $return->id,
                    'title' => $model['name'],
                    'cyrillic_title' => $model['cyrillic-name']
                ]);
            }
        }
    }
}
