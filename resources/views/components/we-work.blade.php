{{-- 
  Bắt đầu component "How We Work".
  Để sử dụng, trong file blade khác của bạn, hãy gọi: @include('components.we-work')
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
                    <h2 class="text-white font-light text-xl leading-[35px] [text-shadow:0_0_10px_rgba(0,0,0,0.3)]">
                        <span>At Step V Studio, we believe that great results come from a well-structured and transparent workflow. That's why we've designed a process that keeps you informed and involved every step of the way.</span>
                    </h2>
                </div>
                
                {{-- Nút bấm --}}
                <div class="pt-5">
                    <a href="#contact" class="inline-block uppercase cursor-pointer text-stepv-primary border-[1.6px] border-solid border-stepv-primary rounded-[15px] px-[30px] py-[10px] text-[15px] leading-[15px] transition-all duration-300 hover:bg-stepv-primary hover:text-black">
                        <span class="flex items-center justify-center gap-3">
                            <span>Start your project today</span>
                        </span>
                    </a>
                </div>
            </div>

            {{-- Cột bên phải: Sơ đồ vòng tròn tương tác --}}
            <div class="w-full md:w-1/2 flex justify-center items-center py-10">
                <div class="relative w-[300px] h-[300px] sm:w-[400px] sm:h-[400px] lg:w-[500px] lg:h-[500px] rounded-full border-[1.6px] border-solid border-stepv-primary my-[45px]">
                    
                    {{-- NỘI DUNG HIỂN THỊ Ở GIỮA --}}
                    {{-- Step 1 Content --}}
                    <div id="content-step-1" class="interactive-content active flex flex-col justify-center items-center text-center absolute inset-0 rounded-full p-10 lg:p-[75px] opacity-100 visible transition-opacity duration-300">
                        <div class="mb-2 text-stepv-primary text-3xl lg:text-5xl"><i class="fa fa-flag-checkered"></i></div>
                        <h3 class="text-stepv-primary text-lg lg:text-[25px] uppercase leading-tight lg:leading-[37.5px]">Kick-Off & Planning</h3>
                        <p class="text-white font-light text-sm leading-[21px] mt-2">We begin with a free consultation to understand your vision, goals, and requirements.</p>
                    </div>
                    
                    {{-- Step 2 Content --}}
                    <div id="content-step-2" class="interactive-content absolute inset-0 rounded-full p-10 lg:p-[75px] opacity-0 invisible flex flex-col justify-center items-center text-center transition-opacity duration-300">
                        <div class="mb-2 text-stepv-primary text-3xl lg:text-5xl"><i class="fa fa-lightbulb"></i></div>
                        <h3 class="text-stepv-primary text-lg lg:text-[25px] uppercase leading-tight lg:leading-[37.5px]">Concept Development</h3>
                        <p class="text-white font-light text-sm leading-[21px] mt-2">We create initial concepts and sketches, ensuring alignment with your brand and vision.</p>
                    </div>
                    
                    {{-- Step 3 Content --}}
                    <div id="content-step-3" class="interactive-content absolute inset-0 rounded-full p-10 lg:p-[75px] opacity-0 invisible flex flex-col justify-center items-center text-center transition-opacity duration-300">
                        <div class="mb-2 text-stepv-primary text-3xl lg:text-5xl"><i class="fa fa-palette"></i></div>
                        <h3 class="text-stepv-primary text-lg lg:text-[25px] uppercase leading-tight lg:leading-[37.5px]">Design & Modeling</h3>
                        <p class="text-white font-light text-sm leading-[21px] mt-2">Our team creates detailed 3D models and designs based on approved concepts.</p>
                    </div>
                    
                    {{-- Step 4 Content --}}
                    <div id="content-step-4" class="interactive-content absolute inset-0 rounded-full p-10 lg:p-[75px] opacity-0 invisible flex flex-col justify-center items-center text-center transition-opacity duration-300">
                        <div class="mb-2 text-stepv-primary text-3xl lg:text-5xl"><i class="fa fa-eye"></i></div>
                        <h3 class="text-stepv-primary text-lg lg:text-[25px] uppercase leading-tight lg:leading-[37.5px]">Review & Feedback</h3>
                        <p class="text-white font-light text-sm leading-[21px] mt-2">You review the work and provide feedback for any necessary adjustments.</p>
                    </div>
                    
                    {{-- Step 5 Content --}}
                    <div id="content-step-5" class="interactive-content absolute inset-0 rounded-full p-10 lg:p-[75px] opacity-0 invisible flex flex-col justify-center items-center text-center transition-opacity duration-300">
                        <div class="mb-2 text-stepv-primary text-3xl lg:text-5xl"><i class="fa fa-magic"></i></div>
                        <h3 class="text-stepv-primary text-lg lg:text-[25px] uppercase leading-tight lg:leading-[37.5px]">Final Production</h3>
                        <p class="text-white font-light text-sm leading-[21px] mt-2">We finalize the project with high-quality rendering and post-production.</p>
                    </div>
                    
                    {{-- Step 6 Content --}}
                    <div id="content-step-6" class="interactive-content absolute inset-0 rounded-full p-10 lg:p-[75px] opacity-0 invisible flex flex-col justify-center items-center text-center transition-opacity duration-300">
                        <div class="mb-2 text-stepv-primary text-3xl lg:text-5xl"><i class="fa fa-rocket"></i></div>
                        <h3 class="text-stepv-primary text-lg lg:text-[25px] uppercase leading-tight lg:leading-[37.5px]">Delivery & Launch</h3>
                        <p class="text-white font-light text-sm leading-[21px] mt-2">Your project is delivered in all required formats, ready for launch.</p>
                    </div>

                    {{-- CÁC NÚT BẤM "STEP" ĐƯỢC ĐỊNH VỊ XUNG QUANH --}}
                    {{-- Step 1 --}}
                    <div class="step-dot active" data-step="1" onclick="showStep(1)" style="position: absolute; top: 0; left: 50%; transform: translate(-50%, -50%); width: 80px; height: 80px; cursor: pointer; z-index: 10;">
                        <div class="w-full h-full rounded-full bg-white p-1">
                            <div class="w-full h-full rounded-full bg-black border-[1.6px] border-stepv-primary p-2 lg:p-[18px] flex flex-col justify-center items-center text-center">
                                <span class="text-white font-light text-xs lg:text-sm uppercase">Step 1</span>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Step 2 --}}
                    <div class="step-dot" data-step="2" onclick="showStep(2)" style="position: absolute; top: 25%; left: 93%; transform: translate(-50%, -50%); width: 80px; height: 80px; cursor: pointer; z-index: 10;">
                        <div class="w-full h-full rounded-full bg-white p-1">
                            <div class="w-full h-full rounded-full bg-black border-[1.6px] border-stepv-primary p-2 lg:p-[18px] flex flex-col justify-center items-center text-center">
                                <span class="text-white font-light text-xs lg:text-sm uppercase">Step 2</span>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Step 3 --}}
                    <div class="step-dot" data-step="3" onclick="showStep(3)" style="position: absolute; top: 75%; left: 93%; transform: translate(-50%, -50%); width: 80px; height: 80px; cursor: pointer; z-index: 10;">
                        <div class="w-full h-full rounded-full bg-white p-1">
                            <div class="w-full h-full rounded-full bg-black border-[1.6px] border-stepv-primary p-2 lg:p-[18px] flex flex-col justify-center items-center text-center">
                                <span class="text-white font-light text-xs lg:text-sm uppercase">Step 3</span>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Step 4 --}}
                    <div class="step-dot" data-step="4" onclick="showStep(4)" style="position: absolute; top: 100%; left: 50%; transform: translate(-50%, -50%); width: 80px; height: 80px; cursor: pointer; z-index: 10;">
                        <div class="w-full h-full rounded-full bg-white p-1">
                            <div class="w-full h-full rounded-full bg-black border-[1.6px] border-stepv-primary p-2 lg:p-[18px] flex flex-col justify-center items-center text-center">
                                <span class="text-white font-light text-xs lg:text-sm uppercase">Step 4</span>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Step 5 --}}
                    <div class="step-dot" data-step="5" onclick="showStep(5)" style="position: absolute; top: 75%; left: 7%; transform: translate(-50%, -50%); width: 80px; height: 80px; cursor: pointer; z-index: 10;">
                        <div class="w-full h-full rounded-full bg-white p-1">
                            <div class="w-full h-full rounded-full bg-black border-[1.6px] border-stepv-primary p-2 lg:p-[18px] flex flex-col justify-center items-center text-center">
                                <span class="text-white font-light text-xs lg:text-sm uppercase">Step 5</span>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Step 6 --}}
                    <div class="step-dot" data-step="6" onclick="showStep(6)" style="position: absolute; top: 25%; left: 7%; transform: translate(-50%, -50%); width: 80px; height: 80px; cursor: pointer; z-index: 10;">
                        <div class="w-full h-full rounded-full bg-white p-1">
                            <div class="w-full h-full rounded-full bg-black border-[1.6px] border-stepv-primary p-2 lg:p-[18px] flex flex-col justify-center items-center text-center">
                                <span class="text-white font-light text-xs lg:text-sm uppercase">Step 6</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
function showStep(stepNumber) {
    // Ẩn tất cả content
    document.querySelectorAll('.interactive-content').forEach(content => {
        content.classList.remove('opacity-100', 'visible');
        content.classList.add('opacity-0', 'invisible');
    });
    
    // Hiển thị content của step được chọn
    const selectedContent = document.getElementById(`content-step-${stepNumber}`);
    if (selectedContent) {
        selectedContent.classList.remove('opacity-0', 'invisible');
        selectedContent.classList.add('opacity-100', 'visible');
    }
    
    // Cập nhật trạng thái active cho dots
    document.querySelectorAll('.step-dot').forEach(dot => {
        dot.classList.remove('active');
    });
    document.querySelector(`[data-step="${stepNumber}"]`).classList.add('active');
}
</script>

{{-- Kết thúc component --}}
