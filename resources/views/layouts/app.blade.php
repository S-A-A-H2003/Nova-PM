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
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF8GZEXK3h8yWlM7Ld5F2F8F5F5" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

        {{-- sweetalert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#F3F5F9]">
        <section class="min-h-screen grid grid-cols-[131px,auto,379px] grid-rows-[100vh] max-xl:grid-cols-[131px,auto] max-sm:grid-cols-[auto] transition">

            <!-- Sidebar -->
            <x-sidebar/>

            <!-- Page Content -->
            <main class="pt-16 px-4 pb-8 bg-[#F3F5F9] overflow-y-scroll">
                @yield('content')
            </main>

            @if($isProfile ?? false)
                <!-- Profile Sidebar -->
                <x-profile-sidebar/>
            @else
                <!-- Secondary Sidebar -->
                <x-secondary-sidebar/>
            @endif
        </section>

        @stack('scripts')
        <script>
            $(document).ready(function() {
                $('.description').summernote({
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

                @if(session('success'))
                Swal.fire({
                    title: '{{ __('Success!') }}',
                    text: {!! json_encode(session('success')) !!},
                    icon: 'success',
                    confirmButtonColor: '#7c3aed',
                    confirmButtonText: '{{ __('OK') }}'
                });
                @endif

                @if(session('error'))
                Swal.fire({
                    title: '{{ __('Oops!') }}',
                    text: {!! json_encode(session('error')) !!},
                    icon: 'error',
                    confirmButtonColor: '#7c3aed',
                    confirmButtonText: '{{ __('OK') }}'
                });
                @endif
            });
        </script>
    </body>
</html>
