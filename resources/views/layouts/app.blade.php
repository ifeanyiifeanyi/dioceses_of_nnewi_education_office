<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description"
        content="Welcome to Catholic Diocese of Nnewi Education Services. Discover a vibrant community dedicated to inclusive education, faith, service, and personal integrity. We provide holistic education, integrating academic excellence with spiritual growth, moral development, and personal integrity through the teachings of Jesus Christ.">
    <meta name="keywords"
        content="Catholic Diocese of Nnewi, education services, inclusive education, faith-based education, holistic education, academic excellence, moral education, spiritual growth, personal integrity, religious education, community engagement, teacher training, student development, Anambra State, Nigeria">

    {{-- facebook  --}}
    <meta property="og:title" content="Catholic Diocese of Nnewi Education Services">
    <meta property="og:description"
        content="Welcome to Catholic Diocese of Nnewi Education Services. Discover a vibrant community dedicated to inclusive education, faith, service, and personal integrity. We provide holistic education, integrating academic excellence with spiritual growth, moral development, and personal integrity through the teachings of Jesus Christ.">
    <meta property="og:image" content="{{ asset('logo.png') }}"> <!-- Replace with actual image URL -->
    <meta property="og:url" content="https://eduofficennewi.com.ng/public">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Catholic Diocese of Nnewi Education Services">

    {{-- twitter  --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Catholic Diocese of Nnewi Education Services">
    <meta name="twitter:description"
        content="Welcome to Catholic Diocese of Nnewi Education Services. Discover a vibrant community dedicated to inclusive education, faith, service, and personal integrity. We provide holistic education, integrating academic excellence with spiritual growth, moral development, and personal integrity through the teachings of Jesus Christ.">
    <meta name="twitter:image" content="{{ asset('logo.png') }}">
    <!-- Replace with actual image URL -->
    <meta name="twitter:site" content="@YourTwitterHandle"> <!-- Replace with actual Twitter handle if available -->

    {{-- link sharing  --}}
    <meta property="og:title" content="Catholic Diocese of Nnewi Education Services">
    <meta property="og:description"
        content="Welcome to Catholic Diocese of Nnewi Education Services. Discover a vibrant community dedicated to inclusive education, faith, service, and personal integrity. We provide holistic education, integrating academic excellence with spiritual growth, moral development, and personal integrity through the teachings of Jesus Christ.">
    <meta property="og:image" content="{{ asset('logo.jpg') }}"> <!-- Replace with actual image URL -->
    <meta property="og:url" content="https://eduofficennewi.com.ng/public">

    <!-- Favicons -->
    <link href="{{ asset('logo.png') }}" rel="icon">
    <link href="{{ asset('logo.png') }}" rel="apple-touch-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
