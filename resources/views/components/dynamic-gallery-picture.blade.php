@php
try {
    $galleryPicture = \App\Models\WebDesign::getByKey('gallery_picture');
} catch (\Exception $e) {
    $galleryPicture = null;
}

// Data mặc định nếu không có trong DB
$data = [
    'images' => $galleryPicture->content['images'] ?? array_fill(0, 18, [
        'url' => 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?w=600&h=800&fit=crop&crop=center',
        'alt' => 'Luxury Cosmetics'
    ]),
    'animation_duration' => $galleryPicture->settings['animation_duration'] ?? 700,
    'hover_scale' => $galleryPicture->settings['hover_scale'] ?? 1.1,
    'show_section' => $galleryPicture->is_active ?? true
];

// Cấu hình layout gọn gàng cho 3 layers
$layerConfigs = [
    // Layer 1: [rotation, margin, ring, special]
    [['rotate-2',80], ['-rotate-1',50], ['',20,'ring-2 ring-white/20'], ['rotate-1',20,'ring-2 ring-white/20'], ['-rotate-2',50], ['rotate-2',80]],
    // Layer 2:
    [['-rotate-1',60], ['rotate-2',30], ['',0,'ring-2 ring-white/30',true], ['-rotate-1',0,'ring-2 ring-white/30',true], ['rotate-1',30], ['-rotate-2',60]],
    // Layer 3:
    [['rotate-1',40], ['-rotate-2',20], ['',10,'ring-1 ring-white/20'], ['rotate-2',10,'ring-1 ring-white/20'], ['-rotate-1',20], ['rotate-1',40]]
];
@endphp

@if($data['show_section'])
<!-- Gallery Picture Section - Desktop Only -->
<section id="gallery" class="hidden lg:block relative bg-gray-900/80 py-20">
    <!-- 3-Layer Smile Gallery Layout -->
    <div class="w-full px-2">
        @foreach($layerConfigs as $layerIndex => $layerConfig)
        <div class="flex justify-center items-end gap-1 {{ $layerIndex < 2 ? 'mb-4' : '' }}">
            @foreach($layerConfig as $imageIndex => $config)
            @php
                $globalIndex = ($layerIndex * 6) + $imageIndex;
                $image = $data['images'][$globalIndex] ?? $data['images'][0];
                [$rotation, $margin, $ring, $special] = array_pad($config, 4, false);
                $hoverClass = $rotation ? 'hover:rotate-0' : 'hover:scale-105';
            @endphp

            <div class="transform {{ $rotation }} {{ $hoverClass }} transition-all duration-{{ $data['animation_duration'] }} flex-1"
                 style="margin-bottom: {{ $margin }}px;">
                <div class="w-full h-48 md:h-56 lg:h-72 relative group cursor-pointer overflow-hidden rounded-3xl shadow-2xl {{ $ring }}">
                    @php
                        // Xử lý image với cấu trúc mới (image_type) hoặc cũ (url)
                        $imageUrl = null;
                        if (isset($image['image_type']) && $image['image_type'] === 'url' && !empty($image['image_url'])) {
                            $imageUrl = $image['image_url'];
                        } elseif (!empty($image['url'])) {
                            $imageUrl = \App\Helpers\ImageHelper::getImageUrl($image['url']);
                        } else {
                            $imageUrl = 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?w=600&h=800&fit=crop&crop=center';
                        }
                    @endphp
                    <img src="{{ $imageUrl }}" alt="{{ $image['alt'] ?? 'Gallery Image' }}"
                         class="w-full h-full object-cover transition-all duration-{{ $data['animation_duration'] }} group-hover:scale-{{ str_replace('.', '', $data['hover_scale']) }} group-hover:brightness-110"
                         loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                    @if($special)<div class="absolute inset-0 bg-gradient-radial from-transparent via-transparent to-white/5 opacity-50"></div>@endif
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section>

<style>
.bg-gradient-radial {
    background: radial-gradient(circle, var(--tw-gradient-stops));
}

.group-hover\:scale-11:hover {
    transform: scale(1.1);
}

.group-hover\:scale-12:hover {
    transform: scale(1.2);
}

.group-hover\:scale-13:hover {
    transform: scale(1.3);
}

.group-hover\:scale-14:hover {
    transform: scale(1.4);
}

.group-hover\:scale-15:hover {
    transform: scale(1.5);
}
</style>
@endif
