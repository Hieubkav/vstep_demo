<?php

namespace App\Helpers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class SettingHelper
{
    /**
     * Get setting value with caching
     */
    public static function get($key, $default = null)
    {
        try {
            return Cache::remember("setting_{$key}", 3600, function () use ($key, $default) {
                return Setting::get($key, $default);
            });
        } catch (\Exception $e) {
            // Fallback without cache if error
            return Setting::get($key, $default);
        }
    }

    /**
     * Get all settings by group with caching
     */
    public static function getByGroup($group)
    {
        try {
            return Cache::remember("settings_group_{$group}", 3600, function () use ($group) {
                return Setting::getByGroup($group);
            });
        } catch (\Exception $e) {
            // Fallback without cache if error
            return Setting::getByGroup($group);
        }
    }

    /**
     * Clear settings cache
     */
    public static function clearCache()
    {
        try {
            // Check if using Redis cache driver
            if (config('cache.default') === 'redis') {
                // Clear all settings cache with pattern for Redis
                $keys = Cache::getRedis()->keys('*setting*');
                foreach ($keys as $key) {
                    Cache::forget($key);
                }
            } else {
                // For file/array/database cache drivers, clear specific keys
                $settingKeys = [
                    'setting_site_name',
                    'setting_site_logo',
                    'setting_primary_color',
                    'setting_secondary_color',
                    'setting_seo_title',
                    'setting_seo_description',
                    'setting_og_image',
                    'setting_contact_email',
                    'setting_contact_phone',
                    'settings_group_branding',
                    'settings_group_colors',
                    'settings_group_seo',
                    'settings_group_contact',
                    'settings_group_general'
                ];

                foreach ($settingKeys as $key) {
                    Cache::forget($key);
                }
            }
        } catch (\Exception $e) {
            // If cache clearing fails, log the error but don't break the flow
            Log::warning('Failed to clear settings cache: ' . $e->getMessage());
        }
    }
}
