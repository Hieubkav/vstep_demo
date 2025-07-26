@php
try {
    $wordSlider = \App\Models\WebDesign::getByKey('word_slider');
} catch (\Exception $e) {
    $wordSlider = null;
}

// Data mặc định nếu không có trong DB
$data = [
    'words' => $wordSlider->content['words'] ?? ['EMPOWER', 'ELEVATE', 'ENCHANT'],
    'repeat_count' => $wordSlider->content['repeat_count'] ?? 4,
    'animation_speed' => $wordSlider->settings['animation_speed'] ?? 20,
    'spacing' => $wordSlider->settings['spacing'] ?? 8,
    'show_section' => $wordSlider->is_active ?? true
];

// Tạo array words lặp lại
$repeatedWords = array_fill(0, $data['repeat_count'], $data['words']);
$repeatedWords = array_merge(...$repeatedWords);
@endphp

@if($data['show_section'])
<!-- Word Slider Section -->
<section id="word-slider" class="relative overflow-hidden bg-black py-16">
    <!-- First Row - Black Background with White Text -->
    <div class="relative">
        <div class="flex animate-slide-right whitespace-nowrap">
            <div class="flex items-center space-x-{{ $data['spacing'] }} text-white text-4xl md:text-6xl lg:text-8xl font-bold">
                @foreach($repeatedWords as $word)
                <span>{{ $word }}</span>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Second Row - White Background with Black Text -->
    <div class="relative bg-white mt-4">
        <div class="flex animate-slide-left whitespace-nowrap">
            <div class="flex items-center space-x-{{ $data['spacing'] }} text-black text-4xl md:text-6xl lg:text-8xl font-bold">
                @foreach($repeatedWords as $word)
                <span>{{ $word }}</span>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
@keyframes slide-right {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(0%);
    }
}

@keyframes slide-left {
    0% {
        transform: translateX(0%);
    }
    100% {
        transform: translateX(-100%);
    }
}

.animate-slide-right {
    animation: slide-right {{ $data['animation_speed'] }}s linear infinite;
}

.animate-slide-left {
    animation: slide-left {{ $data['animation_speed'] }}s linear infinite;
}

/* Responsive text sizes */
@media (max-width: 768px) {
    .text-4xl {
        font-size: 2rem;
    }
}

@media (min-width: 769px) and (max-width: 1024px) {
    .text-6xl {
        font-size: 3.5rem;
    }
}

@media (min-width: 1025px) {
    .text-8xl {
        font-size: 6rem;
    }
}
</style>
@endif
