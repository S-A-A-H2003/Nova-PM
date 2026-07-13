<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#7c3aed">

    <title>@yield('title') - Maham</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    {{-- Summernote --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <section class="app-shell">

        <!-- Sidebar -->
        <x-sidebar />

        <!-- Page Content -->
        <main class="app-main">
            <div class="animate-fade-in-up">
                @yield('content')
            </div>
        </main>

        @if($isProfile ?? false)
        <!-- Profile Sidebar -->
        <x-profile-sidebar />
        @else
        <!-- Secondary Sidebar -->
        <x-secondary-sidebar />
        @endif
    </section>

    @stack('scripts')
    <script>
        $(document).ready(function() {
                $('textarea[placeholder="Description"]').summernote({
                    placeholder: '{{ __('Write description here...') }}',
                    tabsize: 2,
                    height: 120,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            });
    </script>
    @if(session('success'))
    <script>
        Swal.fire({
                    title: '{{ __('Done') }}',
                    text: {!! json_encode(session('success')) !!},
                    icon: 'success',
                    confirmButtonText: '{{ __('Great') }}'
                });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
                    title: '{{ __('Something went wrong') }}',
                    text: {!! json_encode(session('error')) !!},
                    icon: 'error',
                    confirmButtonText: '{{ __('Try again') }}'
                });
    </script>
    @endif
</body>

</html>
