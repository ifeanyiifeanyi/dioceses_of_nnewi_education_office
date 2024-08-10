<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    <!-- loader-->
    <link href="{{ asset('') }}frontend/assets/css/pace.min.css" rel="stylesheet">
    <script src="{{ asset('') }}frontend/assets/js/pace.min.js"></script>

    <!--plugins-->
    <link href="{{ asset('') }}frontend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}frontend/assets/plugins/metismenu/metisMenu.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}frontend/assets/plugins/metismenu/mm-vertical.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}frontend/assets/plugins/simplebar/css/simplebar.css">
    <!--bootstrap css-->
    <link href="{{ asset('') }}frontend/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="{{ asset('') }}frontend/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="{{ asset('') }}frontend/sass/main.css" rel="stylesheet">
    <link href="{{ asset('') }}frontend/sass/dark-theme.css" rel="stylesheet">
    <link href="{{ asset('') }}frontend/sass/blue-theme.css" rel="stylesheet">
    <link href="{{ asset('') }}frontend/sass/semi-dark.css" rel="stylesheet">
    <link href="{{ asset('') }}frontend/sass/bordered-theme.css" rel="stylesheet">
    <link href="{{ asset('') }}frontend/sass/responsive.css" rel="stylesheet">
    @yield('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css">

</head>

<body>

    <!--start header-->
    @include('admin.layouts.partials.header')
    <!--end top header-->


    <!--start sidebar-->
    @include('admin.layouts.partials.navbar')
    <!--end sidebar-->

    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Dashboard</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.blog.view') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary">Settings</button>
                        <button type="button"
                            class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"> <span class="visually-hidden">Actions</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                            <a class="dropdown-item" href="{{ route('admin.blog.view') }}">Blog</a>
                            <a class="dropdown-item" href="{{ route('admin.category.view') }}">Blog Categories</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item"
                                href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            @yield('content')


        </div>
    </main>
    <!--end main wrapper-->

    @include('admin.layouts.partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-wysiwyg@2.0.1/js/bootstrap-wysiwyg.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!--bootstrap js-->
    <script src="{{ asset('') }}frontend/assets/js/bootstrap.bundle.min.js"></script>

    <!--plugins-->
    <script src="{{ asset('') }}frontend/assets/js/jquery.min.js"></script>
    <!--plugins-->
    <script src="{{ asset('') }}frontend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="{{ asset('') }}frontend/assets/plugins/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('') }}frontend/assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="{{ asset('') }}frontend/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{ asset('') }}frontend/assets/plugins/peity/jquery.peity.min.js"></script>
    <script>
        $(".data-attributes span").peity("donut")
    </script>
    <script src="{{ asset('') }}frontend/assets/js/main.js"></script>
    <script src="{{ asset('') }}frontend/assets/js/dashboard1.js"></script>
    <script>
        new PerfectScrollbar(".user-list")
    </script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"

            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
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


    @yield('js')
</body>

</html>
