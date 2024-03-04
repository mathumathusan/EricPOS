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
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Create User

        echo '----------- User Seeding Start----------------'."\n";

        $user = User::create([
            'name' => 'Loncey Tech',
            'username' => 'lonceytech',
            'email' => 'raj@lonceytech.com',
            'email_verified_at' => now(),
            'password' => Hash::make('lonceytech'),
        ]);
        $user->assignRole('super-admin');


        $user = User::create([
            'name' => 'Raj Creation',
            'username' => 'raj',
            'email' => 'rajcrea@gmail.com',
            'email_verified_at' => now(),
            // 'api_token' => 'L46rZ5aJnr^#6deEoF^f',
            'password' => Hash::make('raj'),
        ]);
        $user->assignRole('admin');


        // $user = User::create([
        //     'name' => 'Web User',
        //     'email' => 'web@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('web@gmail.com'),
        // ]);
        // $user->assignRole('author');

        echo '----------- User Seeding End----------------'."\n\n";

    }
}
