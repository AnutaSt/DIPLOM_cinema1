<?php

namespace Database\Seeders;

use App\Models\CarVendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarVendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = count($vendors = [
            'Acura', 'Alfa Romeo', 'Aston Martin', 'Audi', 'Bentle', 'BMW', 'Brilliance', 'Bugatti', 'Buick', 'BYD', 'Cadillac', 'Changan', 'Chery', 'Chevrolet', 'Chrysler', 'Citroen', 'Dacia', 'Daewoo', 'Daihatsu', 'Datsun', 'Dodge', 'Dongfeng', 'Exeed', 'FAW', 'Ferrari', 'Fiat', 'Fisker', 'Ford', 'Foton', 'GAC', 'GAZ', 'Geely', 'Genesis', 'GMC', 'Great Wall', 'Haval', 'Holden', 'Honda', 'Hummer', 'Hyundai', 'Infiniti', 'Isuzu', 'Iveco', 'Jac', 'Jaguar', 'Jeep', 'Kia', 'Lamborghini', 'Lancia', 'Land Rover', 'Lexus', 'Lifan', 'Lincoln', 'Lotus', 'Marussia', 'Maserati', 'Maybach', 'Mazda', 'McLaren', 'Mercedes', 'Mercury', 'MG', 'Mini', 'Mitsubishi', 'Moskvich', 'Nissan', 'Opel', 'Peugeot', 'Plymouth', 'Pontiac', 'Porsche', 'Ravon', 'Renault', 'Rolls-Royce', 'Rover', 'Saab', 'Saturn', 'Scion', 'Seat', 'Skoda', 'Smart', 'Ssang Yong', 'Subaru', 'Suzuki', 'Tesla', 'Toyota', 'UAZ', 'VAZ', 'Volkswagen', 'Volvo'
        ]);
        for ($i = 0; $i < $count; $i++) {
            CarVendor::factory()->create(['title' => $vendors[$i]]);
        }
    }
}
