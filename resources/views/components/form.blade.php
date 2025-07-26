{{-- 
  Bắt đầu component Contact.
  Để sử dụng, trong file blade khác của bạn, hãy gọi: @include('path.to.this.contact-section')
--}}

<div class="bg-black w-full flex justify-center py-10 box-border">
    <div class="w-full max-w-[1140px] flex flex-col md:flex-row items-start text-left">

        {{-- ====================================================================== --}}
        {{-- CỘT BÊN TRÁI: GIỚI THIỆU & MẠNG XÃ HỘI                             --}}
        {{-- ====================================================================== --}}
        <div class="w-full md:w-1/2 flex flex-col justify-center p-4 lg:p-[25px] gap-5 box-border">
            
            {{-- Tiêu đề --}}
            <div class="mb-[30px]">
                <h2 class="text-white font-light uppercase text-5xl lg:text-[60.8px] lg:leading-[60.8px]">
                    Let's bring your vision to life
                </h2>
            </div>
            
            {{-- Mô tả --}}
            <p class="text-white font-light text-xl leading-[35px] [text-shadow:0_0_10px_rgba(0,0,0,0.3)]">
                We’re here to help you create stunning visuals and animations that captivate your audience and elevate your brand. Whether you have a question, need a quote, or want to discuss your next project, we’d love to hear from you.
            </p>
            
            {{-- Dấu gạch ngang --}}
            <div class="py-[15px]">
                <hr class="border-t-[0.8px] border-white" />
            </div>

            {{-- Social Media --}}
            <p class="text-white font-light text-xl leading-[35px] [text-shadow:0_0_10px_rgba(0,0,0,0.3)]">
                Follow us on social media for the latest updates, projects, and behind-the-scenes content.
            </p>

            <div class="flex items-center gap-2">
                <a href="https://www.youtube.com/@StepVStudio" target="_blank" class="inline-flex items-center justify-center w-[50px] h-[50px] bg-black text-stepv-primary rounded-[10%] border border-gray-600 hover:bg-stepv-primary hover:text-black transition-colors duration-300">
                    <span class="sr-only">Youtube</span>
                    <i class="fab fa-youtube text-2xl"></i> {{-- Thay class icon vào đây --}}
                </a>
                <a href="https://www.instagram.com/stepv.studio/" target="_blank" class="inline-flex items-center justify-center w-[50px] h-[50px] bg-black text-stepv-primary rounded-[10%] border border-gray-600 hover:bg-stepv-primary hover:text-black transition-colors duration-300">
                    <span class="sr-only">Instagram</span>
                    <i class="fab fa-instagram text-2xl"></i> {{-- Thay class icon vào đây --}}
                </a>
                <a href="https://www.linkedin.com/company/step-v-studio/" target="_blank" class="inline-flex items-center justify-center w-[50px] h-[50px] bg-black text-stepv-primary rounded-[10%] border border-gray-600 hover:bg-stepv-primary hover:text-black transition-colors duration-300">
                    <span class="sr-only">Linkedin</span>
                    <i class="fab fa-linkedin-in text-2xl"></i> {{-- Thay class icon vào đây --}}
                </a>
            </div>

            {{-- Nút Services --}}
            <div class="mt-4 p-2.5">
                <a href="https://stepv.studio/services" class="inline-block cursor-pointer bg-white text-black font-sans text-[15px] leading-[15px] px-[30px] py-[10px] rounded-[15px] border-[1.6px] border-solid border-white transition-all duration-300 hover:bg-transparent hover:text-white">
                    <span>OUR SERVICES</span>
                </a>
            </div>
        </div>


        {{-- ====================================================================== --}}
        {{-- CỘT BÊN PHẢI: THÔNG TIN LIÊN HỆ & FORM                               --}}
        {{-- ====================================================================== --}}
        <div class="w-full md:w-1/2 flex flex-col justify-center p-4 lg:p-[25px] gap-5 box-border">
            
            {{-- Thông tin liên hệ --}}
            <div class="text-left space-y-2">
                <h3 class="text-white font-semibold text-xl uppercase">How to Reach Us</h3>
                <p class="text-white font-light text-xl leading-[35px]">
                    Email: <a href="mailto:contact@stepv.studio" class="text-stepv-primary underline">contact@stepv.studio</a><br>
                    Phone: <a href="tel:+4917621129718" class="text-stepv-primary underline">+49-176-21129718</a>
                </p>
            </div>

            {{-- Form liên hệ --}}
            <div class="text-left mt-5 w-full">
                <h3 class="text-white font-semibold text-xl uppercase">Or Leave Us a Message</h3>
                <p class="text-white font-light text-xl leading-[35px] lg:w-4/5 mt-2">
                    Fill out the form below, and we’ll get back to you within <span class="text-stepv-primary">24 hours</span>.
                </p>
                
                <form method="post" name="Contact Form" class="mt-6 space-y-6">
                    {{-- Các hidden fields cho form --}}
                    <input type="hidden" name="post_id" value="11">
                    <input type="hidden" name="form_id" value="a544d5b">

                    <div>
                        <label for="form-field-name" class="sr-only">Name</label>
                        <input type="text" name="form_fields[name]" id="form-field-name" placeholder="Name*" required class="w-full bg-black text-white font-light text-lg border-[0.8px] border-gray-600 rounded-[15px] p-3 focus:ring-stepv-primary focus:border-stepv-primary">
                    </div>

                    <div>
                        <label for="form-field-email" class="sr-only">E-Mail</label>
                        <input type="email" name="form_fields[email]" id="form-field-email" placeholder="E-Mail*" required class="w-full bg-black text-white font-light text-lg border-[0.8px] border-gray-600 rounded-[15px] p-3 focus:ring-stepv-primary focus:border-stepv-primary">
                    </div>

                    <div>
                        <label for="form-field-service" class="sr-only">Service Category</label>
                        <select name="form_fields[field_3682a4c]" id="form-field-service" required class="w-full bg-black text-white font-light text-lg border-[0.8px] border-gray-600 rounded-[15px] p-3 focus:ring-stepv-primary focus:border-stepv-primary">
                            <option value="3D Product Visualization">3D Product Visualization</option>
                            <option value="3D Product Animation">3D Product Animation</option>
                            <option value="VFX / AR Production">VFX / AR Production</option>
                            <option value="Real Film Production">Real Film Production</option>
                            <option value="TV Commercials">TV Commercials</option>
                            <option value="Music Production & Voice Overs">Music Production & Voice Overs</option>
                            <option value="Brand Communication & Marketing">Brand Communication & Marketing</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="form-field-message" class="sr-only">Message</label>
                        <textarea name="form_fields[message]" id="form-field-message" rows="4" placeholder="Message" class="w-full bg-black text-white font-light text-lg border-[0.8px] border-gray-600 rounded-[15px] p-3 focus:ring-stepv-primary focus:border-stepv-primary"></textarea>
                    </div>

                    {{-- reCAPTCHA and Privacy Policy --}}
                    <div>
                        {{-- reCAPTCHA elements are usually handled by JS and are often hidden --}}
                        <div class="g-recaptcha-container" style="display: none;"></div> 
                        
                        <div class="flex items-center">
                            <input type="checkbox" name="form_fields[field_d487e0c]" id="form-field-privacy" required class="h-4 w-4 rounded border-gray-500 bg-gray-700 text-stepv-primary focus:ring-stepv-primary">
                            <label for="form-field-privacy" class="ml-3 text-white font-light text-base">
                                I agree to the <a href="https://stepv.studio/impressum" class="text-stepv-primary underline">PRIVACY POLICY</a>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <button type="submit" class="inline-block cursor-pointer bg-transparent text-stepv-primary font-light text-[15px] leading-[15px] px-6 py-2.5 rounded-[15px] border-[1.6px] border-solid border-stepv-primary transition-all duration-300 hover:bg-stepv-primary hover:text-black">
                            SEND
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>

{{-- Kết thúc component --}}