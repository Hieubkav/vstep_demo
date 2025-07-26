@php
try {
    $stayControl = \App\Models\WebDesign::getByKey('stay_control');
} catch (\Exception $e) {
    $stayControl = null;
}

// Data mặc định nếu không có trong DB
$data = [
    'title' => $stayControl->title ?? 'Stay in Control with Your Client Dashboard',
    'description' => $stayControl->content['description'] ?? 'We\'ve made it easy for you to stay connected and in control!',
    'features' => $stayControl->content['features'] ?? [
        [
            'title' => 'Access All Your Files',
            'description' => 'Easily download your project files, deliverables, and revisions at any time, all in one secure location',
            'icon_svg' => 'M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z',
            'width' => '40%'
        ],
        [
            'title' => 'Track Your Project\'s Progress',
            'description' => 'Stay updated with real-time progress tracking, milestones, and deadlines, so you always know what\'s happening',
            'icon_svg' => 'M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8Z',
            'width' => '60%'
        ],
        [
            'title' => 'Communicate Effortlessly',
            'description' => 'Use the dashboard to send feedback, ask questions, or stay in touch with our team—no endless email chains needed',
            'icon_svg' => 'M20,2H4A2,2 0 0,0 2,4V22L6,18H20A2,2 0 0,0 22,16V4A2,2 0 0,0 20,2M20,16H5.17L4,17.17V4H20V16Z',
            'width' => '60%'
        ],
        [
            'title' => 'Stay Organized for Future Projects',
            'description' => 'Your dashboard serves as a long-term archive, so you can revisit past projects or start new ones without losing any information',
            'icon_svg' => 'M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M19,19H5V5H19V19Z M17,12H7V10H17V12Z M15,16H7V14H15V16Z M17,8H7V6H17V8Z',
            'width' => '40%'
        ]
    ],
    'background_color' => $stayControl->settings['background_color'] ?? 'bg-black',
    'layout' => $stayControl->settings['layout'] ?? 'grid-2x2',
    'show_section' => $stayControl->is_active ?? true
];

// Chia features thành 2 hàng cho layout grid-2x2
$featureRows = [];
if ($data['layout'] === 'grid-2x2') {
    $featureRows = array_chunk($data['features'], 2);
} else if ($data['layout'] === 'single-column') {
    // Tất cả features trong 1 column
    $featureRows = [array_map(function($feature) {
        $feature['width'] = '100%';
        return $feature;
    }, $data['features'])];
} else {
    // Custom layout - giữ nguyên widths
    $featureRows = array_chunk($data['features'], 2);
}

// Convert width percentages to Tailwind classes
function getWidthClass($width) {
    switch($width) {
        case '40%': return 'w-full md:w-[40%]';
        case '60%': return 'w-full md:w-[60%]';
        case '50%': return 'w-full md:w-1/2';
        case '100%': return 'w-full';
        default: return 'w-full md:w-1/2';
    }
}
@endphp

@if($data['show_section'])
<div class="{{ $data['background_color'] }} flex flex-col items-center w-full text-left py-20 box-border">
    <div class="w-full max-w-[1140px] px-4">

        {{-- CLIENT DASHBOARD SECTION --}}
        <div class="w-full flex flex-col p-4 lg:p-[25px] gap-5 box-border">
            <div class="w-full">
                {{-- Tiêu đề --}}
                <div class="mb-[30px] text-left">
                    <h2 class="text-white font-light uppercase text-5xl lg:text-[60.8px] lg:leading-[60.8px]">{{ $data['title'] }}</h2>
                </div>
                {{-- Mô tả --}}
                <div class="w-full lg:w-[60%] text-left">
                    <p class="text-white font-light text-xl leading-[35px] [text-shadow:0_0_10px_rgba(0,0,0,0.3)]">
                        {{ $data['description'] }}
                    </p>
                </div>
            </div>

            {{-- Các thẻ tính năng --}}
            <div class="w-full flex flex-col gap-5 mt-10 mb-[10%] [perspective:1200px]">
                
                @foreach($featureRows as $rowIndex => $featureRow)
                {{-- Hàng {{ $rowIndex + 1 }} --}}
                <div class="flex flex-col md:flex-row gap-5">
                    @foreach($featureRow as $feature)
                    {{-- Card "{{ $feature['title'] ?? 'Feature' }}" --}}
                    <div class="{{ getWidthClass($feature['width'] ?? '50%') }} flex flex-col gap-5 p-6 rounded-[25px] border-[0.8px] border-gray-700 bg-black shadow-2xl transition-all duration-300 hover:shadow-3xl hover:border-stepv-primary/30" style="transform: matrix3d(0.998, -0.001, 0.061, 0, 0, 0.999, 0.019, 0, -0.061, -0.019, 0.997, 0, 0, 0, 0, 1);">
                        <div class="flex items-start gap-4">
                            <svg class="w-7 h-7 text-stepv-primary flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="{{ $feature['icon_svg'] ?? 'M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4Z' }}"/>
                            </svg>
                            <h3 class="text-white font-semibold text-[28px] leading-[28px] uppercase">{{ $feature['title'] ?? 'Feature Title' }}</h3>
                        </div>
                        <p class="text-white font-light text-xl leading-[35px]">{{ $feature['description'] ?? 'Feature description' }}</p>
                    </div>
                    @endforeach
                </div>
                @endforeach

            </div>
        </div>

    </div>
</div>
@endif
