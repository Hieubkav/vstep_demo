<!-- Word Slider Section -->
<section class="relative overflow-hidden bg-black py-16">
    <!-- First Row - Black Background with White Text -->
    <div class="relative">
        <div class="flex animate-slide-right whitespace-nowrap">
            <div class="flex items-center space-x-8 text-white text-4xl md:text-6xl lg:text-8xl font-bold">
                <span>EMPOWER</span>
                <span>ELEVATE</span>
                <span>ENCHANT</span>
                <span>EMPOWER</span>
                <span>ELEVATE</span>
                <span>ENCHANT</span>
                <span>EMPOWER</span>
                <span>ELEVATE</span>
                <span>ENCHANT</span>
                <span>EMPOWER</span>
                <span>ELEVATE</span>
                <span>ENCHANT</span>
            </div>
        </div>
    </div>

    <!-- Second Row - White Background with Black Text -->
    <div class="relative bg-white mt-4">
        <div class="flex animate-slide-left whitespace-nowrap">
            <div class="flex items-center space-x-8 text-black text-4xl md:text-6xl lg:text-8xl font-bold">
                <span>EMPOWER</span>
                <span>ELEVATE</span>
                <span>ENCHANT</span>
                <span>EMPOWER</span>
                <span>ELEVATE</span>
                <span>ENCHANT</span>
                <span>EMPOWER</span>
                <span>ELEVATE</span>
                <span>ENCHANT</span>
                <span>EMPOWER</span>
                <span>ELEVATE</span>
                <span>ENCHANT</span>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes slide-right {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(0%);
    }
}

@keyframes slide-left {
    0% {
        transform: translateX(0%);
    }
    100% {
        transform: translateX(-100%);
    }
}

.animate-slide-right {
    animation: slide-right 20s linear infinite;
}

.animate-slide-left {
    animation: slide-left 20s linear infinite;
}

/* Responsive text sizes */
@media (max-width: 768px) {
    .text-4xl {
        font-size: 2rem;
    }
}

@media (min-width: 769px) and (max-width: 1024px) {
    .text-6xl {
        font-size: 3.5rem;
    }
}

@media (min-width: 1025px) {
    .text-8xl {
        font-size: 6rem;
    }
}
</style>
