{{-- 
  Bắt đầu component "How We Work".
  Để sử dụng, trong file blade khác của bạn, hãy gọi: @include('path.to.this.file')
  Lưu ý: Component này cần JavaScript để hoạt động đầy đủ.
--}}

<div class="bg-black flex flex-col relative w-full text-left transition-all duration-300">
    <div class="w-full max-w-[1140px] mx-auto flex flex-col gap-5">
        <div class="w-full flex flex-col md:flex-row items-center p-[25px] gap-10 box-border">

            {{-- Cột bên trái: Văn bản giới thiệu --}}
            <div class="w-full md:w-1/2 flex flex-col gap-5 text-left">
                {{-- Tiêu đề chính --}}
                <div class="mb-[30px]">
                    <h2 class="text-white font-light uppercase text-5xl lg:text-[60.8px] lg:leading-[60.8px]">
                        <span>How We Work</span>
                    </h2>
                </div>
                
                {{-- Đoạn mô tả --}}
                <div>
                    {{-- Builder.io dùng H2, nhưng P sẽ hợp lý hơn về ngữ nghĩa --}}
                    <h2 class="text-white font-light text-xl leading-[35px] [text-shadow:0_0_10px_rgba(0,0,0,0.3)]">
                        <span>At Step V Studio, we believe that great results come from a well-structured and transparent workflow. That’s why we’ve designed a process that keeps you informed and involved every step of the way.</span>
                    </h2>
                </div>
                
                {{-- Nút bấm --}}
                <div class="pt-5">
                    <a href="https://stepv.studio/#contact" class="inline-block uppercase cursor-pointer text-stepv-primary border-[1.6px] border-solid border-stepv-primary rounded-[15px] px-[30px] py-[10px] text-[15px] leading-[15px] transition-all duration-300 hover:bg-stepv-primary hover:text-black">
                        <span class="flex items-center justify-center gap-3">
                            <span>
                                {{-- Icon placeholder --}}
                                <i></i>
                            </span>
                            <span>Start your project today</span>
                        </span>
                    </a>
                </div>
            </div>

            {{-- Cột bên phải: Sơ đồ vòng tròn tương tác --}}
            <div class="w-full md:w-1/2 flex justify-center items-center py-10">
                <div class="relative w-[300px] h-[300px] sm:w-[400px] sm:h-[400px] lg:w-[500px] lg:h-[500px] rounded-full border-[1.6px] border-solid border-stepv-primary my-[45px]">
                    
                    {{-- NỘI DUNG HIỂN THỊ Ở GIỮA (CẦN JS ĐỂ CHUYỂN ĐỔI) --}}
                    {{-- Step 1 Content --}}
                    <div id="content-step-1" class="interactive-content active flex flex-col justify-center items-center text-center absolute inset-0 rounded-full p-10 lg:p-[75px] opacity-100 visible transition-opacity duration-300">
                        <div class="mb-2 text-stepv-primary text-3xl lg:text-5xl"><i class="fa fa-flag-checkered"></i></div>
                        <h3 class="text-stepv-primary text-lg lg:text-[25px] uppercase leading-tight lg:leading-[37.5px]">Kick-Off & Planning</h3>
                        <p class="text-white font-light text-sm leading-[21px] mt-2">We begin with a free consultation to understand your vision, goals, and requirements.</p>
                    </div>
                    {{-- Step 2 Content (bị ẩn ban đầu) --}}
                    <div id="content-step-2" class="interactive-content absolute inset-0 rounded-full p-10 lg:p-[75px] opacity-0 invisible flex flex-col justify-center items-center text-center transition-opacity duration-300">
                        <h3 class="text-stepv-primary text-lg lg:text-[25px] uppercase leading-tight lg:leading-[37.5px]">Concept Development</h3>
                        <p class="text-white font-light text-sm leading-[21px] mt-2">We create initial concepts and sketches, ensuring alignment with your brand and vision.</p>
                    </div>
                    {{-- Thêm các div content khác cho Step 3, 4, 5, 6 ở đây --}}

                    {{-- CÁC NÚT BẤM "STEP" ĐƯỢC ĐỊNH VỊ XUNG QUANH --}}
                    {{-- Step 1 --}}
                    <div class="step-dot absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80px] h-[80px] lg:w-[110px] lg:h-[110px] rounded-full bg-white p-1 cursor-pointer z-10">
                        <div class="w-full h-full rounded-full bg-black border-[1.6px] border-stepv-primary p-2 lg:p-[18px] flex flex-col justify-center items-center text-center">
                            <span class="text-white font-light text-xs lg:text-sm uppercase">Step 1</span>
                        </div>
                    </div>
                    {{-- Step 2 --}}
                    <div class="step-dot absolute top-1/4 left-[93%] -translate-x-1/2 -translate-y-1/2 w-[80px] h-[80px] lg:w-[110px] lg:h-[110px] rounded-full bg-white p-1 cursor-pointer z-10">
                        <div class="w-full h-full rounded-full bg-black border-[1.6px] border-stepv-primary p-2 lg:p-[18px] flex flex-col justify-center items-center text-center">
                           <span class="text-white font-light text-xs lg:text-sm uppercase">Step 2</span>
                        </div>
                    </div>
                    {{-- Step 3 --}}
                    <div class="step-dot absolute top-3/4 left-[93%] -translate-x-1/2 -translate-y-1/2 w-[80px] h-[80px] lg:w-[110px] lg:h-[110px] rounded-full bg-white p-1 cursor-pointer z-10">
                        <div class="w-full h-full rounded-full bg-black border-[1.6px] border-stepv-primary p-2 lg:p-[18px] flex flex-col justify-center items-center text-center">
                           <span class="text-white font-light text-xs lg:text-sm uppercase">Step 3</span>
                        </div>
                    </div>
                    {{-- Step 4 --}}
                    <div class="step-dot absolute top-full left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80px] h-[80px] lg:w-[110px] lg:h-[110px] rounded-full bg-white p-1 cursor-pointer z-10">
                        <div class="w-full h-full rounded-full bg-black border-[1.6px] border-stepv-primary p-2 lg:p-[18px] flex flex-col justify-center items-center text-center">
                           <span class="text-white font-light text-xs lg:text-sm uppercase">Step 4</span>
                        </div>
                    </div>
                    {{-- Step 5 --}}
                    <div class="step-dot absolute top-3/4 left-[7%] -translate-x-1/2 -translate-y-1/2 w-[80px] h-[80px] lg:w-[110px] lg:h-[110px] rounded-full bg-white p-1 cursor-pointer z-10">
                        <div class="w-full h-full rounded-full bg-black border-[1.6px] border-stepv-primary p-2 lg:p-[18px] flex flex-col justify-center items-center text-center">
                           <span class="text-white font-light text-xs lg:text-sm uppercase">Step 5</span>
                        </div>
                    </div>
                    {{-- Step 6 --}}
                    <div class="step-dot absolute top-1/4 left-[7%] -translate-x-1/2 -translate-y-1/2 w-[80px] h-[80px] lg:w-[110px] lg:h-[110px] rounded-full bg-white p-1 cursor-pointer z-10">
                        <div class="w-full h-full rounded-full bg-black border-[1.6px] border-stepv-primary p-2 lg:p-[18px] flex flex-col justify-center items-center text-center">
                           <span class="text-white font-light text-xs lg:text-sm uppercase">Step 6</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- Kết thúc component --}}