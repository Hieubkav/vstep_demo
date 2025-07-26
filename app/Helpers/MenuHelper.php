<?php

namespace App\Helpers;

use App\Models\MenuItem;
use Illuminate\Support\Facades\Cache;

class MenuHelper
{
    /**
     * Get menu tree with caching
     */
    public static function getMenuTree()
    {
        return Cache::remember('menu_tree', 3600, function () {
            return MenuItem::getMenuTree();
        });
    }

    /**
     * Clear menu cache
     */
    public static function clearCache()
    {
        Cache::forget('menu_tree');
    }
}
