<?php

namespace Database\Seeders;


use App\Models\PermissionModule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        // DB::table('role_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

          //  Create Permission
        $Permissions = [

            ['name' => 'view_dashboard','display_name'=>'View Dashboard','permission_module_id'=>PermissionModule::where('name','Dashboard')->first()->id],


            ['name' => 'view_users','display_name'=>'View Users','permission_module_id'=>PermissionModule::where('name','User')->first()->id],
            ['name' => 'add_users','display_name'=>'Add Users','permission_module_id'=>PermissionModule::where('name','User')->first()->id],
            ['name' => 'edit_users','display_name'=>'Edit Users','permission_module_id'=>PermissionModule::where('name','User')->first()->id],
            ['name' => 'delete_users','display_name'=>'Delete Users','permission_module_id'=>PermissionModule::where('name','User')->first()->id],

            ['name' => 'view_permissions','display_name'=>'View Permissions','permission_module_id'=>PermissionModule::where('name','User Permission')->first()->id],
            ['name' => 'add_permission','display_name'=>'Add Permissions','permission_module_id'=>PermissionModule::where('name','User Permission')->first()->id],
            ['name' => 'edit_permission','display_name'=>'Edit Permissions','permission_module_id'=>PermissionModule::where('name','User Permission')->first()->id],
            ['name' => 'delete_permission','display_name'=>'Delete Permissions','permission_module_id'=>PermissionModule::where('name','User Permission')->first()->id],

            ['name' => 'view_roles','display_name'=>'View Roles','permission_module_id'=>PermissionModule::where('name','User Role')->first()->id],
            ['name' => 'add_role','display_name'=>'Add Roles','permission_module_id'=>PermissionModule::where('name','User Role')->first()->id],
            ['name' => 'edit_role','display_name'=>'Edit Roles','permission_module_id'=>PermissionModule::where('name','User Role')->first()->id],
            ['name' => 'delete_role','display_name'=>'Delete Roles','permission_module_id'=>PermissionModule::where('name','User Role')->first()->id],

            ['name' => 'clear_cache','display_name'=>'Clear Cache','permission_module_id'=>PermissionModule::where('name','Admin')->first()->id],
            ['name' => 'manage_logs','display_name'=>'Manage Logs','permission_module_id'=>PermissionModule::where('name','Admin')->first()->id],
            ['name' => 'manage_settings','display_name'=>'Manage Settings','permission_module_id'=>PermissionModule::where('name','Admin')->first()->id],
            ['name' => 'manage_profile','display_name'=>'Manage Profile','permission_module_id'=>PermissionModule::where('name','Admin')->first()->id],

            ['name' => 'view_locations', 'display_name' => 'View Locations', 'permission_module_id' => PermissionModule::where('name', 'Location')->first()->id],
            ['name' => 'add_location', 'display_name' => 'Add Location', 'permission_module_id' => PermissionModule::where('name', 'Location')->first()->id],
            ['name' => 'edit_location', 'display_name' => 'Edit Location', 'permission_module_id' => PermissionModule::where('name', 'Location')->first()->id],
            ['name' => 'delete_location', 'display_name' => 'Delete Location', 'permission_module_id' => PermissionModule::where('name', 'Location')->first()->id],

            ['name' => 'view_products', 'display_name' => 'View Products', 'permission_module_id' => PermissionModule::where('name', 'Product')->first()->id],
            ['name' => 'add_product', 'display_name' => 'Add Product', 'permission_module_id' => PermissionModule::where('name', 'Product')->first()->id],
            ['name' => 'edit_product', 'display_name' => 'Edit Product', 'permission_module_id' => PermissionModule::where('name', 'Product')->first()->id],
            ['name' => 'delete_product', 'display_name' => 'Delete Product', 'permission_module_id' => PermissionModule::where('name', 'Product')->first()->id],

            ['name' => 'view_purchases', 'display_name' => 'View Purchases', 'permission_module_id' => PermissionModule::where('name', 'Purchase')->first()->id],
            ['name' => 'add_purchase', 'display_name' => 'Add Purchase', 'permission_module_id' => PermissionModule::where('name', 'Purchase')->first()->id],
            ['name' => 'edit_draft_purchase', 'display_name' => 'Edit Draft Purchase', 'permission_module_id' => PermissionModule::where('name', 'Purchase')->first()->id],
            ['name' => 'edit_saved_purchase', 'display_name' => 'Edit Saved Purchase', 'permission_module_id' => PermissionModule::where('name', 'Purchase')->first()->id],
            ['name' => 'delete_purchase', 'display_name' => 'Delete Purchase', 'permission_module_id' => PermissionModule::where('name', 'Purchase')->first()->id],

            ['name' => 'manage_payment', 'display_name' => 'Manage Payment', 'permission_module_id' => PermissionModule::where('name', 'Payment')->first()->id],


        ];

        echo '---------------------------------------------------'."\n\n";
        echo '-----------Permission Seeding Start----------------'."\n";
        foreach ($Permissions as $key => $value) {
          $permission = new Permission();
          $permission->name = $value['name'];
          $permission->display_name = $value['display_name'];
          $permission->permission_module_id = $value['permission_module_id'];
          $permission->save();
          echo '-----------Permission Name=>'.$value['name'].' Seeding----------------'."\n";
        }
        echo "\n";
        echo '-----------Permission Seeding End----------------'."\n\n";



    }
}
