{{-- 
  Bắt đầu component.
  Để sử dụng, trong file blade khác của bạn, hãy gọi: @include('components.logo-brand')
--}}

<div class="max-w-7xl mx-auto bg-black flex items-center justify-center w-full relative text-left p-[10px] gap-5 box-border transition-all duration-300">

    {{-- Cột bên trái: Chữ ký & Thông tin --}}
    <div class="w-1/2 flex flex-col relative text-left p-[10px] gap-5 box-border transition-all duration-300">
        
        {{-- Ảnh chữ ký (dưới dạng background) --}}
        <div class="w-full flex flex-col relative text-left p-[10px] gap-5 box-border min-h-[150px] bg-contain bg-center bg-no-repeat transition-all duration-300"
             style="background-image: url('https://stepv.studio/wp-content/uploads/2025/04/signaturewhite.png');">
            {{-- Div này trống, chỉ dùng để hiển thị ảnh nền --}}
        </div>

        {{-- Khối văn bản --}}
        <div class="w-full flex flex-col relative text-left p-[10px] gap-5 box-border transition-all duration-300">
            {{-- Tên --}}
            <div class="max-w-full relative gap-5">
                <div class="h-full">
                    <h2 class="text-white font-semibold font-sans text-[35px] leading-[35px]">
                        <span>VASILII GUREV</span>
                    </h2>
                </div>
            </div>
            {{-- Chức danh --}}
            <div class="max-w-full relative gap-5">
                <div class="h-full">
                    <h2 class="text-[#aaaaaa] font-light font-sans text-[17px] leading-[17px]">
                        <span>CEO & FOUNDER OF STEP V STUDIO</span>
                    </h2>
                </div>
            </div>
        </div>

    </div>

    {{-- Cột bên phải: Logos đối tác --}}
    <div class="w-1/2 flex flex-col justify-center relative text-left p-[25px] gap-5 box-border transition-all duration-300">
        
        {{-- Hàng logo 1 --}}
        <div class="w-full grid grid-cols-3 justify-start items-stretch content-start relative text-left p-[10px] gap-5 box-border">
            <div><img src="https://stepv.studio/wp-content/uploads/2024/08/wn-x-black-and-red-2-1024x1017.png" loading="lazy" decoding="async" alt="Client Logo 1" class="max-w-full align-middle"></div>
            <div><img src="https://stepv.studio/wp-content/uploads/2024/08/dnalogo-1024x1017.png" loading="lazy" decoding="async" alt="Client Logo 2" class="max-w-full align-middle"></div>
            <div><img src="https://stepv.studio/wp-content/uploads/2024/10/gdivine-1024x1017.png" loading="lazy" decoding="async" alt="Client Logo 3" class="max-w-full align-middle"></div>
        </div>

        {{-- Hàng logo 2 --}}
        <div class="w-full grid grid-cols-3 justify-start items-stretch content-start relative text-left p-[10px] gap-5 box-border">
            <div><img src="https://stepv.studio/wp-content/uploads/2024/08/hyaluronce-logo-1024x1017.png" loading="lazy" decoding="async" alt="Client Logo 4" class="max-w-full align-middle"></div>
            <div><img src="https://stepv.studio/wp-content/uploads/2024/11/fivologo-1024x1017.png" loading="lazy" decoding="async" alt="Client Logo 5" class="max-w-full align-middle"></div>
            <div><img src="https://stepv.studio/wp-content/uploads/2024/10/thedarkageslogo-1024x1017.png" loading="lazy" decoding="async" alt="Client Logo 6" class="max-w-full align-middle"></div>
        </div>

        {{-- Hàng logo 3 --}}
        <div class="w-full grid grid-cols-3 justify-start items-stretch content-start relative text-left p-[10px] gap-5 box-border">
            <div><img src="https://stepv.studio/wp-content/uploads/2025/04/gazzaznewlogo-1024x1015.png" loading="lazy" decoding="async" alt="Client Logo 7" class="max-w-full align-middle"></div>
            <div><img src="https://stepv.studio/wp-content/uploads/2024/11/sdvstudios-1024x1017.png" loading="lazy" decoding="async" alt="Client Logo 8" class="max-w-full align-middle"></div>
            <div><img src="https://stepv.studio/wp-content/uploads/2024/10/caronparis-logo-1024x1017.png" loading="lazy" decoding="async" alt="Client Logo 9" class="max-w-full align-middle"></div>
        </div>

    </div>

</div>

{{-- Kết thúc component --}}
