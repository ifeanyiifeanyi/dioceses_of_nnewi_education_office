<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ config('app.name') }} - @yield('title')</title>
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
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('') }}front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('') }}front/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('') }}front/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('') }}front/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('') }}front/assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css">

</head>

<body class="index-page">

    @include('frontend.layouts.partials.header')

    @yield('front')

    @include('frontend.layouts.partials.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    {{-- <div id="preloader"></div> --}}

    <!-- Vendor JS Files -->
    <script src="{{ asset('') }}front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}front/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ asset('') }}front/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('') }}front/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('') }}front/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('') }}front/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('') }}front/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('') }}front/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="{{ asset('') }}front/assets/js/main.js"></script>
    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
            }
        }
    </script>
    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font
        } from 'ckeditor5';

        ClassicEditor
            .create(document.querySelector('#editor'), {
                plugins: [Essentials, Paragraph, Bold, Italic, Font],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>
