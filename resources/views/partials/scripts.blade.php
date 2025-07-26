{{-- Filament Scripts --}}
@filamentScripts

{{-- Main App Scripts --}}
@vite('resources/js/app.js')

{{-- Shop Fallback Script --}}
@vite('resources/js/shop-fallback.js')

{{-- Fallback CDN for Alpine.js if Vite fails --}}
<script>
    // Check if Alpine.js is loaded, if not load from CDN
    if (typeof Alpine === 'undefined') {
        var script = document.createElement('script');
        script.src = 'https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js';
        script.defer = true;
        document.head.appendChild(script);
    }
</script>

{{-- Component Scripts Stack --}}
@stack('scripts')
