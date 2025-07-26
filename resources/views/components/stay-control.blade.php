{{-- 
  Bắt đầu component "Stay in Control with Your Client Dashboard".
  Để sử dụng: @include('components.stay-control')
--}}

<div class="bg-black flex flex-col items-center w-full text-left py-20 box-border">
    <div class="w-full max-w-[1140px] px-4">

        {{-- CLIENT DASHBOARD SECTION --}}
        <div class="w-full flex flex-col p-4 lg:p-[25px] gap-5 box-border">
            <div class="w-full">
                {{-- Tiêu đề --}}
                <div class="mb-[30px] text-left">
                    <h2 class="text-white font-light uppercase text-5xl lg:text-[60.8px] lg:leading-[60.8px]">Stay in Control with Your Client Dashboard</h2>
                </div>
                {{-- Mô tả --}}
                <div class="w-full lg:w-[60%] text-left">
                    <p class="text-white font-light text-xl leading-[35px] [text-shadow:0_0_10px_rgba(0,0,0,0.3)]">
                        We've made it easy for you to stay connected and in control!
                    </p>
                </div>
            </div>

            {{-- Các thẻ tính năng --}}
            <div class="w-full flex flex-col gap-5 mt-10 mb-[10%] [perspective:1200px]">
                
                {{-- Hàng 1 --}}
                <div class="flex flex-col md:flex-row gap-5">
                    {{-- Card "Access All Your Files" --}}
                    <div class="w-full md:w-[40%] flex flex-col gap-5 p-6 rounded-[25px] border-[0.8px] border-gray-700 bg-black shadow-2xl transition-all duration-300" style="transform: matrix3d(0.998, -0.001, 0.061, 0, 0, 0.999, 0.019, 0, -0.061, -0.019, 0.997, 0, 0, 0, 0, 1);">
                        <div class="flex items-start gap-4">
                            <svg class="w-7 h-7 text-stepv-primary flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                            </svg>
                            <h3 class="text-white font-semibold text-[28px] leading-[28px] uppercase">Access All Your Files</h3>
                        </div>
                        <p class="text-white font-light text-xl leading-[35px]">Easily download your project files, deliverables, and revisions at any time, all in one secure location</p>
                    </div>

                    {{-- Card "Track Your Project's Progress" --}}
                    <div class="w-full md:w-[60%] flex flex-col gap-5 p-6 rounded-[25px] border-[0.8px] border-gray-700 bg-black shadow-2xl transition-all duration-300" style="transform: matrix3d(0.998, -0.001, 0.061, 0, 0, 0.999, 0.019, 0, -0.061, -0.019, 0.997, 0, 0, 0, 0, 1);">
                        <div class="flex items-start gap-4">
                            <svg class="w-7 h-7 text-stepv-primary flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8Z"/>
                            </svg>
                            <h3 class="text-white font-semibold text-[28px] leading-[28px] uppercase">Track Your Project's Progress</h3>
                        </div>
                        <p class="text-white font-light text-xl leading-[35px]">Stay updated with real-time progress tracking, milestones, and deadlines, so you always know what's happening</p>
                    </div>
                </div>

                {{-- Hàng 2 --}}
                <div class="flex flex-col md:flex-row gap-5">
                    {{-- Card "Communicate Effortlessly" --}}
                    <div class="w-full md:w-[60%] flex flex-col gap-5 p-6 rounded-[25px] border-[0.8px] border-gray-700 bg-black shadow-2xl transition-all duration-300" style="transform: matrix3d(0.998, -0.001, 0.061, 0, 0, 0.999, 0.019, 0, -0.061, -0.019, 0.997, 0, 0, 0, 0, 1);">
                        <div class="flex items-start gap-4">
                            <svg class="w-7 h-7 text-stepv-primary flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20,2H4A2,2 0 0,0 2,4V22L6,18H20A2,2 0 0,0 22,16V4A2,2 0 0,0 20,2M20,16H5.17L4,17.17V4H20V16Z"/>
                            </svg>
                            <h3 class="text-white font-semibold text-[28px] leading-[28px] uppercase">Communicate Effortlessly</h3>
                        </div>
                        <p class="text-white font-light text-xl leading-[35px]">Use the dashboard to send feedback, ask questions, or stay in touch with our team—no endless email chains needed</p>
                    </div>

                    {{-- Card "Stay Organized for Future Projects" --}}
                    <div class="w-full md:w-[40%] flex flex-col gap-5 p-6 rounded-[25px] border-[0.8px] border-gray-700 bg-black shadow-2xl transition-all duration-300" style="transform: matrix3d(0.998, -0.001, 0.061, 0, 0, 0.999, 0.019, 0, -0.061, -0.019, 0.997, 0, 0, 0, 0, 1);">
                        <div class="flex items-start gap-4">
                            <svg class="w-7 h-7 text-stepv-primary flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M19,19H5V5H19V19Z M17,12H7V10H17V12Z M15,16H7V14H15V16Z M17,8H7V6H17V8Z"/>
                            </svg>
                            <h3 class="text-white font-semibold text-[28px] leading-[28px] uppercase">Stay Organized for Future Projects</h3>
                        </div>
                        <p class="text-white font-light text-xl leading-[35px]">Your dashboard serves as a long-term archive, so you can revisit past projects or start new ones without losing any information</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

{{-- Kết thúc component --}}
