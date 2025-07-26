<?php

if (!function_exists('setting')) {
    function setting($key, $default = null) {
        return \App\Helpers\SettingHelper::get($key, $default);
    }
}

if (!function_exists('settings_group')) {
    function settings_group($group) {
        return \App\Helpers\SettingHelper::getByGroup($group);
    }
}

if (!function_exists('get_component')) {
    function get_component($key) {
        return \App\Helpers\WebDesignHelper::getComponent($key);
    }
}

if (!function_exists('get_menu_tree')) {
    function get_menu_tree() {
        return \App\Helpers\MenuHelper::getMenuTree();
    }
}

if (!function_exists('get_site_logo')) {
    function get_site_logo() {
        $logo = setting('site_logo', 'images/logo_dh.png');

        // Nếu logo từ settings là đường dẫn tương đối, thêm storage path
        if ($logo && !str_starts_with($logo, 'http') && !str_starts_with($logo, 'images/')) {
            return asset('storage/' . $logo);
        }

        return asset($logo);
    }
}

if (!function_exists('get_site_name')) {
    function get_site_name() {
        return setting('site_name', 'Step V Studio');
    }
}

if (!function_exists('get_image_url')) {
    function get_image_url($imageData, $fallback = null) {
        if (is_string($imageData)) {
            // Nếu là string, có thể là URL hoặc path
            if (str_starts_with($imageData, 'http')) {
                return $imageData; // External URL
            }
            return asset('storage/' . $imageData); // Local file
        }

        if (is_array($imageData)) {
            // Nếu là array, kiểm tra type
            if (isset($imageData['type']) && isset($imageData['value'])) {
                if ($imageData['type'] === 'url' && !empty($imageData['value'])) {
                    return $imageData['value']; // External URL
                }
                if ($imageData['type'] === 'upload' && !empty($imageData['value'])) {
                    return asset('storage/' . $imageData['value']); // Uploaded file
                }
            }
        }

        return $fallback ? asset($fallback) : null;
    }
}

if (!function_exists('get_webdesign_image')) {
    function get_webdesign_image($settings, $typeKey, $urlKey, $uploadKey, $fallback = null) {
        // Kiểm tra an toàn cho image_type mới
        if (isset($settings[$typeKey]) && $settings[$typeKey] === 'url' && !empty($settings[$urlKey])) {
            return $settings[$urlKey];
        }

        // Fallback về upload hoặc giá trị cũ
        if (!empty($settings[$uploadKey])) {
            return $settings[$uploadKey];
        }

        return $fallback;
    }
}
