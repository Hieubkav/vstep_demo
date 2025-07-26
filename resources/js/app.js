import './bootstrap';
import 'preline';
import 'flowbite';

// Import Alpine.js
import Alpine from 'alpinejs';

// Import AOS
import AOS from 'aos';
import 'aos/dist/aos.css';

// Import Video Manager
import './video-manager';

// Initialize Alpine.js globally
window.Alpine = Alpine;

// Start Alpine.js
Alpine.start();

// Khởi tạo lại drawer menu và các chức năng khác
document.addEventListener('DOMContentLoaded', function() {
    // Khởi tạo AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: false,  // Set false để animation chạy mỗi lần scroll
        mirror: true  // Set true để animation chạy khi scroll ngược lại
    });

    const drawer = document.getElementById('drawer-navigation');
    if (drawer) {
        const initDrawer = new Drawer(drawer);
    }

    // Ensure header is visible
    const header = document.getElementById('main-header');
    if (header) {
        header.style.display = 'block';
        header.style.visibility = 'visible';
        header.style.opacity = '1';
    }

    // Mobile menu functionality (fallback if Alpine.js fails)
    const mobileMenuButton = document.querySelector('[data-mobile-menu-button]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Navbar scroll effect - optimized with throttling
    let scrollTimeout;
    let lastScrollTop = 0;
    const navbar = document.querySelector('header');

    window.addEventListener('scroll', function() {
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            // Add/remove scrolled class based on scroll position
            if (scrollTop > 50) {
                navbar?.classList.add('navbar-scrolled', 'bg-black/80', 'backdrop-blur-md');
            } else {
                navbar?.classList.remove('navbar-scrolled', 'bg-black/80', 'backdrop-blur-md');
            }

            lastScrollTop = scrollTop;
        }, 10);
    });
});
