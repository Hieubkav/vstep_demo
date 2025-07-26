<?php

namespace App\Helpers;

use App\Models\WebDesign;
use Illuminate\Support\Facades\Cache;

class WebDesignHelper
{
    /**
     * Get component by key with caching
     */
    public static function getComponent($key)
    {
        return Cache::remember("component_{$key}", 3600, function () use ($key) {
            return WebDesign::getByKey($key);
        });
    }

    /**
     * Get all active components with caching
     */
    public static function getActiveComponents()
    {
        return Cache::remember('active_components', 3600, function () {
            return WebDesign::getActiveComponents();
        });
    }

    /**
     * Clear components cache
     */
    public static function clearCache()
    {
        Cache::forget('component_*');
        Cache::forget('active_components');
    }
}
