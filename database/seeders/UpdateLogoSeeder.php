<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class UpdateLogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cập nhật logo trong settings nếu chưa có
        $existingLogo = Setting::where('key', 'site_logo')->first();

        if (!$existingLogo) {
            Setting::set('site_logo', 'images/logo_dh.png', 'image', 'branding', 'Logo chính của website');
        }

        // Cập nhật site name nếu chưa có
        $existingName = Setting::where('key', 'site_name')->first();

        if (!$existingName) {
            Setting::set('site_name', 'Step V Studio', 'text', 'branding', 'Tên website');
        }

        // Clear cache
        Cache::forget('setting_site_logo');
        Cache::forget('setting_site_name');
        Cache::forget('settings_group_branding');

        $this->command->info('Logo settings updated successfully!');
    }
}
