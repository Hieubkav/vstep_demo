@extends('layouts.shop')

@section('content')

<!-- Project Hero Section -->
<section class="pt-32 pb-20 bg-black">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
                CARON PARIS
            </h1>
            <h2 class="text-2xl md:text-3xl text-gray-300 mb-4">
                Aimez Moi - 3D Visualization
            </h2>
            <p class="text-xl text-gray-400 max-w-4xl mx-auto">
                Luxury perfume visualization with photorealistic details and sophisticated lighting
            </p>
        </div>
    </div>
</section>

<!-- Project Image -->
<section class="py-20 bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto" data-aos="fade-up">
            <div class="aspect-video rounded-xl overflow-hidden">
                <img src="https://stepv.studio/wp-content/uploads/2024/08/caron-paris-aimez-moi-3d-visualization-stepv-studio-1024x576.jpg" 
                     alt="CARON PARIS - Aimez Moi 3D Visualization" 
                     class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Project Details -->
<section class="py-20 bg-black">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Project Info -->
                <div data-aos="fade-right">
                    <h3 class="text-3xl font-bold text-white mb-6">Project Details</h3>
                    <div class="space-y-4">
                        <div>
                            <h4 class="text-white font-semibold mb-2">Client</h4>
                            <p class="text-gray-400">CARON PARIS</p>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold mb-2">Project Type</h4>
                            <p class="text-gray-400">3D Product Visualization</p>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold mb-2">Industry</h4>
                            <p class="text-gray-400">Luxury Perfumes</p>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold mb-2">Year</h4>
                            <p class="text-gray-400">2024</p>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold mb-2">Services</h4>
                            <p class="text-gray-400">3D Modeling, Texturing, Lighting, Rendering</p>
                        </div>
                    </div>
                </div>

                <!-- Project Description -->
                <div data-aos="fade-left">
                    <h3 class="text-3xl font-bold text-white mb-6">About This Project</h3>
                    <div class="space-y-4 text-gray-300">
                        <p>
                            For CARON PARIS, we created a stunning 3D visualization of their iconic "Aimez Moi" perfume bottle. This project showcases the elegance and sophistication of the luxury fragrance through photorealistic rendering techniques.
                        </p>
                        <p>
                            Our team focused on capturing every intricate detail of the bottle design, from the delicate curves to the premium materials. The lighting setup was carefully crafted to enhance the luxurious feel while maintaining the brand's sophisticated aesthetic.
                        </p>
                        <p>
                            The final visualization serves as a powerful marketing asset that can be used across various platforms, from digital advertising to print materials, providing CARON PARIS with versatile content for their campaigns.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technical Highlights -->
<section class="py-20 bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-3xl md:text-4xl font-bold text-white text-center mb-16" data-aos="fade-up">
                Technical Highlights
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-white mb-2">Photorealistic Rendering</h4>
                    <p class="text-gray-400">Ultra-high quality rendering with realistic materials and lighting</p>
                </div>

                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-white mb-2">Advanced Lighting</h4>
                    <p class="text-gray-400">Sophisticated lighting setup to enhance luxury appeal</p>
                </div>

                <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-gradient-to-br from-stepv-primary to-stepv-success rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-white mb-2">Premium Materials</h4>
                    <p class="text-gray-400">Detailed material work capturing glass, metal, and liquid textures</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
<section class="py-20 bg-black">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-3xl md:text-4xl font-bold text-white text-center mb-16" data-aos="fade-up">
                Related Projects
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- G'DIVINE Project -->
                <a href="{{ route('gdivine-visualization-project') }}" class="group" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-gray-900 rounded-xl overflow-hidden">
                        <div class="aspect-video relative overflow-hidden">
                            <img src="https://stepv.studio/wp-content/uploads/2024/08/gdivine-babydoll-blush-3d-visualization-stepv-studio-1024x576.jpg" 
                                 alt="G'DIVINE - Baby Doll Blush 3D Visualization" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-white mb-2">G'DIVINE - Baby Doll Blush</h4>
                            <p class="text-gray-400">3D Visualization</p>
                        </div>
                    </div>
                </a>

                <!-- TOM FORD Project -->
                <a href="{{ route('tom-ford-project') }}" class="group" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-gray-900 rounded-xl overflow-hidden">
                        <div class="aspect-video relative overflow-hidden">
                            <img src="https://stepv.studio/wp-content/uploads/2024/08/vanilla-sex-visualization-stepv-studio-1024x576.jpg" 
                                 alt="Vanilla Sex Visualization" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-white mb-2">Vanilla Sex</h4>
                            <p class="text-gray-400">3D Visualization</p>
                        </div>
                    </div>
                </a>

                <!-- BOIS 1920 Project -->
                <a href="{{ route('bois-1920-project') }}" class="group" data-aos="fade-up" data-aos-delay="300">
                    <div class="bg-gray-900 rounded-xl overflow-hidden">
                        <div class="aspect-video relative overflow-hidden">
                            <img src="https://stepv.studio/wp-content/uploads/2024/08/bois-1920-animation-stepv-studio-1024x576.jpg" 
                                 alt="BOIS 1920 Animation" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-white mb-2">BOIS 1920</h4>
                            <p class="text-gray-400">3D Animation</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-900">
    <div class="container mx-auto px-4 text-center">
        <h3 class="text-4xl md:text-5xl font-bold text-white mb-6" data-aos="fade-up">
            Ready to Create Your Project?
        </h3>
        <p class="text-xl text-gray-300 mb-8 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Let's bring your vision to life with stunning 3D visuals that captivate your audience.
        </p>
        <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ route('contact-us') }}" class="bg-white text-black px-8 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-all transform hover:scale-105">
                Start Your Project
            </a>
            <a href="{{ route('projects') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-black transition-all transform hover:scale-105">
                View All Projects
            </a>
        </div>
    </div>
</section>

@endsection
