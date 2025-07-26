@php
try {
    $yourAdvice = \App\Models\WebDesign::getByKey('your_advice');
} catch (\Exception $e) {
    $yourAdvice = null;
}

// Data mặc định nếu không có trong DB
$data = [
    'title' => $yourAdvice->title ?? 'Your advertising could look like this',
    'subtitle' => $yourAdvice->subtitle ?? 'Discover how we\'ve helped premium brands and creative industries bring their visions to life with stunning and tailored 3D visuals.',
    'buttons' => $yourAdvice->content['buttons'] ?? [
        ['text' => 'EXPLORE MORE PROJECTS', 'url' => '/projects', 'style' => 'primary'],
        ['text' => 'CONTACT US', 'url' => '#contact', 'style' => 'secondary']
    ],
    'videos' => $yourAdvice->content['videos'] ?? [
        ['video_id' => 'EZwwRmLAg90', 'title' => 'Oro Bianco | BOIS 1920 | ' . get_site_name() . ' | 3D Animation', 'link_url' => '/projects'],
        ['video_id' => 'M7lc1UVf-VE', 'title' => '3D Product Animation - Perfume Bottle', 'link_url' => '/projects']
    ],
    'desktop_height' => $yourAdvice->settings['desktop_video_height'] ?? 600,
    'mobile_height' => $yourAdvice->settings['mobile_video_height'] ?? 400,
    'show_section' => $yourAdvice->is_active ?? true
];

// Button styles configuration
$buttonStyles = [
    'primary' => 'border-white text-white hover:bg-white hover:text-black',
    'secondary' => 'border-stepv-primary text-stepv-primary hover:bg-stepv-primary hover:text-black'
];
@endphp

@if($data['show_section'])
<!-- Your Advice Section -->
<section id="your-advice" class="py-20 bg-black">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="space-y-8">
                <!-- Main Heading -->
                <div data-aos="fade-left">
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">
                        {{ $data['title'] }}
                    </h2>
                </div>

                <!-- Subtitle -->
                <div data-aos="fade-down" data-aos-delay="200">
                    <h3 class="text-xl md:text-2xl text-gray-300 leading-relaxed">
                        {{ $data['subtitle'] }}
                    </h3>
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-4" data-aos="fade-up" data-aos-delay="400">
                    @foreach($data['buttons'] as $index => $button)
                    <a href="{{ $button['url'] }}"
                       class="inline-flex items-center {{ $button['style'] === 'primary' ? 'justify-start' : 'justify-center' }} px-8 py-4 border-2 {{ $buttonStyles[$button['style']] }} font-semibold rounded-full transition-all duration-300 transform hover:scale-105 group {{ $button['style'] === 'secondary' ? 'hidden sm:inline-flex' : '' }}">
                        @if($button['style'] === 'primary')
                        <svg class="w-5 h-5 mr-3 transform group-hover:translate-x-1 transition-transform"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        @endif
                        <span>{{ $button['text'] }}</span>
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Video Grid - Desktop & Mobile -->
            @foreach(['lg:grid hidden' => $data['desktop_height'], 'lg:hidden' => $data['mobile_height']] as $gridClass => $height)
            <div class="{{ $gridClass }}">
                <div class="grid grid-cols-2 gap-4" style="height: {{ $height }}px;">
                    @foreach($data['videos'] as $video)
                    <a href="{{ $video['link_url'] }}" class="relative group overflow-hidden {{ str_contains($gridClass, 'lg:hidden') ? 'rounded-2xl' : 'rounded-3xl' }} bg-gray-900 hover:scale-105 transition-transform duration-300 h-full">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/30"></div>

                        @if(str_contains($gridClass, 'lg:hidden'))
                        <x-video-lazy video-id="{{ $video['video_id'] }}" title="{{ $video['title'] }}" :autoplay="true" :mute="true" :loop="true" :controls="false" :start="1"
                                      class="w-full h-full object-cover" container-class="w-full h-full" loading-class="bg-gradient-to-br from-gray-800 to-gray-900" :threshold="0.2" root-margin="100px" />
                        @else
                        <iframe class="w-full h-full object-cover" src="https://www.youtube-nocookie.com/embed/{{ $video['video_id'] }}?controls=0&rel=0&playsinline=1&cc_load_policy=0&enablejsapi=1&mute=1&autoplay=1&loop=1&playlist={{ $video['video_id'] }}&start=1"
                                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen title="{{ $video['title'] }}"></iframe>
                        @endif

                        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                            <div class="text-white text-center">
                                <div class="{{ str_contains($gridClass, 'lg:hidden') ? 'w-12 h-12 mb-2' : 'w-16 h-16 mb-4' }} mx-auto bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                    <svg class="{{ str_contains($gridClass, 'lg:hidden') ? 'w-6 h-6' : 'w-8 h-8' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M19 10a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="{{ str_contains($gridClass, 'lg:hidden') ? 'text-sm' : 'text-lg' }} font-semibold">{{ str_contains($gridClass, 'lg:hidden') ? 'View' : 'View Project' }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
