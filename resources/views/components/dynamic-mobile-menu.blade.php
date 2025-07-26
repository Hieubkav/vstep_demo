@php
try {
    $menuItems = \App\Models\MenuItem::getMenuTree();
} catch (\Exception $e) {
    $menuItems = collect();
}
@endphp

<nav class="p-6">
    <ul class="space-y-4">
        @foreach($menuItems as $item)
        <li>
            @if($item->children->count() > 0)
                {{-- Menu có submenu --}}
                <div class="py-3 px-4">
                    <button class="mobile-more-btn flex items-center justify-between w-full text-lg font-semibold text-white hover:text-stepv-primary uppercase transition-colors" 
                            data-target="submenu-{{ $item->id }}">
                        {{ $item->title }} <i class="mobile-more-icon fas fa-chevron-down text-sm transition-transform"></i>
                    </button>
                    <ul class="mobile-more-menu mt-2 ml-4 space-y-2 max-h-0 overflow-hidden transition-all duration-300" 
                        id="submenu-{{ $item->id }}">
                        @foreach($item->children as $child)
                        <li>
                            <a href="{{ $child->final_url }}" 
                               class="block py-2 px-4 text-base text-white hover:text-stepv-primary transition-colors"
                               @if($child->is_external) target="_blank" @endif>
                                {{ $child->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            @else
                {{-- Menu đơn --}}
                <a href="{{ $item->final_url }}" 
                   class="block py-3 px-4 text-lg font-semibold text-white hover:text-stepv-primary uppercase transition-colors"
                   @if($item->is_external) target="_blank" @endif>
                    {{ $item->title }}
                </a>
            @endif
        </li>
        @endforeach
    </ul>

    <div class="mt-8 pt-6 border-t border-white/20">
        <a href="#contact" class="block w-full text-center uppercase text-sm font-semibold text-stepv-primary bg-gradient-to-r from-black to-zinc-800 rounded-full px-6 py-4 transition-transform hover:scale-105">Contact Us</a>
    </div>
</nav>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile submenu functionality
    const mobileMoreBtns = document.querySelectorAll('.mobile-more-btn');
    
    mobileMoreBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const submenu = document.getElementById(targetId);
            const icon = this.querySelector('.mobile-more-icon');
            
            const isOpen = submenu.style.maxHeight && submenu.style.maxHeight !== '0px';
            
            if (isOpen) {
                submenu.style.maxHeight = '0px';
                icon.classList.remove('rotate-180');
            } else {
                submenu.style.maxHeight = submenu.scrollHeight + 'px';
                icon.classList.add('rotate-180');
            }
        });
    });
});
</script>
@endpush
