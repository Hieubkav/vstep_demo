<?php
// Simple test to check if navbar is visible
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Navbar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            background-color: #000000 !important;
            color: #ffffff !important;
        }
        
        header {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        nav {
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        nav a, nav button, nav div {
            display: inline-flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
    </style>
</head>
<body class="bg-black text-white">

<!-- Header Navigation -->
<header class="fixed top-0 left-0 right-0 z-50 bg-black border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="#" class="flex items-center">
                    <img src="https://stepv.studio/wp-content/uploads/2024/08/png_logo-2-1024x1024.png" alt="Step V Studio Logo" class="w-8 h-8">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="flex items-center space-x-6 lg:space-x-8">
                <a href="#" class="text-green-400 hover:text-green-300 transition-colors font-medium text-sm uppercase tracking-wide">HOMEPAGE</a>
                <a href="#" class="text-white hover:text-gray-300 transition-colors font-medium text-sm uppercase tracking-wide">CONTACT</a>
                <a href="#" class="text-white hover:text-gray-300 transition-colors font-medium text-sm uppercase tracking-wide">PROJECTS</a>
                <a href="#" class="text-white hover:text-gray-300 transition-colors font-medium text-sm uppercase tracking-wide">PRICING</a>
                <a href="#" class="text-white hover:text-gray-300 transition-colors font-medium text-sm uppercase tracking-wide">ABOUT US</a>
                <a href="#" class="text-white hover:text-gray-300 transition-colors font-medium text-sm uppercase tracking-wide">JOBS</a>
                <button class="text-white hover:text-gray-300 transition-colors font-medium text-sm uppercase tracking-wide">MORE</button>
            </div>

            <!-- Social Links -->
            <div class="flex items-center space-x-4">
                <a href="#" class="text-white hover:text-red-500 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>
                <a href="#" class="text-white hover:text-pink-500 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.40z"/>
                    </svg>
                </a>
                <a href="#" class="bg-green-500 hover:bg-green-600 text-black px-4 py-2 rounded-lg font-semibold text-sm transition-colors">
                    CONTACT US
                </a>
            </div>
        </nav>
    </div>
</header>

<!-- Main Content -->
<main class="pt-16">
    <section class="min-h-screen bg-black flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-white mb-4">Test Navbar</h1>
            <p class="text-gray-400">Navbar should be visible at the top</p>
            <p class="text-green-400 mt-4">If you can see this text, the page is loading correctly</p>
        </div>
    </section>
</main>

</body>
</html>
