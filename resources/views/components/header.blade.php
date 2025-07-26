
{{-- Header sử dụng menu động --}}

<header class="font-sans relative">
    @foreach(['top' => ['class' => 'absolute top-0 left-0 w-full z-20 transition-opacity duration-300', 'container' => 'flex items-center justify-between gap-5 w-full min-h-[110px] px-6 bg-black/30 backdrop-blur-sm border-b border-white/80', 'logo' => 'h-20'], 'sticky' => ['class' => 'fixed top-4 left-1/2 -translate-x-1/2 w-[96%] z-50 transition-all duration-500 ease-in-out -translate-y-[150%] opacity-0', 'container' => 'flex items-center justify-between gap-5 w-full h-[100px] px-8 bg-black/50 backdrop-blur-lg rounded-full shadow-2xl shadow-black/30', 'logo' => 'h-16']] as $type => $config)
    <div id="header-{{ $type }}" class="{{ $config['class'] }}">
        <div class="{{ $config['container'] }}">
            <div class="w-1/4">
                <a href="/">
                    <img src="{{ get_site_logo() }}" alt="{{ get_site_name() }}" class="{{ $config['logo'] }} w-auto">
                </a>
            </div>

            @include('components.dynamic-menu')

            <div class="flex items-center justify-end w-1/4">
                <a href="#contact" class="hidden lg:inline-block uppercase text-xs font-semibold text-stepv-primary bg-gradient-to-r from-black to-zinc-800 rounded-full px-6 py-3 transition-transform hover:scale-105">Contact Us</a>
                <button id="mobile-menu-btn-{{ $type }}" class="mobile-menu-btn lg:hidden text-white text-2xl focus:outline-none">
                    <i id="hamburger-icon-{{ $type }}" class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
    @endforeach

    <div id="mobile-menu" class="fixed inset-0 z-50 lg:hidden">
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" id="mobile-menu-backdrop"></div>
        <div class="absolute right-0 top-0 h-full w-80 bg-black/95 backdrop-blur-lg shadow-2xl">
            <div class="flex items-center justify-between p-6 border-b border-white/20">
                <img src="{{ get_site_logo() }}" alt="{{ get_site_name() }}" class="h-12 w-auto">
                <button id="mobile-menu-close" class="text-white text-2xl focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            @include('components.dynamic-mobile-menu')
        </div>
    </div>
</header>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const headerTop = document.getElementById('header-top');
        const headerSticky = document.getElementById('header-sticky');
        const scrollThreshold = 100; // Vị trí cuộn để kích hoạt header sticky (tính bằng pixel)

        function handleScroll() {
            if (window.scrollY > scrollThreshold) {
                // Ẩn header top
                headerTop.classList.add('opacity-0', 'invisible');

                // Hiện header sticky
                headerSticky.classList.remove('-translate-y-[150%]', 'opacity-0');
                headerSticky.classList.add('translate-y-0', 'opacity-100');
            } else {
                // Hiện header top
                headerTop.classList.remove('opacity-0', 'invisible');

                // Ẩn header sticky
                headerSticky.classList.remove('translate-y-0', 'opacity-100');
                headerSticky.classList.add('-translate-y-[150%]', 'opacity-0');
            }
        }

        window.addEventListener('scroll', handleScroll, { passive: true });

        // Chạy lần đầu để kiểm tra vị trí ban đầu (phòng trường hợp trang được tải lại khi đã cuộn)
        handleScroll();

        // Mobile Menu Functionality
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuBtnTop = document.getElementById('mobile-menu-btn-top');
        const mobileMenuBtnSticky = document.getElementById('mobile-menu-btn-sticky');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const mobileMenuBackdrop = document.getElementById('mobile-menu-backdrop');
        const hamburgerIconTop = document.getElementById('hamburger-icon-top');
        const hamburgerIconSticky = document.getElementById('hamburger-icon-sticky');

        // More menu functionality handled by dynamic-mobile-menu component

        function openMobileMenu() {
            mobileMenu.classList.add('show');
            document.body.style.overflow = 'hidden'; // Prevent scrolling

            // Change hamburger to X
            hamburgerIconTop.classList.remove('fa-bars');
            hamburgerIconTop.classList.add('fa-times');
            hamburgerIconSticky.classList.remove('fa-bars');
            hamburgerIconSticky.classList.add('fa-times');
        }

        function closeMobileMenu() {
            mobileMenu.classList.remove('show');
            document.body.style.overflow = ''; // Restore scrolling

            // Change X back to hamburger
            hamburgerIconTop.classList.remove('fa-times');
            hamburgerIconTop.classList.add('fa-bars');
            hamburgerIconSticky.classList.remove('fa-times');
            hamburgerIconSticky.classList.add('fa-bars');
        }



        // Event listeners
        mobileMenuBtnTop.addEventListener('click', openMobileMenu);
        mobileMenuBtnSticky.addEventListener('click', openMobileMenu);
        mobileMenuClose.addEventListener('click', closeMobileMenu);
        mobileMenuBackdrop.addEventListener('click', closeMobileMenu);


        // Close menu when clicking on links
        const mobileMenuLinks = mobileMenu.querySelectorAll('a');
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });

        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeMobileMenu();
            }
        });
    });
</script>
@endpush