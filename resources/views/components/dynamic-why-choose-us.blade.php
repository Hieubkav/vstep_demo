@php
try {
    $whyChooseUs = \App\Models\WebDesign::getByKey('why_choose_us');
} catch (\Exception $e) {
    $whyChooseUs = null;
}

// Data mặc định nếu không có trong DB
$data = [
    'title' => $whyChooseUs->title ?? 'Why Brands Trust ' . strtoupper(get_site_name()),
    'subtitle' => $whyChooseUs->subtitle ?? 'We specialize in crafting photorealistic 3D visuals and animations tailored for the perfumes and beauty industry.',
    'video_id' => $whyChooseUs->settings['video_id'] ?? 'GXppDZ0k2IM',
    'video_placeholder' => get_webdesign_image(
        $whyChooseUs->settings ?? [],
        'video_placeholder_type',
        'video_placeholder_url',
        'video_placeholder',
        'https://stepv.studio/wp-content/uploads/2025/03/BTSO-1-2.png'
    ),
    'features' => $whyChooseUs->content['features'] ?? [
        ['icon' => 'fa-gem', 'title' => 'Luxury Expertise', 'desc' => 'We specialize in perfumes and beauty, ensuring every detail reflects the sophistication of your brand.'],
        ['icon' => 'fa-cogs', 'title' => 'Tailored Solutions', 'desc' => 'Every project is customized to your unique identity, so your visuals stand out in a crowded market.'],
        ['icon' => 'fa-award', 'title' => 'Proven Quality', 'desc' => 'Our portfolio includes work for premium brands like GAZZAZ, G\'DIVINE and CARON PARIS, showcasing our ability to deliver world-class results.']
    ],
    'section2_title' => $whyChooseUs->content['section2_title'] ?? 'Why 3D Visuals Are the Smart Choice for Your Brand',
    'top_cards' => $whyChooseUs->content['top_cards'] ?? [
        [
            'icon' => 'fa-dollar-sign',
            'title' => 'Cost Efficiency',
            'items' => [
                ['title' => 'Save on Production Costs', 'content' => 'No need for expensive photo shoots, prototypes, or physical setups—our 3D visuals deliver premium results at a fraction of the cost.'],
                ['title' => 'Reusable Assets', 'content' => 'Your 3D visuals can be repurposed across campaigns, saving time and money for future projects.'],
                ['title' => 'Sustainability', 'content' => 'Reduce waste and environmental impact by eliminating the need for physical materials.']
            ]
        ],
        [
            'icon' => 'fa-film',
            'title' => 'Film Studio Quality',
            'items' => [
                ['title' => 'Photorealistic Perfection', 'content' => 'Hyper-detailed textures, stunning lighting, and lifelike materials that rival real-world photography.'],
                ['title' => 'Unmatched Creative Freedom', 'content' => 'Achieve visuals that are impossible in traditional shoots, such as surreal lighting or floating objects.'],
                ['title' => 'Versatility Across Platforms', 'content' => 'From social media to TV commercials, our visuals are optimized for all formats.']
            ]
        ],
        [
            'icon' => 'fa-rocket',
            'title' => 'Speed and Flexibility',
            'items' => [
                ['title' => 'Faster Time-to-Market', 'content' => 'Streamlined workflows ensure your visuals are delivered on time without compromising quality.'],
                ['title' => 'Easy Revisions', 'content' => 'Need changes? Our process is built for flexibility, allowing for quick updates and refinements.']
            ]
        ]
    ],
    'bottom_cards' => $whyChooseUs->content['bottom_cards'] ?? [
        [
            'icon' => 'fa-gem',
            'title' => 'Tailored for Luxury',
            'items' => [
                ['title' => 'Exclusive Focus on Perfumes & Beauty', 'content' => 'Every project is designed to reflect the sophistication and elegance of your brand.'],
                ['title' => 'Collaborative Process', 'content' => 'Work closely with our team to ensure your vision is brought to life exactly as you imagine.']
            ]
        ],
        [
            'icon' => 'fa-lightbulb',
            'title' => 'Future-Proof Solutions',
            'items' => [
                ['title' => 'Scalable Assets', 'content' => '3D visuals grow with your brand, allowing for updates and adaptations as your product line evolves.'],
                ['title' => 'Cutting-Edge Technology', 'content' => 'Stay ahead of the curve with visuals created using the latest 3D rendering techniques.']
            ]
        ]
    ],
    'show_section' => $whyChooseUs->is_active ?? true
];
@endphp

@if($data['show_section'])
<section id="why-choose-us" class="bg-black text-white py-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="mb-16 space-y-8">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-light uppercase text-white leading-tight mb-8 animate-fade-in-up">{{ $data['title'] }}</h2>
            <p class="text-lg md:text-xl font-light leading-relaxed text-gray-300 lg:w-3/5 animate-fade-in-down">{{ $data['subtitle'] }}</p>
            <a href="#process" class="inline-flex items-center gap-3 px-8 py-3 border border-white rounded-2xl text-white text-sm uppercase font-medium hover:bg-white hover:text-black transition-all duration-300 animate-fade-in-left">Learn About our Process</a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
            @php
            $videoPlaceholderUrl = \App\Helpers\ImageHelper::getImageUrl($data['video_placeholder']);
            @endphp
            <div class="relative rounded-3xl overflow-hidden bg-cover bg-center min-h-[600px]" style="background-image: url('{{ $videoPlaceholderUrl }}');">
                <x-video-lazy
                    video-id="{{ $data['video_id'] }}"
                    title="SHOWREEL FOR WEBSITE"
                    :autoplay="true"
                    :mute="true"
                    :loop="true"
                    :controls="false"
                    class="absolute inset-0 w-full h-full object-cover"
                    container-class="absolute inset-0 w-full h-full"
                    loading-class="bg-gradient-to-br from-gray-800 via-gray-900 to-black"
                    placeholder="{{ $videoPlaceholderUrl }}"
                    :threshold="0.3"
                    root-margin="150px"
                />
            </div>

            <div class="border border-gray-800 rounded-3xl p-6 flex flex-col justify-between min-h-[600px] space-y-6">
                @foreach($data['features'] as $feature)
                <div class="bg-gradient-to-r from-black to-gray-700 rounded-3xl p-6 animate-fade-in-left">
                    <div class="flex items-start gap-5 mb-4">
                        <i class="fas {{ $feature['icon'] ?? 'fa-star' }} text-stepv-primary text-3xl"></i>
                        <h3 class="text-white text-2xl font-semibold uppercase">{{ $feature['title'] ?? 'Feature Title' }}</h3>
                    </div>
                    <p class="text-gray-300 text-lg leading-relaxed">{{ $feature['desc'] ?? 'Feature description' }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mb-16">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-light uppercase text-white leading-tight mb-8">{{ $data['section2_title'] }}</h2>
            <a href="#contact" class="inline-flex items-center gap-3 px-8 py-3 border border-white rounded-2xl text-white text-sm uppercase font-medium hover:bg-white hover:text-black transition-all duration-300">Contact Us</a>
        </div>

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 mb-8">
            @foreach ($data['top_cards'] as $cardIndex => $card)
            <div x-data="{ openAccordion: null }" class="flex w-full flex-col gap-5 rounded-3xl border border-gray-800 bg-gradient-to-b from-black to-gray-900 p-6 transition-transform duration-300 hover:scale-[1.02]">
                <div class="flex items-center gap-5">
                    <i class="fas {{ $card['icon'] ?? 'fa-star' }} text-3xl text-stepv-primary"></i>
                    <h3 class="text-2xl font-semibold uppercase text-white">{{ $card['title'] ?? 'Card Title' }}</h3>
                </div>

                <div class="flex flex-col">
                    @foreach ($card['items'] ?? [] as $itemIndex => $item)
                    <div class="border-t border-white/20 first:border-t-0">
                        <div @click="openAccordion = (openAccordion === {{ $itemIndex }}) ? null : {{ $itemIndex }}" class="flex cursor-pointer items-center justify-between py-4">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-chevron-right text-stepv-primary text-sm"></i>
                                <span class="text-lg font-light text-white transition-colors duration-300" :class="{ '!text-stepv-primary': openAccordion === {{ $itemIndex }} }">{{ $item['title'] ?? 'Item Title' }}</span>
                            </div>
                            <span class="text-lg text-white transition-colors duration-300" :class="{ '!text-stepv-primary': openAccordion === {{ $itemIndex }} }">
                                <i class="fas fa-minus" x-show="openAccordion === {{ $itemIndex }}" x-cloak></i>
                                <i class="fas fa-plus" x-show="openAccordion !== {{ $itemIndex }}" x-cloak></i>
                            </span>
                        </div>
                        <div x-show="openAccordion === {{ $itemIndex }}" x-collapse x-cloak>
                            <div class="px-1 pb-4 font-light leading-relaxed text-gray-300 ml-6">{{ $item['content'] ?? 'Item content' }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
            @foreach ($data['bottom_cards'] as $cardIndex => $card)
            <div x-data="{ openAccordion: null }" class="flex w-full flex-col gap-5 rounded-3xl border border-gray-800 bg-gradient-to-b from-black to-gray-900 p-6 transition-transform duration-300 hover:scale-[1.02]">
                <div class="flex items-center gap-5">
                    <i class="fas {{ $card['icon'] ?? 'fa-star' }} text-3xl text-stepv-primary"></i>
                    <h3 class="text-2xl font-semibold uppercase text-white">{{ $card['title'] ?? 'Card Title' }}</h3>
                </div>

                <div class="flex flex-col">
                    @foreach ($card['items'] ?? [] as $itemIndex => $item)
                    <div class="border-t border-white/20 first:border-t-0">
                        <div @click="openAccordion = (openAccordion === {{ $itemIndex }}) ? null : {{ $itemIndex }}" class="flex cursor-pointer items-center justify-between py-4">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-chevron-right text-stepv-primary text-sm"></i>
                                <span class="text-lg font-light text-white transition-colors duration-300" :class="{ '!text-stepv-primary': openAccordion === {{ $itemIndex }} }">{{ $item['title'] ?? 'Item Title' }}</span>
                            </div>
                            <span class="text-lg text-white transition-colors duration-300" :class="{ '!text-stepv-primary': openAccordion === {{ $itemIndex }} }">
                                <i class="fas fa-minus" x-show="openAccordion === {{ $itemIndex }}" x-cloak></i>
                                <i class="fas fa-plus" x-show="openAccordion !== {{ $itemIndex }}" x-cloak></i>
                            </span>
                        </div>
                        <div x-show="openAccordion === {{ $itemIndex }}" x-collapse x-cloak>
                            <div class="px-1 pb-4 font-light leading-relaxed text-gray-300 ml-6">{{ $item['content'] ?? 'Item content' }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.animate-fade-in-up { animation: fadeInUp 0.8s ease-out; }
.animate-fade-in-down { animation: fadeInDown 0.8s ease-out; }
.animate-fade-in-left { animation: fadeInLeft 0.8s ease-out; }
[x-cloak] { display: none !important; }
@keyframes fadeInUp { from { opacity: 0; transform: translate3d(0, 40px, 0); } to { opacity: 1; transform: translate3d(0, 0, 0); } }
@keyframes fadeInDown { from { opacity: 0; transform: translate3d(0, -40px, 0); } to { opacity: 1; transform: translate3d(0, 0, 0); } }
@keyframes fadeInLeft { from { opacity: 0; transform: translate3d(-40px, 0, 0); } to { opacity: 1; transform: translate3d(0, 0, 0); } }
</style>
@endif
