<!-- Your Advice Section -->
<section id="youradvertising" class="py-20 bg-black">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="space-y-8">
                <!-- Main Heading -->
                <div data-aos="fade-left">
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">
                        Your advertising could look like this
                    </h2>
                </div>

                <!-- Subtitle -->
                <div data-aos="fade-down" data-aos-delay="200">
                    <h3 class="text-xl md:text-2xl text-gray-300 leading-relaxed">
                        Discover how we've helped premium brands and creative industries bring their visions to life with stunning and tailored 3D visuals.
                    </h3>
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-4" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('projects') }}"
                       class="inline-flex items-center justify-start px-8 py-4 border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-black transition-all duration-300 transform hover:scale-105 group">
                        <svg class="w-5 h-5 mr-3 transform group-hover:translate-x-1 transition-transform"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span>EXPLORE MORE PROJECTS</span>
                    </a>

                    <a href="#contact"
                       class="inline-flex items-center justify-center px-8 py-4 border-2 border-stepv-primary text-stepv-primary font-semibold rounded-full hover:bg-stepv-primary hover:text-black transition-all duration-300 transform hover:scale-105 hidden sm:inline-flex">
                        CONTACT US
                    </a>
                </div>
            </div>

            <!-- Right Content - Video Grid (Portrait Videos) -->
            <div class="grid grid-cols-2 gap-4 hidden lg:grid h-[600px]">
                <!-- First Video - Portrait -->
                <a href="{{ route('projects') }}"
                   class="relative group overflow-hidden rounded-3xl bg-gray-900 hover:scale-105 transition-transform duration-300 h-full">
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/30"></div>
                    <iframe
                        class="w-full h-full object-cover"
                        src="https://www.youtube-nocookie.com/embed/EZwwRmLAg90?controls=0&rel=0&playsinline=1&cc_load_policy=0&enablejsapi=1&mute=1&autoplay=1&loop=1&playlist=EZwwRmLAg90&start=1"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen
                        title="Oro Bianco | BOIS 1920 | Step V Studio | 3D Animation">
                    </iframe>
                    <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <div class="text-white text-center">
                            <div class="w-16 h-16 mx-auto mb-4 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M19 10a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-lg font-semibold">View Project</p>
                        </div>
                    </div>
                </a>

                <!-- Second Video - Portrait -->
                <a href="{{ route('projects') }}"
                   class="relative group overflow-hidden rounded-3xl bg-gray-900 hover:scale-105 transition-transform duration-300 h-full">
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/30"></div>
                    <iframe
                        class="w-full h-full object-cover"
                        src="https://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1&mute=1&loop=1&playlist=M7lc1UVf-VE&controls=0&showinfo=0&rel=0&iv_load_policy=3&modestbranding=1"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen
                        title="3D Product Animation - Perfume Bottle">
                    </iframe>
                    <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <div class="text-white text-center">
                            <div class="w-16 h-16 mx-auto mb-4 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M19 10a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-lg font-semibold">View Project</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Mobile Video Display -->
            <div class="lg:hidden">
                <div class="grid grid-cols-2 gap-4 h-[400px]">
                    <!-- First Video - Mobile Portrait -->
                    <a href="{{ route('projects') }}"
                       class="relative group overflow-hidden rounded-2xl bg-gray-900 hover:scale-105 transition-transform duration-300 h-full">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/30"></div>
                        <x-video-lazy
                            video-id="EZwwRmLAg90"
                            title="Oro Bianco | BOIS 1920 | Step V Studio | 3D Animation"
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
                        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                            <div class="text-white text-center">
                                <div class="w-12 h-12 mx-auto mb-2 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M19 10a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-sm font-semibold">View</p>
                            </div>
                        </div>
                    </a>

                    <!-- Second Video - Mobile Portrait -->
                    <a href="{{ route('projects') }}"
                       class="relative group overflow-hidden rounded-2xl bg-gray-900 hover:scale-105 transition-transform duration-300 h-full">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/30"></div>
                        <x-video-lazy
                            video-id="M7lc1UVf-VE"
                            title="3D Product Animation - Perfume Bottle"
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
                        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                            <div class="text-white text-center">
                                <div class="w-12 h-12 mx-auto mb-2 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M19 10a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-sm font-semibold">View</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
