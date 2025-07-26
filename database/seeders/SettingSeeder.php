<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Branding Settings
            [
                'key' => 'site_name',
                'value' => 'Step V Studio',
                'type' => 'text',
                'group' => 'branding',
                'description' => 'Tên website'
            ],
            [
                'key' => 'site_logo',
                'value' => 'images/logo_dh.png',
                'type' => 'image',
                'group' => 'branding',
                'description' => 'Logo chính của website'
            ],

            // Colors Settings
            [
                'key' => 'primary_color',
                'value' => '#d0ff71',
                'type' => 'color',
                'group' => 'colors',
                'description' => 'Màu chính của website'
            ],
            [
                'key' => 'secondary_color',
                'value' => '#000000',
                'type' => 'color',
                'group' => 'colors',
                'description' => 'Màu phụ của website'
            ],

            // SEO Settings
            [
                'key' => 'seo_title',
                'value' => 'Step V Studio - Creative Video Production & Design',
                'type' => 'text',
                'group' => 'seo',
                'description' => 'Tiêu đề SEO'
            ],
            [
                'key' => 'seo_description',
                'value' => 'Professional video production, motion graphics, and creative design services. Turning passion into perfection.',
                'type' => 'textarea',
                'group' => 'seo',
                'description' => 'Mô tả SEO'
            ],
            [
                'key' => 'og_image',
                'value' => 'images/logo_dh.png',
                'type' => 'image',
                'group' => 'seo',
                'description' => 'Hình ảnh Open Graph'
            ],

            // Contact Settings
            [
                'key' => 'contact_email',
                'value' => 'info@stepv.studio',
                'type' => 'email',
                'group' => 'contact',
                'description' => 'Email liên hệ'
            ],
            [
                'key' => 'contact_phone',
                'value' => '+84 123 456 789',
                'type' => 'text',
                'group' => 'contact',
                'description' => 'Số điện thoại liên hệ'
            ]
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
