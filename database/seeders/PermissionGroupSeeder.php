<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PermissionModule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermissionModule::truncate();
        $permissionGroups = [
            ['name' => 'User'],
            ['name' => 'User Permission'],
            ['name' => 'User Role'],
            ['name' => 'Dashboard'],
            ['name' => 'Admin'],
            ['name' => 'Location'],
            ['name' => 'Customer'],
            ['name' => 'Product'],
            ['name' => 'Brand'],
            ['name' => 'Purchase'],
            ['name' => 'Payment'],
          ];

          echo '-----------Permission Module Seeding Start----------------'."\n\n";
          foreach ($permissionGroups as $key => $value) {
            $permissionGroup = new PermissionModule();
            $permissionGroup->name = $value['name'];
            $permissionGroup->save();
            echo '-----------Permission Module Name=>'.$value['name'].' Seeding----------------'."\n";
          }
          echo "\n";
          echo '-----------Permission Module Seeding End----------------'."\n\n\n";

    }
}
