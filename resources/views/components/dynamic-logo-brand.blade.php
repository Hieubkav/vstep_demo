@php
try {
    $logoBrand = \App\Models\WebDesign::getByKey('logo_brand');
} catch (\Exception $e) {
    $logoBrand = null;
}

// Data mặc định nếu không có trong DB
$data = [
    'signature_image' => get_webdesign_image(
        $logoBrand->content ?? [],
        'signature_image_type',
        'signature_image_url',
        'signature_image',
        'https://stepv.studio/wp-content/uploads/2025/04/signaturewhite.png'
    ),
    'founder_name' => $logoBrand->content['founder_name'] ?? 'VASILII GUREV',
    'founder_title' => $logoBrand->content['founder_title'] ?? 'CEO & FOUNDER OF ' . strtoupper(get_site_name()),
    'client_logos' => $logoBrand->content['client_logos'] ?? [
        ['image' => 'https://stepv.studio/wp-content/uploads/2024/08/wn-x-black-and-red-2-1024x1017.png', 'alt' => 'Client Logo 1', 'client_name' => 'WN-X'],
        ['image' => 'https://stepv.studio/wp-content/uploads/2024/08/dnalogo-1024x1017.png', 'alt' => 'Client Logo 2', 'client_name' => 'DNA'],
        ['image' => 'https://stepv.studio/wp-content/uploads/2024/10/gdivine-1024x1017.png', 'alt' => 'Client Logo 3', 'client_name' => 'G\'DIVINE'],
        ['image' => 'https://stepv.studio/wp-content/uploads/2024/08/hyaluronce-logo-1024x1017.png', 'alt' => 'Client Logo 4', 'client_name' => 'HYALURONCE'],
        ['image' => 'https://stepv.studio/wp-content/uploads/2024/11/fivologo-1024x1017.png', 'alt' => 'Client Logo 5', 'client_name' => 'FIVO'],
        ['image' => 'https://stepv.studio/wp-content/uploads/2024/10/thedarkageslogo-1024x1017.png', 'alt' => 'Client Logo 6', 'client_name' => 'THE DARK AGES'],
        ['image' => 'https://stepv.studio/wp-content/uploads/2025/04/gazzaznewlogo-1024x1015.png', 'alt' => 'Client Logo 7', 'client_name' => 'GAZZAZ'],
        ['image' => 'https://stepv.studio/wp-content/uploads/2024/11/sdvstudios-1024x1017.png', 'alt' => 'Client Logo 8', 'client_name' => 'SDV STUDIOS'],
        ['image' => 'https://stepv.studio/wp-content/uploads/2024/10/caronparis-logo-1024x1017.png', 'alt' => 'Client Logo 9', 'client_name' => 'CARON PARIS']
    ],
    'background_color' => $logoBrand->settings['background_color'] ?? 'bg-black',
    'layout' => $logoBrand->settings['layout'] ?? '2-columns',
    'show_section' => $logoBrand->is_active ?? true
];

// Chia logos thành các hàng (3 logos mỗi hàng)
$logoRows = array_chunk($data['client_logos'], 3);

// Layout classes
$containerClass = $data['layout'] === '1-column' ? 'flex-col' : 'flex-row';
$leftColumnClass = $data['layout'] === '1-column' ? 'w-full' : 'w-1/2';
$rightColumnClass = $data['layout'] === '1-column' ? 'w-full' : 'w-1/2';
@endphp

@if($data['show_section'])
<section id="logo-brand" class="max-w-7xl mx-auto {{ $data['background_color'] }} flex items-center justify-center w-full relative text-left p-[10px] gap-5 box-border transition-all duration-300 {{ $containerClass }}">

    {{-- Cột bên trái: Chữ ký & Thông tin --}}
    <div class="{{ $leftColumnClass }} flex flex-col relative text-left p-[10px] gap-5 box-border transition-all duration-300">
        
        {{-- Ảnh chữ ký (dưới dạng background) --}}
        <div class="w-full flex flex-col relative text-left p-[10px] gap-5 box-border min-h-[150px] bg-contain bg-center bg-no-repeat transition-all duration-300"
             style="background-image: url('{{ \App\Helpers\ImageHelper::getImageUrl($data['signature_image']) }}');">
            {{-- Div này trống, chỉ dùng để hiển thị ảnh nền --}}
        </div>

        {{-- Khối văn bản --}}
        <div class="w-full flex flex-col relative text-left p-[10px] gap-5 box-border transition-all duration-300">
            {{-- Tên --}}
            <div class="max-w-full relative gap-5">
                <div class="h-full">
                    <h2 class="text-white font-semibold font-sans text-[35px] leading-[35px]">
                        <span>{{ $data['founder_name'] }}</span>
                    </h2>
                </div>
            </div>
            {{-- Chức danh --}}
            <div class="max-w-full relative gap-5">
                <div class="h-full">
                    <h2 class="text-[#aaaaaa] font-light font-sans text-[17px] leading-[17px]">
                        <span>{{ $data['founder_title'] }}</span>
                    </h2>
                </div>
            </div>
        </div>

    </div>

    {{-- Cột bên phải: Logos đối tác --}}
    <div class="{{ $rightColumnClass }} flex flex-col justify-center relative text-left p-[25px] gap-5 box-border transition-all duration-300">
        
        @foreach($logoRows as $rowIndex => $logoRow)
        {{-- Hàng logo {{ $rowIndex + 1 }} --}}
        <div class="w-full grid grid-cols-3 justify-start items-stretch content-start relative text-left p-[10px] gap-5 box-border">
            @foreach($logoRow as $logo)
            <div>
                @php
                    // Xử lý logo với cấu trúc mới (image_type) hoặc cũ (image)
                    $logoImageUrl = null;
                    if (isset($logo['image_type']) && $logo['image_type'] === 'url' && !empty($logo['image_url'])) {
                        $logoImageUrl = $logo['image_url'];
                    } elseif (!empty($logo['image'])) {
                        $logoImageUrl = \App\Helpers\ImageHelper::getImageUrl($logo['image']);
                    } else {
                        $logoImageUrl = 'https://via.placeholder.com/200x200?text=Logo';
                    }
                @endphp
                <img src="{{ $logoImageUrl }}"
                     loading="lazy"
                     decoding="async"
                     alt="{{ $logo['alt'] ?? 'Client Logo' }}"
                     title="{{ $logo['client_name'] ?? 'Client' }}"
                     class="max-w-full align-middle hover:opacity-80 transition-opacity duration-300">
            </div>
            @endforeach
            
            {{-- Thêm div trống nếu hàng không đủ 3 logos --}}
            @for($i = count($logoRow); $i < 3; $i++)
            <div></div>
            @endfor
        </div>
        @endforeach

    </div>

</section>
@endif
