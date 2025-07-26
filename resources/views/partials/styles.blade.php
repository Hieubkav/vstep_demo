{{-- FontAwesome Icons --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

{{-- Mobile Menu Styles --}}
<link href="{{ asset('css/mobile-menu.css') }}" rel="stylesheet">

{{-- Step V Studio Styles --}}
<link href="{{ asset('css/stepv-styles.css') }}" rel="stylesheet">

{{-- Critical CSS for initial load --}}
@vite('resources/css/shop-critical.css')

{{-- Components CSS --}}
@vite('resources/css/components.css')

{{-- Filament Styles --}}
@filamentStyles

{{-- Main App Styles --}}
@vite('resources/css/app.css')

{{-- Fallback CDN for Tailwind CSS if Vite fails --}}
<script>
    // Check if Tailwind CSS is loaded, if not load from CDN
    if (!document.querySelector('link[href*="app-"]')) {
        var link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'https://cdn.tailwindcss.com';
        document.head.appendChild(link);
    }
</script>
