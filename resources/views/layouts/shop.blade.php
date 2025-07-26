<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    @include('partials.head')

    @include('partials.styles')

</head>

<body class="antialiased bg-black text-white">

@include('components.header')

<main>
    @yield('content')
</main>

<x-dynamic-footer />

{{-- Connection Indicator for Video Optimization --}}
<x-connection-indicator :show="true" position="bottom-right" />

{{-- @livewire('notifications') --}}

@include('partials.scripts')

</body>
</html>
