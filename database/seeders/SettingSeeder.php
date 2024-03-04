<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Setting::truncate();
        // DB::table('role_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $settings = [
            ['name' => 'system_logo', 'value' => ''],
            ['name' => 'website_name', 'value' => 'lonceybiz'],
            ['name' => 'meta_title', 'value' => 'lonceybiz'],
            ['name' => 'meta_description', 'value' => 'lonceybiz'],
            ['name' => 'meta_keywords', 'value' => 'lonceybiz'],
            ['name' => 'cookies_agreement_text', 'value' => 'We use cookies to track usage and preferences.'],
            ['name' => 'show_cookies_agreement', 'value' => 0],
            ['name' => 'site_name', 'value' => 'lonceybiz'],
            ['name' => 'facebook_link', 'value' => 'https://www.facebook.com'],
            ['name' => 'twitter_link', 'value' => ''],
            ['name' => 'instagram_link', 'value' => ''],
            ['name' => 'youtube_link', 'value' => ''],
            ['name' => 'linkedin_link', 'value' => ''],
            ['name' => 'maintenance_mode', 'value' => 0],
        ];

        echo '----------- Setting Seeding Start----------------'."\n";
        Setting::insert($settings);
        echo '----------- Setting Seeding End----------------'."\n\n";

    }
}
