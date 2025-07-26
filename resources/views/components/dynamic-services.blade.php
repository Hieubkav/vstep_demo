@php
try {
    $services = \App\Models\WebDesign::getByKey('services');
} catch (\Exception $e) {
    $services = null;
}

// Data mặc định nếu không có trong DB
$data = [
    'title' => $services->title ?? 'Our Services',
    'subtitle' => $services->subtitle ?? 'Your brand deserves to stand out. At Step V Studio, we help you captivate your audience, boost your sales, and elevate your brand with stunning visuals and animations that leave a lasting impression.',
    'services' => $services->content['services'] ?? [
        [
            'image' => 'https://stepv.studio/wp-content/uploads/2025/03/jomalonewithouttext-min-819x1024.png',
            'title' => 'Photorealism & High-Resolution Visuals',
            'desc' => 'Perfect for print, digital, and interactive displays',
            'icon' => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z',
            'link_url' => '/projects'
        ],
        [
            'image' => 'https://stepv.studio/wp-content/uploads/2025/03/BOIS-1-1024x576.png',
            'title' => '3D Product Animations',
            'desc' => 'Tailored to your product\'s unique story',
            'icon' => 'M18 4l2 4h-3l-2-4h-2l2 4h-3l-2-4H8l2 4H7L5 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4h-4z',
            'link_url' => '/projects'
        ],
        [
            'image' => 'https://stepv.studio/wp-content/uploads/2025/03/BOIS-VFX-2-576x1024.png',
            'title' => 'VFX / AR Production',
            'desc' => 'Add a layer of innovation to your campaigns',
            'icon' => 'M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z',
            'link_url' => '/projects'
        ],
        [
            'image' => 'https://stepv.studio/wp-content/uploads/2025/01/2321-680x1024.png',
            'title' => 'Combinations with Real Film',
            'desc' => 'Seamlessly blend 3D visuals with real footage',
            'icon' => 'M18 3v2h-2V3H8v2H6V3H4v18h2v-2h2v2h8v-2h2v2h2V3h-2zM8 17H6v-2h2v2zm0-4H6v-2h2v2zm0-4H6V7h2v2zm10 8h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V7h2v2z',
            'link_url' => '/projects'
        ],
        [
            'image' => 'https://stepv.studio/wp-content/uploads/2024/08/vlcsnap-2024-08-24-20h27m01s097-576x1024.png',
            'title' => 'TV Commercials',
            'desc' => 'High-impact visuals for broadcast and digital platforms',
            'icon' => 'M21 3H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h5v2h8v-2h5c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 12H3V5h18v10z',
            'link_url' => '/projects'
        ],
        [
            'image' => 'https://stepv.studio/wp-content/uploads/2025/01/pexels-pixabay-164938-1024x620.jpg',
            'title' => 'Music Production & Voice Overs',
            'desc' => 'Complete your visuals with professional audio',
            'icon' => 'M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z',
            'link_url' => '/projects'
        ]
    ],
    'background_color' => $services->settings['background_color'] ?? 'bg-black',
    'show_section' => $services->is_active ?? true
];

// Tính toán grid columns dựa trên số lượng services
$servicesCount = count($data['services']);
$gridCols = match($servicesCount) {
    1 => 'grid-cols-1',
    2 => 'grid-cols-1 md:grid-cols-2',
    3 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
    4 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4',
    5 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5',
    6 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
    default => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3'
};
@endphp

@if($data['show_section'])
<section id="services" class="{{ $data['background_color'] }} text-white py-20 lg:py-32">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-16 lg:mb-20">
      <h2 class="text-4xl md:text-5xl lg:text-6xl font-light uppercase text-white mb-8 tracking-wide animate-fade-in-up">{{ $data['title'] }}</h2>
      <p class="text-lg md:text-xl font-light leading-relaxed text-white/90 text-shadow-lg lg:w-3/5 animate-fade-in-down">{{ $data['subtitle'] }}</p>
    </div>

    <div class="grid {{ $gridCols }} gap-5">
      @foreach($data['services'] as $service)
      <div class="group relative overflow-hidden rounded-3xl bg-gray-900 transition-all duration-500 hover:scale-[1.02]">
        <a href="{{ $service['link_url'] ?? '/projects' }}" class="block relative min-h-[350px] md:min-h-[400px]">
          <div class="absolute inset-0 z-10">
            @php
                // Xử lý image với cấu trúc mới (image_type) hoặc cũ (image)
                $serviceImageUrl = null;
                if (isset($service['image_type']) && $service['image_type'] === 'url' && !empty($service['image_url'])) {
                    $serviceImageUrl = $service['image_url'];
                } elseif (!empty($service['image'])) {
                    $serviceImageUrl = \App\Helpers\ImageHelper::getImageUrl($service['image']);
                } else {
                    $serviceImageUrl = 'https://via.placeholder.com/400x500?text=Service+Image';
                }
            @endphp
            <img src="{{ $serviceImageUrl }}"
                 alt="{{ $service['title'] ?? 'Service' }}"
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
            <div class="absolute inset-0 bg-black/50 transition-opacity duration-700 group-hover:bg-black/20"></div>
          </div>

          <div class="relative z-20 p-8 md:p-10 flex flex-col justify-between h-full min-h-[350px] md:min-h-[400px]">
            <div class="mb-4">
              <div class="w-8 h-8 text-stepv-primary">
                <svg fill="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                  <path d="{{ $service['icon'] ?? 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z' }}"/>
                </svg>
              </div>
            </div>

            <div class="flex-1">
              <h3 class="text-xl md:text-2xl font-light uppercase text-white mb-4 leading-tight">{{ $service['title'] ?? 'Service Title' }}</h3>
              <p class="text-white/90 font-light mb-6 leading-relaxed">{{ $service['desc'] ?? 'Service description' }}</p>
            </div>

            <div class="mt-auto">
              <span class="inline-block border-2 border-white rounded-2xl px-6 py-3 text-sm font-light uppercase text-white transition-all duration-300 hover:bg-white hover:text-black">Learn More</span>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>

<style>
.animate-fade-in-up { animation: fadeInUp 1s ease forwards; }
.animate-fade-in-down { animation: fadeInDown 1s ease forwards; }
.text-shadow-lg { text-shadow: 0 0 10px rgba(0, 0, 0, 0.3); }
@keyframes fadeInUp { from { opacity: 0; transform: translate3d(0, 40px, 0); } to { opacity: 1; transform: translate3d(0, 0, 0); } }
@keyframes fadeInDown { from { opacity: 0; transform: translate3d(0, -40px, 0); } to { opacity: 1; transform: translate3d(0, 0, 0); } }
</style>
@endif
