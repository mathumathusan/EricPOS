<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Location;
use App\Models\BottleType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'website' => 'ericganesh.lk',
            'social_media' => [],
            'default_language' => 'en',
            'is_active' => true,
            'created_by' => 1,
        ]);

        echo '----------- Location Seeding Start----------------' . "\n";

        echo '----------- Brand Seeding Start----------------' . "\n";

        $brand = Brand::create([
            'brand_name' => 'Nokia',
            'brand_code' => 'nk12',
            'is_active' => true,
            'created_by' => 1,
        ]);

        $brand = Brand::create([
            'brand_name' => 'Samsung',
            'brand_code' => 'sm12',
            'is_active' => true,
            'created_by' => 1,
        ]);

        echo '----------- Brand Seeding Start----------------' . "\n";

        echo '----------- Category Seeding Start----------------' . "\n";

        $category = Category::create([
            'category_name' => 'Frame',
            'category_code' => 'fm',
            'parent_id' => null,
            'is_active' => true,
            'created_by' => 1,
        ]);

        $category = Category::create([
            'category_name' => 'Lense',
            'category_code' => 'ln',
            'parent_id' => 1,
            'is_active' => true,
            'created_by' => 1,
        ]);

        echo '----------- Category Seeding Start----------------' . "\n";

        echo '----------- Unit Seeding Start----------------' . "\n";

        $unit = Unit::create([
            'actual_name' => 'Pieces',
            'short_name' => 'Pc(s)',
            'allow_decimal' => false,
            'created_by' => 1,
        ]);

        echo '----------- Unit Seeding Start----------------' . "\n";
    }
}
