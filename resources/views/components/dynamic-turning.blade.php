@php
try {
    $turning = \App\Models\WebDesign::getByKey('turning');
} catch (\Exception $e) {
    $turning = null;
}

// Data mặc định nếu không có trong DB
$data = [
    'title' => $turning->title ?? 'Turning Passion into Perfection',
    'description' => $turning->content['description'] ?? 'At ' . get_site_name() . ', everything we create starts with a passion for storytelling and innovation. Founded in Stuttgart, Germany, our studio was born from a desire to transform bold ideas into stunning 3D visuals and animations. What began as a dream to push the boundaries of 3D design has evolved into a trusted creative partner for premium brands and visionaries worldwide.\n\nEvery project we take on is a collaboration—your vision, brought to life through our expertise.',
    'button_text' => $turning->content['button_text'] ?? 'GET IN CONTACT',
    'button_url' => $turning->content['button_url'] ?? '#contact',
    'background_color' => $turning->settings['background_color'] ?? 'bg-black',
    'text_size' => $turning->settings['text_size'] ?? 'text-[60.8px]',
    'show_section' => $turning->is_active ?? true
];

// Chuyển đổi \n thành <br> cho description
$formattedDescription = nl2br(e($data['description']));
@endphp

@if($data['show_section'])
<section id="about" class="max-w-7xl mx-auto {{ $data['background_color'] }} flex flex-col justify-center w-full relative text-left p-[25px] gap-5 box-border transition-all duration-300">
    
    {{-- Section 1: Tiêu đề chính --}}
    <div class="max-w-full relative w-full text-left gap-5 box-border">
        <div class="h-full mb-[30px] text-left box-border transition-all duration-300">
            <h2 class="text-white font-light uppercase {{ $data['text_size'] }} leading-[60.8px] text-left font-sans box-border">
                <span>{{ $data['title'] }}</span>
            </h2>
        </div>
    </div>

    {{-- Section 2: Đoạn văn mô tả --}}
    <div class="max-w-full relative w-full text-left gap-5 box-border">
        <div class="h-full text-left box-border transition-all duration-300">
            <h2 class="text-white font-light text-xl leading-[35px] text-left font-sans [text-shadow:0_0_10px_rgba(0,0,0,0.3)] box-border">
                {!! $formattedDescription !!}
            </h2>
        </div>
    </div>
    
    {{-- Section 3: Nút bấm --}}
    <div class="flex items-center justify-start w-full relative text-left gap-5 mt-[2%] p-2.5 box-border transition-all duration-300">
        <div class="max-w-full relative text-left gap-5 box-border">
            <div class="h-full text-left box-border transition-all duration-300">
                <div class="text-left box-border">
                    <a href="{{ $data['button_url'] }}" 
                       class="inline-block cursor-pointer bg-white text-black font-sans text-[15px] leading-[15px] px-[30px] py-[10px] rounded-[15px] border-[1.6px] border-solid border-white transition-all duration-300 hover:bg-transparent hover:text-white">
                        <span class="flex justify-center items-center gap-[5px] box-border">
                            <span class="flex items-center box-border">
                                <i aria-hidden="true"></i> {{-- Placeholder cho icon nếu có --}}
                            </span>
                            <span class="box-border">
                                <span>{{ $data['button_text'] }}</span>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</section>
@endif
