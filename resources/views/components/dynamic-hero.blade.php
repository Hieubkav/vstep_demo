@php
try {
    $hero = \App\Models\WebDesign::getByKey('hero');
} catch (\Exception $e) {
    $hero = null;
}

// Data mặc định nếu không có trong DB
$data = [
    'video_id' => $hero->content['video_id'] ?? 'GXppDZ0k2IM',
    'video_start' => $hero->content['video_start'] ?? 2,
    'video_end' => $hero->content['video_end'] ?? 31,
    'title_lines' => $hero->content['title_lines'] ?? ['CREATE.', 'CAPTIVATE.', 'CONVERT.'],
    'subtitle' => $hero->subtitle ?? '3D VISUAL SPECIALISTS FOR PERFUMES & BEAUTY BRANDS',
    'brands' => $hero->content['brands'] ?? [
        ['url' => 'https://stepv.studio/wp-content/uploads/2024/08/wn-x-black-and-red-2-1024x1017.png', 'alt' => 'WN Brand'],
        ['url' => 'https://stepv.studio/wp-content/uploads/2024/08/dnalogo-1024x1017.png', 'alt' => 'DNA Brand'],
        ['url' => 'https://stepv.studio/wp-content/uploads/2024/10/gdivine-1024x1017.png', 'alt' => 'G\'Divine'],
        ['url' => 'https://stepv.studio/wp-content/uploads/2024/08/hyaluronce-logo-1024x1017.png', 'alt' => 'Hyaluronce'],
        ['url' => 'https://stepv.studio/wp-content/uploads/2024/11/fivologo-1024x1017.png', 'alt' => 'Fivo'],
        ['url' => 'https://stepv.studio/wp-content/uploads/2024/10/thedarkageslogo-1024x1017.png', 'alt' => 'The Dark Ages'],
        ['url' => 'https://stepv.studio/wp-content/uploads/2025/04/gazzaznewlogo-1024x1015.png', 'alt' => 'Gazzaz'],
        ['url' => 'https://stepv.studio/wp-content/uploads/2024/11/sdvstudios-1024x1017.png', 'alt' => 'SDV Studios'],
        ['url' => 'https://stepv.studio/wp-content/uploads/2024/10/caronparis-logo-1024x1017.png', 'alt' => 'Caron Paris']
    ],
    'social_links' => $hero->content['social_links'] ?? \App\Models\Setting::get('social_links', [
        ['url' => 'https://www.youtube.com/@StepVStudio', 'icon' => 'M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z', 'hover' => 'hover:text-red-500'],
        ['url' => 'https://www.instagram.com/stepv.studio/', 'icon' => 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.40s-.644-1.44-1.439-1.40z', 'hover' => 'hover:text-pink-500'],
        ['url' => 'https://www.linkedin.com/company/step-v-studio/', 'icon' => 'M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z', 'hover' => 'hover:text-blue-500']
    ])
];
@endphp

@if(!$hero || $hero->is_active)
<!-- Hero Section -->
<section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Video -->
    <div class="absolute inset-0 z-0">
        <div class="video-background">
            <iframe id="hero-video"
                src="https://www.youtube-nocookie.com/embed/{{ $data['video_id'] }}?controls=0&rel=0&playsinline=1&cc_load_policy=0&enablejsapi=1&autoplay=1&mute=1&loop=1&playlist={{ $data['video_id'] }}&start={{ $data['video_start'] }}&end={{ $data['video_end'] }}"
                frameborder="0" allowfullscreen
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                title="Step V Studio Showreel">
            </iframe>
        </div>
        <div class="absolute inset-0 bg-black/40 z-10"></div>
    </div>

    <div class="relative z-20 container mx-auto px-4 text-center">
        <!-- Main Heading with Large Animated Text -->
        <div class="mb-8 hero-heading">
            <h1 class="text-6xl md:text-8xl lg:text-9xl font-bold mb-6 tracking-wider">
                <span class="animated-text-wrapper">
                    @foreach($data['title_lines'] as $line)
                    <span class="animated-text">{{ $line }}</span>
                    @endforeach
                </span>
            </h1>
        </div>

        <!-- Subtitle -->
        <div class="mb-12 hero-subtitle">
            <h2 class="text-xl md:text-2xl lg:text-3xl font-light text-white/90 uppercase tracking-wide">
                {{ $data['subtitle'] }}
            </h2>
        </div>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6 mb-16 hero-buttons">
            <button class="bg-white text-black px-8 py-3 rounded font-medium hover:bg-gray-200 transition-all transform hover:scale-105 shadow-lg flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                <span>VIEW MORE</span>
            </button>
            <button class="bg-black text-white px-8 py-3 rounded font-medium hover:bg-gray-800 transition-all transform hover:scale-105 border border-white/20">
                <span>BOOK A FREE CONSULTATION</span>
            </button>
        </div>

        <!-- Brand Logos Carousel -->
        <div class="mb-16">
            <div class="brand-carousel overflow-hidden">
                <div class="brand-track flex items-center space-x-16">
                    @foreach($data['brands'] as $brand)
                    <img src="{{ $brand['url'] }}" alt="{{ $brand['alt'] }}" class="h-24 w-auto opacity-70 hover:opacity-100 transition-opacity">
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Social Media Icons - Absolute Position within Hero -->
    <div class="social-media-hero">
        @foreach($data['social_links'] as $social)
        <a href="{{ $social['url'] }}" target="_blank" class="text-white {{ $social['hover'] }} transition-colors p-2 bg-black/20 rounded-full backdrop-blur-sm">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="{{ $social['icon'] }}"/>
            </svg>
        </a>
        @endforeach
    </div>
</section>

<style>
/* Video Background */
.video-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 1;
}

.video-background iframe {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100vw;
    height: 56.25vw; /* 16:9 aspect ratio */
    min-height: 100vh;
    min-width: 177.77vh; /* 16:9 aspect ratio */
    transform: translate(-50%, -50%);
    pointer-events: none;
}

/* Fallback for smaller screens */
@media (max-aspect-ratio: 16/9) {
    .video-background iframe {
        width: 177.77vh;
        height: 100vh;
    }
}

/* Animated Text - Simplified */
.animated-text-wrapper {
    position: relative;
    display: inline-block;
    min-height: 1.2em;
}

.animated-text {
    display: none;
    color: white;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.animated-text.active {
    display: inline-block;
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Hero Animations */
.hero-heading {
    animation: fadeInUp 1s ease-out;
}

.hero-subtitle {
    animation: fadeInUp 1s ease-out 0.3s both;
}

.hero-buttons {
    animation: fadeInUp 1s ease-out 0.9s both;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Brand Carousel */
.brand-carousel {
    mask: linear-gradient(90deg, transparent, white 20%, white 80%, transparent);
    -webkit-mask: linear-gradient(90deg, transparent, white 20%, white 80%, transparent);
}

.brand-track {
    animation: brandScroll 20s linear infinite;
}

@keyframes brandScroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

/* Social Media Icons - Absolute Position within Hero */
.social-media-hero {
    position: absolute !important;
    right: 1.5rem !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    z-index: 40 !important;
    display: flex !important;
    flex-direction: column !important;
    gap: 1rem !important;
}

.social-media-hero a {
    color: white !important;
    padding: 0.5rem !important;
    background: rgba(0, 0, 0, 0.2) !important;
    border-radius: 50% !important;
    backdrop-filter: blur(4px) !important;
    transition: all 0.3s ease !important;
}

.social-media-hero a:hover {
    transform: scale(1.1) !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .hero-heading h1 {
        font-size: 3rem;
    }

    .hero-subtitle h2 {
        font-size: 1rem;
    }

    .social-media-hero {
        right: 1rem !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animated text rotation
    const animatedTexts = document.querySelectorAll('.animated-text');
    let currentIndex = 0;

    function rotateText() {
        animatedTexts.forEach(text => text.classList.remove('active'));
        if (animatedTexts[currentIndex]) {
            animatedTexts[currentIndex].classList.add('active');
        }
        currentIndex = (currentIndex + 1) % animatedTexts.length;
    }

    if (animatedTexts.length > 0) {
        animatedTexts[0].classList.add('active');
        setInterval(rotateText, 2000);
    }

    // Smooth scroll for buttons
    document.querySelectorAll('.hero-buttons button').forEach(button => {
        button.addEventListener('click', function() {
            if (this.textContent.includes('VIEW MORE')) {
                const target = document.querySelector('#projects') || document.querySelector('[id*="project"]');
                if (target) target.scrollIntoView({ behavior: 'smooth' });
            } else if (this.textContent.includes('CONSULTATION')) {
                const target = document.querySelector('#contact') || document.querySelector('[id*="contact"]');
                if (target) target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Duplicate brand logos for seamless loop
    const brandTrack = document.querySelector('.brand-track');
    if (brandTrack) {
        const brands = brandTrack.innerHTML;
        brandTrack.innerHTML = brands + brands;
    }
});
</script>
@endif
