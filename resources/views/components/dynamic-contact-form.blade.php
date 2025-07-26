@php
try {
    $contactForm = \App\Models\WebDesign::getByKey('contact_form');
} catch (\Exception $e) {
    $contactForm = null;
}

// Data mặc định nếu không có trong DB
$data = [
    'title' => $contactForm->title ?? 'Let\'s bring your vision to life',
    'description' => $contactForm->content['description'] ?? 'We\'re here to help you create stunning visuals and animations that captivate your audience and elevate your brand. Whether you have a question, need a quote, or want to discuss your next project, we\'d love to hear from you.',
    'social_description' => $contactForm->content['social_description'] ?? 'Follow us on social media for the latest updates, projects, and behind-the-scenes content.',
    'social_links' => $contactForm->content['social_links'] ?? [
        ['name' => 'Youtube', 'url' => 'https://www.youtube.com/@StepVStudio', 'icon' => 'fab fa-youtube'],
        ['name' => 'Instagram', 'url' => 'https://www.instagram.com/stepv.studio/', 'icon' => 'fab fa-instagram'],
        ['name' => 'Linkedin', 'url' => 'https://www.linkedin.com/company/step-v-studio/', 'icon' => 'fab fa-linkedin-in']
    ],
    'button_text' => $contactForm->content['button_text'] ?? 'OUR SERVICES',
    'button_url' => $contactForm->content['button_url'] ?? '/services',
    'contact_title' => $contactForm->content['contact_title'] ?? 'How to Reach Us',
    'email' => $contactForm->content['email'] ?? 'contact@stepv.studio',
    'phone' => $contactForm->content['phone'] ?? '+49-176-21129718',
    'form_title' => $contactForm->content['form_title'] ?? 'Or Leave Us a Message',
    'form_description' => $contactForm->content['form_description'] ?? 'Fill out the form below, and we\'ll get back to you within 24 hours.',
    'service_options' => $contactForm->content['service_options'] ?? [
        ['value' => '3D Product Visualization', 'label' => '3D Product Visualization'],
        ['value' => '3D Product Animation', 'label' => '3D Product Animation'],
        ['value' => 'VFX / AR Production', 'label' => 'VFX / AR Production'],
        ['value' => 'Real Film Production', 'label' => 'Real Film Production'],
        ['value' => 'TV Commercials', 'label' => 'TV Commercials'],
        ['value' => 'Music Production & Voice Overs', 'label' => 'Music Production & Voice Overs'],
        ['value' => 'Brand Communication & Marketing', 'label' => 'Brand Communication & Marketing'],
        ['value' => 'Other', 'label' => 'Other']
    ],
    'privacy_url' => $contactForm->content['privacy_url'] ?? '/privacy-policy',
    'background_color' => $contactForm->settings['background_color'] ?? 'bg-black',
    'show_section' => $contactForm->is_active ?? true
];
@endphp

@if($data['show_section'])
<section id="contact" class="{{ $data['background_color'] }} w-full flex justify-center py-10 box-border">
    <div class="w-full max-w-[1140px] flex flex-col md:flex-row items-start text-left">

        {{-- CỘT BÊN TRÁI: GIỚI THIỆU & MẠNG XÃ HỘI --}}
        <div class="w-full md:w-1/2 flex flex-col justify-center p-4 lg:p-[25px] gap-5 box-border">
            
            {{-- Tiêu đề --}}
            <div class="mb-[30px]">
                <h2 class="text-white font-light uppercase text-5xl lg:text-[60.8px] lg:leading-[60.8px]">
                    {{ $data['title'] }}
                </h2>
            </div>
            
            {{-- Mô tả --}}
            <p class="text-white font-light text-xl leading-[35px] [text-shadow:0_0_10px_rgba(0,0,0,0.3)]">
                {{ $data['description'] }}
            </p>
            
            {{-- Dấu gạch ngang --}}
            <div class="py-[15px]">
                <hr class="border-t-[0.8px] border-white" />
            </div>

            {{-- Social Media --}}
            <p class="text-white font-light text-xl leading-[35px] [text-shadow:0_0_10px_rgba(0,0,0,0.3)]">
                {{ $data['social_description'] }}
            </p>

            <div class="flex items-center gap-2">
                @foreach($data['social_links'] as $social)
                <a href="{{ $social['url'] ?? '#' }}" target="_blank" class="inline-flex items-center justify-center w-[50px] h-[50px] bg-black text-stepv-primary rounded-[10%] border border-gray-600 hover:bg-stepv-primary hover:text-black transition-colors duration-300">
                    <span class="sr-only">{{ $social['name'] ?? 'Social' }}</span>
                    <i class="{{ $social['icon'] ?? 'fab fa-link' }} text-2xl"></i>
                </a>
                @endforeach
            </div>

            {{-- Nút Services --}}
            <div class="mt-4 p-2.5">
                <a href="{{ $data['button_url'] }}" class="inline-block cursor-pointer bg-white text-black font-sans text-[15px] leading-[15px] px-[30px] py-[10px] rounded-[15px] border-[1.6px] border-solid border-white transition-all duration-300 hover:bg-transparent hover:text-white">
                    <span>{{ $data['button_text'] }}</span>
                </a>
            </div>
        </div>


        {{-- CỘT BÊN PHẢI: THÔNG TIN LIÊN HỆ & FORM --}}
        <div class="w-full md:w-1/2 flex flex-col justify-center p-4 lg:p-[25px] gap-5 box-border">
            
            {{-- Thông tin liên hệ --}}
            <div class="text-left space-y-2">
                <h3 class="text-white font-semibold text-xl uppercase">{{ $data['contact_title'] }}</h3>
                <p class="text-white font-light text-xl leading-[35px]">
                    Email: <a href="mailto:{{ $data['email'] }}" class="text-stepv-primary underline">{{ $data['email'] }}</a><br>
                    Phone: <a href="tel:{{ str_replace(['+', '-', ' '], '', $data['phone']) }}" class="text-stepv-primary underline">{{ $data['phone'] }}</a>
                </p>
            </div>

            {{-- Form liên hệ --}}
            <div class="text-left mt-5 w-full">
                <h3 class="text-white font-semibold text-xl uppercase">{{ $data['form_title'] }}</h3>
                <p class="text-white font-light text-xl leading-[35px] lg:w-4/5 mt-2">
                    {{ $data['form_description'] }}
                </p>
                
                <form method="post" name="Contact Form" class="mt-6 space-y-6">
                    @csrf
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
                            @foreach($data['service_options'] as $option)
                            <option value="{{ $option['value'] ?? $option['label'] }}">{{ $option['label'] ?? $option['value'] }}</option>
                            @endforeach
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
                                I agree to the <a href="{{ $data['privacy_url'] }}" class="text-stepv-primary underline">PRIVACY POLICY</a>
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
</section>
@endif
