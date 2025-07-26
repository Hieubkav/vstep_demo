{{-- SEO Meta Tags --}}
<title>{{ setting('seo_title', get_site_name()) }}</title>
<meta name="description" content="{{ setting('seo_description', 'Professional video production, motion graphics, and creative design services.') }}">
<meta name="keywords" content="video production, motion graphics, design, creative studio, step v studio">
<meta name="author" content="{{ get_site_name() }}">

{{-- Open Graph Meta Tags --}}
<meta property="og:title" content="{{ setting('seo_title', get_site_name()) }}">
<meta property="og:description" content="{{ setting('seo_description', 'Professional video production, motion graphics, and creative design services.') }}">
<meta property="og:image" content="{{ asset(setting('og_image') ?: (setting('site_logo') ?: 'images/logo_dh.png')) }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ get_site_name() }}">

{{-- Twitter Card Meta Tags --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ setting('seo_title', get_site_name()) }}">
<meta name="twitter:description" content="{{ setting('seo_description', 'Professional video production, motion graphics, and creative design services.') }}">
<meta name="twitter:image" content="{{ asset(setting('og_image') ?: (setting('site_logo') ?: 'images/logo_dh.png')) }}">

{{-- Canonical URL --}}
<link rel="canonical" href="{{ url()->current() }}">

{{-- Favicon --}}
<link rel="icon" type="image/png" href="{{ get_site_logo() }}">

{{-- Additional SEO --}}
<meta name="robots" content="index, follow">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
