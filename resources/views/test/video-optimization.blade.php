<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Optimization Test - Step V Studio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-black text-white">

<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold mb-8 text-center">Video Optimization Test</h1>
    
    <!-- Connection Status -->
    <div class="mb-8 p-4 bg-gray-900 rounded-lg">
        <h2 class="text-xl font-semibold mb-4">Connection Status</h2>
        <div x-data="connectionTest()" x-init="init()">
            <p>Connection Speed: <span x-text="connectionSpeed" class="font-mono"></span></p>
            <p>Effective Type: <span x-text="effectiveType" class="font-mono"></span></p>
            <p>Downlink: <span x-text="downlink" class="font-mono"></span> Mbps</p>
            <p>RTT: <span x-text="rtt" class="font-mono"></span> ms</p>
        </div>
    </div>

    <!-- Test Videos -->
    <div class="space-y-12">
        
        <!-- Hero Video Test -->
        <section>
            <h2 class="text-2xl font-semibold mb-4">Hero Video (High Priority)</h2>
            <div class="relative h-96 rounded-lg overflow-hidden">
                <x-video-lazy
                    video-id="GXppDZ0k2IM"
                    title="Hero Video Test"
                    :autoplay="true"
                    :mute="true"
                    :loop="true"
                    :controls="false"
                    :start="2"
                    :end="31"
                    class="w-full h-full object-cover"
                    container-class="w-full h-full"
                    loading-class="bg-gradient-to-br from-gray-900 via-black to-gray-800"
                    :threshold="0.05"
                    root-margin="0px"
                />
            </div>
            <p class="text-sm text-gray-400 mt-2">Should load immediately when visible</p>
        </section>

        <!-- Content Videos Test -->
        <section>
            <h2 class="text-2xl font-semibold mb-4">Content Videos (Normal Priority)</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="relative h-64 rounded-lg overflow-hidden">
                    <x-video-lazy
                        video-id="EZwwRmLAg90"
                        title="Content Video 1"
                        :autoplay="true"
                        :mute="true"
                        :loop="true"
                        :controls="false"
                        :start="1"
                        class="w-full h-full object-cover"
                        container-class="w-full h-full"
                        loading-class="bg-gradient-to-br from-gray-800 to-gray-900"
                        :threshold="0.2"
                        root-margin="100px"
                    />
                </div>
                
                <div class="relative h-64 rounded-lg overflow-hidden">
                    <x-video-lazy
                        video-id="M7lc1UVf-VE"
                        title="Content Video 2"
                        :autoplay="true"
                        :mute="true"
                        :loop="true"
                        :controls="false"
                        class="w-full h-full object-cover"
                        container-class="w-full h-full"
                        loading-class="bg-gradient-to-br from-gray-800 to-gray-900"
                        :threshold="0.2"
                        root-margin="100px"
                    />
                </div>
            </div>
            <p class="text-sm text-gray-400 mt-2">Should load when 20% visible with 100px margin</p>
        </section>

        <!-- Low Priority Videos Test -->
        <section>
            <h2 class="text-2xl font-semibold mb-4">Background Videos (Low Priority)</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @for($i = 1; $i <= 3; $i++)
                <div class="relative h-48 rounded-lg overflow-hidden">
                    <x-video-lazy
                        video-id="GXppDZ0k2IM"
                        title="Background Video {{ $i }}"
                        :autoplay="true"
                        :mute="true"
                        :loop="true"
                        :controls="false"
                        class="w-full h-full object-cover video-lazy-priority-low"
                        container-class="w-full h-full"
                        loading-class="bg-gradient-to-br from-gray-700 to-gray-800"
                        :threshold="0.5"
                        root-margin="200px"
                    />
                </div>
                @endfor
            </div>
            <p class="text-sm text-gray-400 mt-2">Should load when 50% visible with 200px margin (low priority)</p>
        </section>

        <!-- Performance Test Section -->
        <section>
            <h2 class="text-2xl font-semibold mb-4">Performance Metrics</h2>
            <div x-data="performanceTest()" x-init="init()" class="bg-gray-900 p-4 rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <h3 class="font-semibold">Page Load</h3>
                        <p x-text="pageLoadTime" class="font-mono text-green-400"></p>
                    </div>
                    <div>
                        <h3 class="font-semibold">Videos Loaded</h3>
                        <p x-text="videosLoaded" class="font-mono text-blue-400"></p>
                    </div>
                    <div>
                        <h3 class="font-semibold">Total Load Time</h3>
                        <p x-text="totalLoadTime" class="font-mono text-yellow-400"></p>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h3 class="font-semibold mb-2">Video Load Events</h3>
                    <div x-ref="eventLog" class="bg-black p-2 rounded text-xs font-mono h-32 overflow-y-auto">
                        <!-- Events will be logged here -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Spacer for scroll testing -->
        <div class="h-screen flex items-center justify-center">
            <p class="text-gray-500 text-lg">Scroll up to see video loading in action</p>
        </div>
    </div>
</div>

<!-- Connection Indicator -->
<x-connection-indicator :show="true" position="bottom-right" />

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('connectionTest', () => ({
        connectionSpeed: 'Unknown',
        effectiveType: 'Unknown',
        downlink: 'Unknown',
        rtt: 'Unknown',
        
        init() {
            this.detectConnection();
        },
        
        detectConnection() {
            if ('connection' in navigator) {
                const conn = navigator.connection;
                this.effectiveType = conn.effectiveType || 'Unknown';
                this.downlink = conn.downlink || 'Unknown';
                this.rtt = conn.rtt || 'Unknown';
                
                if (conn.effectiveType === 'slow-2g' || conn.effectiveType === '2g') {
                    this.connectionSpeed = 'Slow';
                } else if (conn.effectiveType === '3g') {
                    this.connectionSpeed = 'Medium';
                } else {
                    this.connectionSpeed = 'Fast';
                }
            }
        }
    }));
    
    Alpine.data('performanceTest', () => ({
        pageLoadTime: '0ms',
        videosLoaded: 0,
        totalLoadTime: '0ms',
        startTime: 0,
        
        init() {
            this.startTime = performance.now();
            this.pageLoadTime = Math.round(performance.now()) + 'ms';
            
            // Listen for video load events
            document.addEventListener('video:loaded', (event) => {
                this.videosLoaded++;
                this.totalLoadTime = Math.round(performance.now() - this.startTime) + 'ms';
                
                // Log event
                const log = this.$refs.eventLog;
                const time = new Date().toLocaleTimeString();
                const videoTitle = event.target.title || 'Unknown Video';
                log.innerHTML += `[${time}] Video loaded: ${videoTitle}\n`;
                log.scrollTop = log.scrollHeight;
            });
            
            // Listen for optimization events
            document.addEventListener('video:optimizing', () => {
                const log = this.$refs.eventLog;
                const time = new Date().toLocaleTimeString();
                log.innerHTML += `[${time}] Optimizing videos for connection...\n`;
                log.scrollTop = log.scrollHeight;
            });
            
            document.addEventListener('video:optimized', () => {
                const log = this.$refs.eventLog;
                const time = new Date().toLocaleTimeString();
                log.innerHTML += `[${time}] Video optimization completed\n`;
                log.scrollTop = log.scrollHeight;
            });
        }
    }));
});
</script>

</body>
</html>
