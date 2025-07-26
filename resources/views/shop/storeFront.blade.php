{{-- 
    Step V Studio Storefront Page
    Clean and optimized structure using partials and components
--}}
@extends('layouts.shop')

@section('content')
    {{-- Hero Section --}}
    @include('components.hero')

    {{-- Word Slider --}}
    @include('components.word-slider')

    {{-- Gallery Picture --}}
    @include('components.gallery-picture')

    {{-- Your Advice --}}
    @include('components.your-advice')

    {{-- Stats Section --}}
    @include('components.stats')

    {{-- Services Section --}}
    @include('components.services')

    {{-- Why Choose Us Section --}}
    @include('components.why-choose-us')

    {{-- Turning --}}
    @include('components.turning')

    {{-- Logo Brand --}}
    @include('components.logo_brand')

    {{-- How We Work --}}
    @include('components.we_work')

    {{-- Stay Control --}}
    @include('components.stay_control')

    {{-- Contact Form --}}
    @include('components.form')
@endsection
