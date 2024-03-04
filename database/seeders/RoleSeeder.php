<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::table('role_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        // Create Role
        echo '-----------Role Seeding Start----------------' . "\n\n";

        $role = Role::create(['name' => 'super-admin']);
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'manager']);
        $role = Role::create(['name' => 'staff']);

        echo '-----------Role Seeding End----------------' . "\n\n";

        //  $admin->givePermissionTo('Create Permission');
        echo '-----------Assign Permission to Admin Start----------------' . "\n\n";
        // Add Permission to admin
        $admin = Role::findByName('admin');
        $admin->givePermissionTo([

            'view_dashboard',

            'view_products',
            'add_product',
            'edit_product',
            'delete_product',

            'view_purchases',
            'add_purchase',
            'edit_draft_purchase',
            'delete_purchase',

            'manage_payment',
            'manage_profile',

        ]);

        echo '-----------Assign Permission to Admin End----------------' . "\n\n";


        echo '-----------Assign Permission to Manager Start----------------' . "\n\n";
        // Add Permission to admin
        $manager = Role::findByName('manager');
        $manager->givePermissionTo([
            'view_dashboard',

            'view_products',
            'add_product',
            'edit_product',

            'view_purchases',
            'add_purchase',

            'manage_payment',
            'manage_profile',
        ]);

        echo '-----------Assign Permission to Manager End----------------' . "\n\n";

        echo '-----------Assign Permission to Staff Start----------------' . "\n\n";
        // Add Permission to admin
        $author = Role::findByName('staff');
        $author->givePermissionTo([

            'view_products',  'view_dashboard',
            'manage_profile',

        ]);

        echo '-----------Assign Permission to Staff End----------------' . "\n\n";
    }
}
