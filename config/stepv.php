<?php

return [
    /*
    |--------------------------------------------------------------------------
    | StepV Studio Brand Colors
    |--------------------------------------------------------------------------
    |
    | These colors are used throughout the application and can be referenced
    | in blade templates using config('stepv.colors.primary') etc.
    |
    */
    'colors' => [
        'primary' => '#FFD700',      // Main brand color - gold
        'accent' => '#FFD700',       // Accent color (same as primary)
        'dark' => '#000000',         // Pure black
        'dark-light' => '#1a1a1a',   // Dark background
        'white' => '#ffffff',        // Pure white
        'gray-light' => '#aaaaaa',   // Light gray text
        'gray' => '#666666',         // Medium gray
        'gray-medium' => '#888888',  // Medium-light gray
        'gray-tailwind' => '#d1d5db', // Tailwind gray-300
        'success' => '#10b981',      // Success green
    ],

    /*
    |--------------------------------------------------------------------------
    | Brand Information
    |--------------------------------------------------------------------------
    | Note: Brand name is now dynamic from settings. Use get_site_name() helper.
    */
    'brand' => [
        'name' => 'Step V Studio', // Fallback only - use get_site_name() in templates
        'tagline' => 'Premium 3D Visuals & Animations',
        'description' => 'We specialize in crafting photorealistic 3D visuals and animations tailored for the perfumes and beauty industry.',
    ],

    /*
    |--------------------------------------------------------------------------
    | SEO Defaults
    |--------------------------------------------------------------------------
    | Note: SEO title is now dynamic from settings. Use setting() helper in templates.
    */
    'seo' => [
        'default_title' => 'Step V Studio - Premium 3D Visuals & Animations', // Fallback only
        'default_description' => 'We specialize in crafting photorealistic 3D visuals and animations tailored for the perfumes and beauty industry.',
        'default_image' => '/images/logo_dh.png', // Fallback nếu không có setting
    ],
];
