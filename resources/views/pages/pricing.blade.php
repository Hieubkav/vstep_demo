@extends('layouts.shop')

@section('content')

<!-- Pricing Hero Section -->
<section class="pt-32 pb-20 bg-black">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
                Pricing
            </h1>
            <p class="text-xl text-gray-300 max-w-4xl mx-auto">
                Transparent pricing for world-class 3D visualizations and animations. Choose the package that fits your project needs.
            </p>
        </div>
    </div>
</section>

<!-- Pricing Cards -->
<section class="py-20 bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Basic Package -->
            <div class="bg-black rounded-xl p-8 border border-gray-800 relative" data-aos="fade-up" data-aos-delay="100">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-white mb-4">Basic Visualization</h3>
                    <div class="text-4xl font-bold text-white mb-2">€1,500</div>
                    <p class="text-gray-400">Starting price</p>
                </div>
                
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-stepv-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Single product visualization
                    </li>
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-stepv-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        3 high-resolution renders
                    </li>
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-stepv-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Basic lighting setup
                    </li>
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        2 revision rounds
                    </li>
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        7-day delivery
                    </li>
                </ul>
                
                <a href="{{ route('contact-us') }}" class="w-full bg-white text-black px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-colors text-center block">
                    Get Started
                </a>
            </div>

            <!-- Premium Package -->
            <div class="bg-black rounded-xl p-8 border-2 border-purple-500 relative" data-aos="fade-up" data-aos-delay="200">
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                    <span class="bg-purple-500 text-white px-4 py-1 rounded-full text-sm font-semibold">Most Popular</span>
                </div>
                
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-white mb-4">Premium Visualization</h3>
                    <div class="text-4xl font-bold text-white mb-2">€3,500</div>
                    <p class="text-gray-400">Starting price</p>
                </div>
                
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Multiple product angles
                    </li>
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        8 high-resolution renders
                    </li>
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Advanced lighting & materials
                    </li>
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Custom environment
                    </li>
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        4 revision rounds
                    </li>
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        10-day delivery
                    </li>
                </ul>
                
                <a href="{{ route('contact-us') }}" class="w-full bg-purple-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-600 transition-colors text-center block">
                    Get Started
                </a>
            </div>

            <!-- Animation Package -->
            <div class="bg-black rounded-xl p-8 border border-gray-800 relative" data-aos="fade-up" data-aos-delay="300">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-white mb-4">3D Animation</h3>
                    <div class="text-4xl font-bold text-white mb-2">€5,500</div>
                    <p class="text-gray-400">Starting price</p>
                </div>
                
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        15-30 second animation
                    </li>
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        4K resolution output
                    </li>
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Dynamic camera movements
                    </li>
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Professional sound design
                    </li>
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        3 revision rounds
                    </li>
                    <li class="flex items-center text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        14-day delivery
                    </li>
                </ul>
                
                <a href="{{ route('contact-us') }}" class="w-full bg-white text-black px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-colors text-center block">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Custom Solutions -->
<section class="py-20 bg-black">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6" data-aos="fade-up">
                Need Something Custom?
            </h2>
            <p class="text-xl text-gray-300 mb-8" data-aos="fade-up" data-aos-delay="200">
                Every project is unique. We offer custom solutions tailored to your specific needs, timeline, and budget.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Flexible Timeline</h3>
                    <p class="text-gray-400">Rush orders and extended projects available</p>
                </div>
                
                <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Scalable Solutions</h3>
                    <p class="text-gray-400">From single renders to complete campaigns</p>
                </div>
                
                <div class="text-center" data-aos="fade-up" data-aos-delay="500">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Dedicated Support</h3>
                    <p class="text-gray-400">Personal project manager for large projects</p>
                </div>
            </div>
            
            <a href="{{ route('contact-us') }}" class="bg-white text-black px-8 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-all transform hover:scale-105" data-aos="fade-up" data-aos-delay="600">
                Discuss Your Project
            </a>
        </div>
    </div>
</section>

@endsection
