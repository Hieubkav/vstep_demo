@props([
    'videoId' => '',
    'title' => 'Video',
    'autoplay' => true,
    'mute' => true,
    'loop' => true,
    'controls' => false,
    'start' => null,
    'end' => null,
    'playlist' => null,
    'class' => 'w-full h-full',
    'containerClass' => 'relative w-full h-full',
    'placeholder' => null,
    'loadingClass' => 'bg-gray-900',
    'threshold' => 0.1,
    'rootMargin' => '50px'
])

@php
    $videoParams = [
        'controls' => $controls ? '1' : '0',
        'rel' => '0',
        'playsinline' => '1',
        'cc_load_policy' => '0',
        'enablejsapi' => '1',
        'modestbranding' => '1',
        'iv_load_policy' => '3'
    ];
    
    if ($autoplay) {
        $videoParams['autoplay'] = '1';
    }
    
    if ($mute) {
        $videoParams['mute'] = '1';
    }
    
    if ($loop) {
        $videoParams['loop'] = '1';
        $videoParams['playlist'] = $playlist ?: $videoId;
    }
    
    if ($start) {
        $videoParams['start'] = $start;
    }
    
    if ($end) {
        $videoParams['end'] = $end;
    }
    
    $videoUrl = 'https://www.youtube-nocookie.com/embed/' . $videoId . '?' . http_build_query($videoParams);
    $uniqueId = 'video-lazy-' . uniqid();
@endphp

<div 
    class="{{ $containerClass }}"
    x-data="videoLazy({
        videoId: '{{ $videoId }}',
        videoUrl: '{{ $videoUrl }}',
        threshold: {{ $threshold }},
        rootMargin: '{{ $rootMargin }}',
        autoplay: {{ $autoplay ? 'true' : 'false' }}
    })"
    x-init="init()"
    id="{{ $uniqueId }}"
>
    <!-- Loading Placeholder -->
    <div 
        x-show="!loaded" 
        class="{{ $loadingClass }} {{ $class }} flex items-center justify-center"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        @if($placeholder)
            <img src="{{ $placeholder }}" alt="{{ $title }}" class="w-full h-full object-cover">
        @else
            <div class="flex flex-col items-center justify-center text-white/60">
                <svg class="w-16 h-16 mb-4 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M19 10a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-sm font-medium">Loading video...</p>
            </div>
        @endif
    </div>

    <!-- Video Container -->
    <div 
        x-show="loaded" 
        class="{{ $class }}"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
    >
        <iframe
            x-ref="iframe"
            :src="loaded ? videoUrl : ''"
            frameborder="0"
            allowfullscreen
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            :title="'{{ $title }}'"
            class="{{ $class }}"
            style="pointer-events: none;"
            loading="lazy"
        ></iframe>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('videoLazy', (config) => ({
        loaded: false,
        observer: null,
        videoUrl: config.videoUrl,
        autoplay: config.autoplay,
        
        init() {
            this.setupIntersectionObserver();
        },
        
        setupIntersectionObserver() {
            const options = {
                threshold: config.threshold,
                rootMargin: config.rootMargin
            };
            
            this.observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !this.loaded) {
                        this.loadVideo();
                    }
                });
            }, options);
            
            this.observer.observe(this.$el);
        },
        
        loadVideo() {
            // Delay loading slightly to ensure smooth transition
            setTimeout(() => {
                this.loaded = true;
                this.observer?.disconnect();
                
                // Auto-trigger play if needed
                if (this.autoplay) {
                    this.$nextTick(() => {
                        this.triggerAutoplay();
                    });
                }
            }, 100);
        },
        
        triggerAutoplay() {
            const iframe = this.$refs.iframe;
            if (iframe) {
                // Wait for iframe to load
                iframe.addEventListener('load', () => {
                    setTimeout(() => {
                        try {
                            iframe.contentWindow.postMessage(
                                '{"event":"command","func":"playVideo","args":""}', 
                                '*'
                            );
                        } catch (e) {
                            console.log('Video autoplay message failed:', e);
                        }
                    }, 1000);
                });
            }
        },
        
        destroy() {
            this.observer?.disconnect();
        }
    }));
});
</script>
