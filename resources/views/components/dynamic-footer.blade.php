@php
try {
    $footer = \App\Models\WebDesign::getByKey('footer');
} catch (\Exception $e) {
    $footer = null;
}

// Data mặc định nếu không có trong DB
$data = [
    'company_name' => $footer->content['company_name'] ?? strtoupper(get_site_name()),
    'description' => $footer->content['description'] ?? 'We specialize in crafting photorealistic 3D visuals and animations tailored for the perfumes and beauty industry.',
    'email' => $footer->content['email'] ?? 'contact@stepv.studio',
    'phone' => $footer->content['phone'] ?? '+49-176-21129718',
    'address' => $footer->content['address'] ?? 'Stuttgart, Germany',
    'social_links' => $footer->content['social_links'] ?? [
        ['name' => 'Youtube', 'url' => 'https://www.youtube.com/@StepVStudio', 'icon' => 'fab fa-youtube'],
        ['name' => 'Instagram', 'url' => 'https://www.instagram.com/stepv.studio/', 'icon' => 'fab fa-instagram'],
        ['name' => 'Linkedin', 'url' => 'https://www.linkedin.com/company/step-v-studio/', 'icon' => 'fab fa-linkedin-in']
    ],
    'quick_links' => $footer->content['quick_links'] ?? [
        ['title' => 'Home', 'url' => '/'],
        ['title' => 'Services', 'url' => '/services'],
        ['title' => 'Projects', 'url' => '/projects'],
        ['title' => 'Contact', 'url' => '/contact']
    ],
    'copyright' => $footer->content['copyright'] ?? '© 2024 ' . get_site_name() . '. All rights reserved.',
    'background_color' => $footer->settings['background_color'] ?? 'bg-black',
    'show_section' => $footer->is_active ?? true
];
@endphp

@if($data['show_section'])
<!-- Footer -->
<footer class="{{ $data['background_color'] }} text-white">
    <!-- Top border line -->
    <div class="border-t border-gray-600"></div>

    <div class="container mx-auto px-4 py-16">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-16">
            <!-- Logo Section -->
            <div class="lg:col-span-1">
                <!-- STEP V Logo -->
                <div class="mb-8">
                    <img src="{{ get_site_logo() }}"
                         alt="{{ $data['company_name'] }}"
                         class="w-20 h-20 object-contain">
                </div>

                <!-- Follow Us Section -->
                <div class="mb-8">
                    <h3 class="text-white font-bold text-lg mb-4 tracking-wide">FOLLOW US</h3>
                    <div class="flex space-x-4">
                        @foreach($data['social_links'] as $social)
                        <a href="{{ $social['url'] ?? '#' }}" target="_blank" class="text-stepv-primary hover:text-stepv-primary/80 transition-colors">
                            @if(isset($social['icon']) && str_contains($social['icon'], 'fab fa-'))
                                <i class="{{ $social['icon'] }} text-2xl"></i>
                            @else
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="{{ $social['icon'] ?? 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z' }}"/>
                                </svg>
                            @endif
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Based In Section -->
                <div class="mb-8">
                    <h3 class="text-white font-bold text-lg mb-4 tracking-wide">BASED IN</h3>
                    <div class="text-gray-300 space-y-1">
                        <p>{{ $data['address'] }}</p>
                        <p>Tel: {{ $data['phone'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Our Studio -->
            <div class="relative">
                <div class="absolute left-0 top-0 bottom-0 w-px bg-gray-600"></div>
                <div class="pl-6">
                    <h3 class="text-white font-bold text-lg mb-6 tracking-wide">OUR STUDIO</h3>
                    <ul class="space-y-3">
                        @php
                        $studioLinks = array_slice($data['quick_links'], 0, 5); // Lấy 5 links đầu cho studio
                        @endphp
                        @foreach($studioLinks as $link)
                        <li>
                            <a href="{{ $link['url'] ?? '#' }}" class="text-stepv-primary hover:text-stepv-primary/80 transition-colors uppercase">
                                {{ $link['title'] ?? 'LINK' }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Our Services -->
            <div class="relative">
                <div class="absolute left-0 top-0 bottom-0 w-px bg-gray-600"></div>
                <div class="pl-6">
                    <h3 class="text-white font-bold text-lg mb-6 tracking-wide">OUR SERVICES</h3>
                    <ul class="space-y-3">
                        @php
                        $serviceLinks = [
                            ['title' => 'MARKETING', 'url' => '/services#marketing'],
                            ['title' => 'ARCHITECTURAL VISUALIZATION', 'url' => '/services#architectural'],
                            ['title' => 'ASSET LIBRARY', 'url' => '/services#asset-library'],
                            ['title' => 'COURSES', 'url' => '/services#courses']
                        ];
                        @endphp
                        @foreach($serviceLinks as $service)
                        <li>
                            <a href="{{ $service['url'] }}" class="text-stepv-primary hover:text-stepv-primary/80 transition-colors">
                                {{ $service['title'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- General Terms -->
            <div class="relative">
                <div class="absolute left-0 top-0 bottom-0 w-px bg-gray-600"></div>
                <div class="pl-6">
                    <h3 class="text-white font-bold text-lg mb-6 tracking-wide">GENERAL TERMS</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="/terms" class="text-stepv-primary hover:text-stepv-primary/80 transition-colors">GTCS</a>
                        </li>
                        <li>
                            <a href="/privacy-policy" class="text-stepv-primary hover:text-stepv-primary/80 transition-colors">
                                LEGAL NOTICE & PRIVACY<br>POLICY
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="border-t border-gray-600 pt-12 mb-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Contact Info -->
                <div>
                    <h3 class="text-white font-bold text-lg mb-4 tracking-wide">CONTACT</h3>
                    <div class="text-gray-300 space-y-2">
                        <p>You can contact us at:</p>
                        <a href="mailto:{{ $data['email'] }}" class="text-stepv-primary hover:text-stepv-primary/80 transition-colors">
                            {{ $data['email'] }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-600 pt-8 text-center">
            <p class="text-gray-400 text-sm">
                {{ $data['copyright'] }}
            </p>
        </div>
    </div>
</footer>
@endif
