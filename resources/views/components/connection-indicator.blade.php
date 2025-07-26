@props([
    'show' => true,
    'position' => 'bottom-right', // 'top-left', 'top-right', 'bottom-left', 'bottom-right'
    'class' => ''
])

@php
    $positionClasses = [
        'top-left' => 'top-4 left-4',
        'top-right' => 'top-4 right-4',
        'bottom-left' => 'bottom-4 left-4',
        'bottom-right' => 'bottom-4 right-4'
    ];
    
    $positionClass = $positionClasses[$position] ?? $positionClasses['bottom-right'];
@endphp

@if($show)
<div 
    x-data="connectionIndicator()"
    x-show="showIndicator"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
    class="fixed {{ $positionClass }} z-50 {{ $class }}"
    x-init="init()"
>
    <div 
        class="bg-black/80 backdrop-blur-sm border border-gray-700 rounded-lg px-3 py-2 text-xs font-medium text-white shadow-lg"
        :class="{
            'border-green-500 text-green-400': connectionSpeed === 'fast',
            'border-yellow-500 text-yellow-400': connectionSpeed === 'medium',
            'border-red-500 text-red-400': connectionSpeed === 'slow'
        }"
    >
        <div class="flex items-center gap-2">
            <!-- Connection Icon -->
            <div class="flex items-center">
                <template x-if="connectionSpeed === 'fast'">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </template>
                
                <template x-if="connectionSpeed === 'medium'">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" clip-rule="evenodd"></path>
                    </svg>
                </template>
                
                <template x-if="connectionSpeed === 'slow'">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                    </svg>
                </template>
            </div>
            
            <!-- Connection Text -->
            <span x-text="connectionText"></span>
            
            <!-- Loading Indicator -->
            <template x-if="isOptimizing">
                <div class="animate-spin rounded-full h-3 w-3 border border-current border-t-transparent"></div>
            </template>
        </div>
        
        <!-- Additional Info -->
        <div x-show="showDetails" class="mt-1 text-xs opacity-75" x-text="connectionDetails"></div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('connectionIndicator', () => ({
        connectionSpeed: 'fast',
        connectionText: 'Fast Connection',
        connectionDetails: '',
        showIndicator: false,
        showDetails: false,
        isOptimizing: false,
        
        init() {
            this.detectConnection();
            this.setupConnectionMonitoring();
            this.setupVideoOptimizationListener();
            
            // Show indicator briefly on page load
            this.showIndicator = true;
            setTimeout(() => {
                this.showIndicator = false;
            }, 3000);
        },
        
        detectConnection() {
            if ('connection' in navigator) {
                const connection = navigator.connection;
                this.updateConnectionInfo(connection);
            } else {
                // Fallback: estimate based on performance
                this.estimateConnectionSpeed();
            }
        },
        
        updateConnectionInfo(connection) {
            const effectiveType = connection.effectiveType;
            const downlink = connection.downlink;
            
            if (effectiveType === 'slow-2g' || effectiveType === '2g') {
                this.connectionSpeed = 'slow';
                this.connectionText = 'Slow Connection';
                this.connectionDetails = 'Videos optimized for low bandwidth';
                document.body.classList.add('slow-connection');
            } else if (effectiveType === '3g') {
                this.connectionSpeed = 'medium';
                this.connectionText = 'Medium Connection';
                this.connectionDetails = 'Standard video quality';
                document.body.classList.remove('slow-connection');
            } else {
                this.connectionSpeed = 'fast';
                this.connectionText = 'Fast Connection';
                this.connectionDetails = 'High quality videos enabled';
                document.body.classList.remove('slow-connection');
            }
            
            // Show details if connection is not optimal
            this.showDetails = this.connectionSpeed !== 'fast';
        },
        
        estimateConnectionSpeed() {
            // Simple performance-based estimation
            const startTime = performance.now();
            
            // Create a small test request
            fetch('/favicon.ico?' + Math.random())
                .then(() => {
                    const loadTime = performance.now() - startTime;
                    
                    if (loadTime > 1000) {
                        this.connectionSpeed = 'slow';
                        this.connectionText = 'Slow Connection';
                        document.body.classList.add('slow-connection');
                    } else if (loadTime > 500) {
                        this.connectionSpeed = 'medium';
                        this.connectionText = 'Medium Connection';
                    } else {
                        this.connectionSpeed = 'fast';
                        this.connectionText = 'Fast Connection';
                    }
                })
                .catch(() => {
                    this.connectionSpeed = 'slow';
                    this.connectionText = 'Limited Connection';
                    document.body.classList.add('slow-connection');
                });
        },
        
        setupConnectionMonitoring() {
            if ('connection' in navigator) {
                navigator.connection.addEventListener('change', () => {
                    this.detectConnection();
                    this.showIndicator = true;
                    
                    setTimeout(() => {
                        this.showIndicator = false;
                    }, 2000);
                });
            }
        },
        
        setupVideoOptimizationListener() {
            // Listen for video optimization events
            document.addEventListener('video:optimizing', () => {
                this.isOptimizing = true;
                this.showIndicator = true;
                this.connectionText = 'Optimizing videos...';
            });
            
            document.addEventListener('video:optimized', () => {
                this.isOptimizing = false;
                this.detectConnection();
                
                setTimeout(() => {
                    this.showIndicator = false;
                }, 1500);
            });
            
            // Listen for video loading events
            document.addEventListener('video:loaded', (event) => {
                if (this.connectionSpeed === 'slow') {
                    this.showIndicator = true;
                    this.connectionText = 'Video loaded';
                    
                    setTimeout(() => {
                        this.showIndicator = false;
                    }, 1000);
                }
            });
        }
    }));
});
</script>
@endif
