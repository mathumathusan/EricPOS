<?php

namespace Database\Seeders;

use App\Models\BottleType;
use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo '----------- Location Seeding Start----------------' . "\n";

        $location = Location::create([
            'name' => 'Jaffna Main Branch',
            'store_code' => 'JFN',
            'address' => 'No.566,564 Hospital road, Jaffna, Sri Lanka',
            'phone' => '0212 222 486',
            'mobile' => '077 993 3965',
            'email' => 'ericganeshopticals@gmail.com',
            'website'=>'ericganesh.lk',
            'social_media'=>[],
            'default_language'=>'en',
            'is_active'=>true,
        ]);


        echo '----------- Location Seeding Start----------------' . "\n";
    }
}
