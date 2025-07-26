@php
try {
    $menuItems = \App\Models\MenuItem::getMenuTree();
} catch (\Exception $e) {
    $menuItems = collect();
}
@endphp

<nav class="hidden lg:flex justify-center w-1/2">
    <ul class="flex items-center space-x-2">
        @foreach($menuItems as $item)
        <li>
            @if($item->children->count() > 0)
                {{-- Menu có submenu --}}
                <div class="relative group">
                    <a href="{{ $item->final_url }}" class="px-5 py-2 uppercase font-semibold text-sm text-white hover:text-stepv-primary transition-colors flex items-center gap-2">
                        {{ $item->title }} <i class="fas fa-chevron-down text-[10px]"></i>
                    </a>
                    <ul class="absolute top-full left-0 mt-2 w-48 bg-black/90 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                        @foreach($item->children as $child)
                        <li>
                            <a href="{{ $child->final_url }}" 
                               class="block px-4 py-3 text-sm text-white hover:bg-zinc-800 hover:text-stepv-primary"
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
                   class="px-5 py-2 uppercase font-semibold text-sm text-white hover:text-stepv-primary transition-colors"
                   @if($item->is_external) target="_blank" @endif>
                    {{ $item->title }}
                </a>
            @endif
        </li>
        @endforeach
    </ul>
</nav>
