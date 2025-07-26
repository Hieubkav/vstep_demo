@extends('layouts.shop')

@section('content')
@php
$storyContent = [
    'Founded in Stuttgart, Germany, ' . get_site_name() . ' was born from a desire to transform bold ideas into stunning 3D visuals and animations. What began as a dream to push the boundaries of 3D design has evolved into a trusted creative partner for premium brands and visionaries worldwide.',
    'We specialize in crafting photorealistic 3D visuals and animations tailored for the perfumes and beauty industry. Our expertise helps luxury brands captivate their audiences, elevate product presentations, and stand out in a competitive market.',
    'Every project we take on is a collaboration—your vision, brought to life through our expertise. We believe that great results come from a well-structured and transparent workflow that keeps you informed and involved every step of the way.'
];

$values = [
    ['icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z', 'title' => 'Excellence', 'desc' => 'We strive for perfection in every detail, ensuring that each project meets the highest standards of quality and craftsmanship.', 'gradient' => 'from-purple-500 to-pink-500'],
    ['icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'title' => 'Innovation', 'desc' => 'We embrace cutting-edge technology and creative approaches to deliver visuals that push the boundaries of what\'s possible.', 'gradient' => 'from-blue-500 to-cyan-500'],
    ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'title' => 'Partnership', 'desc' => 'We believe in true collaboration, working closely with our clients to understand their vision and bring it to life.', 'gradient' => 'from-stepv-primary to-stepv-success']
];

$clientLogos = [
    ['name' => 'WN', 'gradient' => 'from-red-500 to-pink-500'],
    ['name' => 'DNA', 'gradient' => 'from-blue-500 to-cyan-500'],
    ['name' => 'G\'D', 'gradient' => 'from-purple-500 to-pink-500'],
    ['name' => 'HYA', 'gradient' => 'from-stepv-primary to-stepv-success'],
    ['name' => 'FIV', 'gradient' => 'from-orange-500 to-red-500'],
    ['name' => 'TDA', 'gradient' => 'from-indigo-500 to-purple-500'],
    ['name' => 'GAZ', 'gradient' => 'from-yellow-500 to-orange-500'],
    ['name' => 'SDV', 'gradient' => 'from-stepv-success to-stepv-primary'],
    ['name' => 'CAR', 'gradient' => 'from-pink-500 to-rose-500']
];
@endphp

<section class="pt-32 pb-20 bg-black">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">About Us</h1>
            <p class="text-xl text-gray-300 max-w-4xl mx-auto">Turning Passion into Perfection. At {{ get_site_name() }}, everything we create starts with a passion for storytelling and innovation.</p>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-8">Our Story</h2>
                    <div class="space-y-6 text-gray-300 text-lg leading-relaxed">
                        @foreach($storyContent as $paragraph)
                        <p>{{ $paragraph }}</p>
                        @endforeach
                    </div>
                </div>

                <div data-aos="fade-left">
                    <div class="aspect-square bg-gradient-to-br from-purple-600 to-pink-600 rounded-xl flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-32 h-32 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                            <h3 class="text-3xl font-bold">Create. Captivate. Convert.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-black">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-center lg:text-left" data-aos="fade-right">
                    <div class="w-64 h-64 mx-auto lg:mx-0 bg-gradient-to-br from-purple-600 to-pink-600 rounded-full flex items-center justify-center mb-6">
                        <div class="w-56 h-56 bg-gray-800 rounded-full flex items-center justify-center">
                            <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-left">
                    <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">VASILII GUREV</h3>
                    <p class="text-xl text-purple-400 mb-6 font-semibold">CEO & FOUNDER OF {{ strtoupper(get_site_name()) }}</p>
                    <div class="space-y-4 text-gray-300 leading-relaxed">
                        <p>With years of experience in 3D visualization and a passion for perfection, Vasilii founded {{ get_site_name() }} to bridge the gap between creative vision and technical excellence. His dedication to innovation and quality has made {{ get_site_name() }} a trusted partner for luxury brands worldwide.</p>
                        <blockquote class="text-gray-400 italic border-l-4 border-purple-500 pl-4">"Every project is an opportunity to create something extraordinary. We don't just deliver visuals; we craft experiences that resonate with audiences and elevate brands to new heights."</blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold text-white text-center mb-16" data-aos="fade-up">Our Values</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($values as $i => $value)
                <div class="text-center" data-aos="fade-up" data-aos-delay="{{ ($i + 1) * 100 }}">
                    <div class="w-20 h-20 bg-gradient-to-br {{ $value['gradient'] }} rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $value['icon'] }}"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">{{ $value['title'] }}</h3>
                    <p class="text-gray-400">{{ $value['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-black">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-white text-center mb-12" data-aos="fade-up">Trusted by Premium Brands</h2>

            <div class="grid grid-cols-3 md:grid-cols-6 lg:grid-cols-9 gap-8 items-center opacity-60" data-aos="fade-up" data-aos-delay="200">
                @foreach($clientLogos as $logo)
                <div class="w-16 h-16 bg-gradient-to-br {{ $logo['gradient'] }} rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-xs">{{ $logo['name'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-900">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6" data-aos="fade-up">Give us a Spark and we'll ignite the Flame</h2>
        <p class="text-xl text-gray-400 mb-8 italic" data-aos="fade-up" data-aos-delay="200">Like Johnny Cash said - "and the flames went higher"</p>

        <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ route('contact-us') }}" class="bg-white text-black px-8 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-all transform hover:scale-105">CONTACT US</a>
            <a href="{{ route('projects') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-black transition-all transform hover:scale-105">VIEW OUR WORK</a>
        </div>
    </div>
</section>

@endsection
