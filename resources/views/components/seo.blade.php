@props([
    'title' => null,
    'description' => null,
    'keywords' => '3D visualization, 3D animation, perfume marketing, beauty brands, product visualization, photorealistic rendering, studio 3D Vietnam, thiết kế 3D chuyên nghiệp',
    'image' => null,
    'url' => null,
    'type' => 'website'
])

@php
    $siteName = get_site_name();
    $defaultTitle = $siteName . ' - Chuyên gia 3D Visual cho thương hiệu nước hoa & mỹ phẩm';
    $defaultDescription = $siteName . ' - Tạo ra những hình ảnh 3D photorealistic chuyên nghiệp, thu hút và chuyển đổi khách hàng hiệu quả cho các thương hiệu luxury nước hoa & mỹ phẩm.';
@endphp

@php
    $seoTitle = $title ?? $defaultTitle;
    $seoDescription = $description ?? $defaultDescription;
    $seoKeywords = $keywords;
    $seoImage = $image ?? get_site_logo();
    $seoUrl = $url ?? url()->current();
    $seoType = $type;
@endphp

{{-- SEO Meta Tags --}}
<meta name="description" content="{{ $seoDescription }}">
<meta name="keywords" content="{{ $seoKeywords }}">
<meta name="robots" content="index, follow">
<meta name="author" content="Step V Studio">
<meta name="language" content="vi">

{{-- Open Graph Meta Tags --}}
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:type" content="{{ $seoType }}">
<meta property="og:url" content="{{ $seoUrl }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $siteName }} Logo">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:locale" content="vi_VN">

{{-- Twitter Card Meta Tags --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">

{{-- Additional SEO Meta Tags --}}
<meta name="theme-color" content="{{ config('stepv.colors.dark', '#000000') }}">
<meta name="msapplication-TileColor" content="{{ config('stepv.colors.dark', '#000000') }}">
<link rel="canonical" href="{{ $seoUrl }}">

{{-- Page Title --}}
<title>{{ $seoTitle }}</title>

{{-- Structured Data --}}
<x-structured-data type="Organization" />
<x-structured-data type="WebSite" />
