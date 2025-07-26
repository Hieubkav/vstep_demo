@extends('layouts.shop')

@section('content')
@php
$filterTabs = [
    ['text' => 'All Projects', 'active' => true],
    ['text' => '3D Visualization'],
    ['text' => '3D Animation'],
    ['text' => 'VFX']
];

$projects = [
    ['route' => 'caron-paris-project', 'image' => 'https://stepv.studio/wp-content/uploads/2024/08/caron-paris-aimez-moi-3d-visualization-stepv-studio-1024x576.jpg', 'title' => 'CARON PARIS - Aimez Moi', 'type' => '3D Visualization', 'desc' => 'Luxury perfume visualization with photorealistic details', 'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z', 'action' => 'View Project'],
    ['route' => 'gdivine-visualization-project', 'image' => 'https://stepv.studio/wp-content/uploads/2024/08/gdivine-babydoll-blush-3d-visualization-stepv-studio-1024x576.jpg', 'title' => 'G\'DIVINE - Baby Doll Blush', 'type' => '3D Visualization', 'desc' => 'Elegant perfume bottle with sophisticated lighting', 'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z', 'action' => 'View Project'],
    ['route' => 'tom-ford-project', 'image' => 'https://stepv.studio/wp-content/uploads/2024/08/vanilla-sex-visualization-stepv-studio-1024x576.jpg', 'title' => 'Vanilla Sex', 'type' => '3D Visualization', 'desc' => 'Luxury fragrance with dramatic lighting effects', 'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z', 'action' => 'View Project'],
    ['route' => 'bois-1920-project', 'image' => 'https://stepv.studio/wp-content/uploads/2024/08/bois-1920-animation-stepv-studio-1024x576.jpg', 'title' => 'BOIS 1920', 'type' => '3D Animation', 'desc' => 'Dynamic perfume bottle animation with fluid effects', 'icon' => 'M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M19 10a9 9 0 11-18 0 9 9 0 0118 0z', 'action' => 'View Animation'],
    ['route' => 'gdivine-animation-project', 'image' => 'https://stepv.studio/wp-content/uploads/2024/08/gdivine-baby-doll-blush-3d-animation-stepv-studio-1024x576.jpg', 'title' => 'G\'DIVINE - Baby Doll Blush', 'type' => '3D Animation', 'desc' => 'Elegant perfume animation with smooth transitions', 'icon' => 'M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M19 10a9 9 0 11-18 0 9 9 0 0118 0z', 'action' => 'View Animation'],
    ['route' => 'hyaluronce-project', 'image' => 'https://stepv.studio/wp-content/uploads/2024/08/hyaluronce-animation-stepv-studio-1024x576.jpg', 'title' => 'HYALURONCE', 'type' => '3D Animation', 'desc' => 'Beauty product animation with scientific precision', 'icon' => 'M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M19 10a9 9 0 11-18 0 9 9 0 0118 0z', 'action' => 'View Animation']
];
@endphp

<section class="pt-32 pb-20 bg-black">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">Our Projects</h1>
            <p class="text-xl text-gray-300 max-w-4xl mx-auto">Explore our portfolio of stunning 3D visualizations and animations for luxury perfume and beauty brands.</p>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="flex justify-center mb-12" data-aos="fade-up">
            <div class="flex flex-wrap justify-center space-x-4 bg-black rounded-lg p-2">
                @foreach($filterTabs as $tab)
                <button class="px-6 py-2 rounded-lg {{ isset($tab['active']) ? 'bg-white text-black font-semibold' : 'text-white hover:bg-gray-800 transition-colors' }} mb-2">{{ $tab['text'] }}</button>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $i => $project)
            <a href="{{ route($project['route']) }}" class="group" data-aos="fade-up" data-aos-delay="{{ ($i + 1) * 100 }}">
                <div class="bg-black rounded-xl overflow-hidden">
                    <div class="aspect-video relative overflow-hidden">
                        <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-all duration-300 flex items-center justify-center">
                            <div class="text-white text-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <div class="w-16 h-16 mx-auto mb-4 bg-white/20 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $project['icon'] }}"></path>
                                    </svg>
                                </div>
                                <p class="text-lg font-semibold">{{ $project['action'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">{{ $project['title'] }}</h3>
                        <p class="text-gray-400 mb-2">{{ $project['type'] }}</p>
                        <p class="text-gray-500 text-sm">{{ $project['desc'] }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-16" data-aos="fade-up">
            <button class="bg-white text-black px-8 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-all transform hover:scale-105">Load More Projects</button>
        </div>
    </div>
</section>

<section class="py-20 bg-black">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6" data-aos="fade-up">Ready to Create Your Next Project?</h2>
        <p class="text-xl text-gray-300 mb-8 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">Let's bring your vision to life with stunning 3D visuals and animations that captivate your audience.</p>
        <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ route('contact-us') }}" class="bg-white text-black px-8 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-all transform hover:scale-105">Start Your Project</a>
            <a href="{{ route('pricing') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-black transition-all transform hover:scale-105">View Pricing</a>
        </div>
    </div>
</section>

@endsection
