import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/shop-critical.css',
                'resources/css/components.css',
                'resources/js/app.js',
                'resources/js/shop-fallback.js'
            ],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
                'resources/views/**/*.blade.php',
                'app/Http/Controllers/**',
            ],
        }),
    ],
    server: {
        host: 'localhost',
        port: 5173,
        hmr: {
            host: 'localhost',
        },
    },
    build: {
        rollupOptions: {
            output: {
                manualChunks: {
                    // Tách vendor chunks để tối ưu caching
                    vendor: ['alpinejs', 'aos'],
                    ui: ['preline', 'flowbite'],
                }
            }
        },
        // Tối ưu hóa assets
        assetsInlineLimit: 4096,
        cssCodeSplit: true,
        sourcemap: false, // Tắt sourcemap cho production
    },
    // Tối ưu hóa dependencies
    optimizeDeps: {
        include: ['alpinejs', 'aos', 'preline', 'flowbite']
    }
});
