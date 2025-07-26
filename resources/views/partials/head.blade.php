{{-- Dynamic SEO và Meta Tags --}}
<x-dynamic-seo />

{{-- CSRF Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- Application Name --}}
<meta name="application-name" content="{{ setting('site_name', config('app.name')) }}">
