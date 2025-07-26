@php
try {
    $weWork = \App\Models\WebDesign::getByKey('we_work');
} catch (\Exception $e) {
    $weWork = null;
}

// Data mặc định nếu không có trong DB
$data = [
    'title' => $weWork->title ?? 'How We Work',
    'description' => $weWork->content['description'] ?? 'At ' . get_site_name() . ', we believe that great results come from a well-structured and transparent workflow. That\'s why we\'ve designed a process that keeps you informed and involved every step of the way.',
    'button_text' => $weWork->content['button_text'] ?? 'Start your project today',
    'button_url' => $weWork->content['button_url'] ?? '#contact',
    'steps' => $weWork->content['steps'] ?? [
        ['title' => 'Kick-Off & Planning', 'description' => 'We begin with a free consultation to understand your vision, goals, and requirements.', 'icon' => 'fa-flag-checkered'],
        ['title' => 'Concept Development', 'description' => 'We create initial concepts and sketches, ensuring alignment with your brand and vision.', 'icon' => 'fa-lightbulb'],
        ['title' => 'Design & Modeling', 'description' => 'Our team creates detailed 3D models and designs based on approved concepts.', 'icon' => 'fa-palette'],
        ['title' => 'Review & Feedback', 'description' => 'You review the work and provide feedback for any necessary adjustments.', 'icon' => 'fa-eye'],
        ['title' => 'Final Production', 'description' => 'We finalize the project with high-quality rendering and post-production.', 'icon' => 'fa-magic'],
        ['title' => 'Delivery & Launch', 'description' => 'Your project is delivered in all required formats, ready for launch.', 'icon' => 'fa-rocket']
    ],
    'background_color' => $weWork->settings['background_color'] ?? 'bg-black',
    'layout' => $weWork->settings['layout'] ?? '2-columns',
    'show_section' => $weWork->is_active ?? true
];

// Layout classes
$containerClass = $data['layout'] === '1-column' ? 'flex-col' : 'md:flex-row';
$leftColumnClass = $data['layout'] === '1-column' ? 'w-full' : 'w-full md:w-1/2';
$rightColumnClass = $data['layout'] === '1-column' ? 'w-full' : 'w-full md:w-1/2';

// Step positions (6 steps around circle)
$stepPositions = [
    1 => ['top' => '0', 'left' => '50%', 'transform' => 'translate(-50%, -50%)'],
    2 => ['top' => '25%', 'left' => '93%', 'transform' => 'translate(-50%, -50%)'],
    3 => ['top' => '75%', 'left' => '93%', 'transform' => 'translate(-50%, -50%)'],
    4 => ['top' => '100%', 'left' => '50%', 'transform' => 'translate(-50%, -50%)'],
    5 => ['top' => '75%', 'left' => '7%', 'transform' => 'translate(-50%, -50%)'],
    6 => ['top' => '25%', 'left' => '7%', 'transform' => 'translate(-50%, -50%)']
];

$uniqueId = 'we-work-' . uniqid();
@endphp

@if($data['show_section'])
<section id="we-work" class="{{ $data['background_color'] }} flex flex-col relative w-full text-left transition-all duration-300">
    <div class="w-full max-w-[1140px] mx-auto flex flex-col gap-5">
        <div class="w-full flex flex-col {{ $containerClass }} items-center p-[25px] gap-10 box-border">

            {{-- Cột bên trái: Văn bản giới thiệu --}}
            <div class="{{ $leftColumnClass }} flex flex-col gap-5 text-left">
                {{-- Tiêu đề chính --}}
                <div class="mb-[30px]">
                    <h2 class="text-white font-light uppercase text-5xl lg:text-[60.8px] lg:leading-[60.8px]">
                        <span>{{ $data['title'] }}</span>
                    </h2>
                </div>
                
                {{-- Đoạn mô tả --}}
                <div>
                    <h2 class="text-white font-light text-xl leading-[35px] [text-shadow:0_0_10px_rgba(0,0,0,0.3)]">
                        <span>{{ $data['description'] }}</span>
                    </h2>
                </div>
                
                {{-- Nút bấm --}}
                <div class="pt-5">
                    <a href="{{ $data['button_url'] }}" class="inline-block uppercase cursor-pointer text-stepv-primary border-[1.6px] border-solid border-stepv-primary rounded-[15px] px-[30px] py-[10px] text-[15px] leading-[15px] transition-all duration-300 hover:bg-stepv-primary hover:text-black">
                        <span class="flex items-center justify-center gap-3">
                            <span>{{ $data['button_text'] }}</span>
                        </span>
                    </a>
                </div>
            </div>

            {{-- Cột bên phải: Sơ đồ vòng tròn tương tác --}}
            <div class="{{ $rightColumnClass }} flex justify-center items-center py-10">
                <div class="relative w-[300px] h-[300px] sm:w-[400px] sm:h-[400px] lg:w-[500px] lg:h-[500px] rounded-full border-[1.6px] border-solid border-stepv-primary my-[45px]" data-we-work-id="{{ $uniqueId }}">
                    
                    {{-- NỘI DUNG HIỂN THỊ Ở GIỮA --}}
                    @foreach($data['steps'] as $index => $step)
                    <div id="content-step-{{ $index + 1 }}-{{ $uniqueId }}" class="interactive-content {{ $index === 0 ? 'active opacity-100 visible' : 'opacity-0 invisible' }} flex flex-col justify-center items-center text-center absolute inset-0 rounded-full p-10 lg:p-[75px] transition-opacity duration-300">
                        <div class="mb-2 text-stepv-primary text-3xl lg:text-5xl">
                            <i class="fa {{ $step['icon'] ?? 'fa-star' }}"></i>
                        </div>
                        <h3 class="text-stepv-primary text-lg lg:text-[25px] uppercase leading-tight lg:leading-[37.5px]">{{ $step['title'] ?? 'Step Title' }}</h3>
                        <p class="text-white font-light text-sm leading-[21px] mt-2">{{ $step['description'] ?? 'Step description' }}</p>
                    </div>
                    @endforeach

                    {{-- CÁC NÚT BẤM "STEP" ĐƯỢC ĐỊNH VỊ XUNG QUANH --}}
                    @foreach($data['steps'] as $index => $step)
                    @php
                        $stepNum = $index + 1;
                        $position = $stepPositions[$stepNum] ?? $stepPositions[1];
                    @endphp
                    <div class="step-dot {{ $index === 0 ? 'active' : '' }}"
                         data-step="{{ $stepNum }}"
                         onclick="showStepWeWork{{ $uniqueId }}({{ $stepNum }})"
                         style="position: absolute; top: {{ $position['top'] }}; left: {{ $position['left'] }}; transform: {{ $position['transform'] }}; width: 80px; height: 80px; cursor: pointer; z-index: 10;">
                        <div class="w-full h-full rounded-full bg-white p-1">
                            <div class="w-full h-full rounded-full bg-black border-[1.6px] border-stepv-primary p-2 lg:p-[18px] flex flex-col justify-center items-center text-center">
                                <span class="text-white font-light text-xs lg:text-sm uppercase">Step {{ $stepNum }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</section>

<script>
function showStepWeWork{{ $uniqueId }}(stepNumber) {
    const container = document.querySelector('[data-we-work-id="{{ $uniqueId }}"]');
    if (!container) return;

    // Ẩn tất cả content
    container.querySelectorAll('.interactive-content').forEach(content => {
        content.classList.remove('opacity-100', 'visible');
        content.classList.add('opacity-0', 'invisible');
    });

    // Hiển thị content của step được chọn
    const selectedContent = container.querySelector(`#content-step-${stepNumber}-{{ $uniqueId }}`);
    if (selectedContent) {
        selectedContent.classList.remove('opacity-0', 'invisible');
        selectedContent.classList.add('opacity-100', 'visible');
    }

    // Cập nhật trạng thái active cho dots
    container.querySelectorAll('.step-dot').forEach(dot => {
        dot.classList.remove('active');
    });
    const activeDot = container.querySelector(`[data-step="${stepNumber}"]`);
    if (activeDot) {
        activeDot.classList.add('active');
    }
}

// Auto-rotate steps every 5 seconds
let currentStepWeWork{{ $uniqueId }} = 1;
const totalStepsWeWork{{ $uniqueId }} = {{ count($data['steps']) }};

setInterval(() => {
    currentStepWeWork{{ $uniqueId }} = currentStepWeWork{{ $uniqueId }} >= totalStepsWeWork{{ $uniqueId }} ? 1 : currentStepWeWork{{ $uniqueId }} + 1;
    showStepWeWork{{ $uniqueId }}(currentStepWeWork{{ $uniqueId }});
}, 5000);
</script>
@endif
