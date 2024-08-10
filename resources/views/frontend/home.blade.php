@extends('frontend.layouts.front')

@section('title', 'Home')

@section('front')
    <main class="main">

        <!-- Hero Section -->
        @include('frontend.sections.hero_section')
        <!-- /Hero Section -->

        <!-- Clients Section -->
        {{-- @include('frontend.sections.client_section') --}}
        <!-- /Clients Section -->

        <!-- About Section -->
        @include('frontend.sections.about')
        <!-- /About Section -->

        <!-- Stats Section -->
        @include('frontend.sections.stats')
        <!-- /Stats Section -->

        <!-- Portfolio Section -->
        @include('frontend.sections.portfolio')
        <!-- /Portfolio Section -->


        <!-- Services Section -->
        @include('frontend.sections.services')
        <!-- /Services Section -->

        <!-- Features Section -->
        @include('frontend.sections.features')
        <!-- /Features Section -->



        <!-- Pricing Section -->
        @include('frontend.sections.pricing')
        <!-- /Pricing Section -->

        <!-- Faq Section -->
        @include('frontend.sections.faq')
        <!-- /Faq Section -->

        <!-- Team Section -->
        {{-- @include('frontend.sections.team') --}}
        <!-- /Team Section -->

        <!-- Call To Action Section -->
        @include('frontend.sections.call_to_action')
        <!-- /Call To Action Section -->

        <!-- Testimonials Section -->
        @include('frontend.sections.testimonials')
        <!-- /Testimonials Section -->

        <!-- Recent Posts Section -->
        @include('frontend.sections.recent_posts')
        <!-- /Recent Posts Section -->

        <!-- Contact Section -->
        @include('frontend.sections.contact')
        <!-- /Contact Section -->

    </main>
@endsection
