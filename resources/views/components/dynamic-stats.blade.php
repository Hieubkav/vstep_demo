@php
try {
    $stats = \App\Models\WebDesign::getByKey('stats');
} catch (\Exception $e) {
    $stats = null;
}

// Data mặc định nếu không có trong DB
$data = [
    'stats' => $stats->content['stats'] ?? [
        ['number' => '5+', 'label' => 'Years of Experience', 'delay' => 100],
        ['number' => '100+', 'label' => 'Completed Projects', 'delay' => 200],
        ['number' => '50+', 'label' => 'Supporters Worldwide', 'delay' => 300],
        ['number' => '1000+', 'label' => 'Visuals Rendered', 'delay' => 400]
    ],
    'background_color' => $stats->settings['background_color'] ?? 'bg-gray-900',
    'show_section' => $stats->is_active ?? true
];

// Tính toán grid columns dựa trên số lượng stats
$statsCount = count($data['stats']);
$gridCols = match($statsCount) {
    1 => 'grid-cols-1',
    2 => 'grid-cols-1 md:grid-cols-2',
    3 => 'grid-cols-1 md:grid-cols-3',
    4 => 'grid-cols-2 md:grid-cols-4',
    5 => 'grid-cols-2 md:grid-cols-3 lg:grid-cols-5',
    6 => 'grid-cols-2 md:grid-cols-3 lg:grid-cols-6',
    default => 'grid-cols-2 md:grid-cols-4'
};
@endphp

@if($data['show_section'])
<!-- Stats Section -->
<section id="stats" class="py-20 {{ $data['background_color'] }}">
    <div class="container mx-auto px-4">
        <div class="grid {{ $gridCols }} gap-8 text-center">
            @foreach($data['stats'] as $index => $stat)
            <div data-aos="fade-up" data-aos-delay="{{ $stat['delay'] ?? ($index + 1) * 100 }}">
                <div class="text-4xl md:text-5xl font-bold text-white mb-2">{{ $stat['number'] }}</div>
                <div class="text-gray-400 text-sm md:text-base">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
