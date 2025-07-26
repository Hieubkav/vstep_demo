@props([
    'id' => null,
    'class' => '',
    'background' => 'bg-black',
    'padding' => 'py-20',
    'container' => true
])

<section 
    @if($id) id="{{ $id }}" @endif
    class="{{ $background }} {{ $padding }} {{ $class }}"
>
    @if($container)
        <div class="container mx-auto px-4">
            {{ $slot }}
        </div>
    @else
        {{ $slot }}
    @endif
</section>
