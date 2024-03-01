<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        // Survey::truncate();
        // SurveyResponse::truncate();
        // DB::table('role_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        // Create User
        $user = User::create([
            'name' => 'Loncey Tech',
            'email' => 'admin@lonceytech.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@lonceytech.com'),
        ]);
        $user->assignRole('super-admin');


        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@test.com'),
        ]);
        $user->assignRole('Super User');

    }
}
