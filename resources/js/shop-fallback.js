/**
 * Fallback initialization script for Step V Studio Shop
 * Provides basic functionality when Alpine.js is not available
 */
document.addEventListener('DOMContentLoaded', function() {
    // Fallback navbar scroll effect if needed
    const header = document.querySelector('header');
    if (header && typeof Alpine === 'undefined') {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('bg-black/80', 'backdrop-blur-md');
            } else {
                header.classList.remove('bg-black/80', 'backdrop-blur-md');
            }
        });
    }
});
