<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Maham | {{ __('Project Management and Training Platform') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                /* (unchanged content) */
            </style>
        @endif
    </head>

    <body class="min-h-screen bg-gradient-to-b from-violet-100 via-violet-200 to-violet-300 font-sans">

        <!-- Navbar -->
        <header class="w-full bg-violet-800 rounded-b-lg fixed text-white shadow-2xl z-50">
            <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-4 py-4 px-6">
                <div class="text-2xl font-bold">{{ __('Maham') }}</div>

                <nav class="flex flex-wrap items-center gap-4 text-sm md:text-base">
                    <a href="#home" class="hover:text-violet-300 transition">{{ __('Home') }}</a>
                    <a href="#features" class="hover:text-violet-300 transition">{{ __('Features') }}</a>
                    <a href="#how_it_works" class="hover:text-violet-300 transition">{{ __('How it works') }}</a>
                    <a href="#contact" class="hover:text-violet-300 transition">{{ __('Contact us') }}</a>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="hover:text-violet-300 transition border p-3 border-violet-300 rounded-md">{{ __('Dashboard') }}</a>
                        @else
                            <a href="{{ route('login') }}" class="hover:text-violet-300 transition border p-3 border-violet-300 rounded-md">{{ __('Log in') }}</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="hover:text-violet-300 transition border p-3 border-violet-300 rounded-md">{{ __('Register') }}</a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </div>
        </header>

        <!-- Home Section -->
        <section class="max-w-7xl mx-auto text-center pb-24 pt-48 px-6" id="home">
            <div class="mx-auto max-w-4xl rounded-[40px] bg-white/90 border border-violet-200 p-8 sm:p-12 shadow-2xl backdrop-blur-xl">
                <h1 class="text-3xl sm:text-5xl font-extrabold text-violet-900 mb-6 sm:mb-8">
                    {{ __('An integrated platform for project management, training, and resume building.') }}
                </h1>

                <p class="text-violet-700 text-base sm:text-lg leading-8 mb-8 sm:mb-10">
                    {{ __('Design your project, define tasks, track students and freelancers, and get training certificates while adding achievements directly to your resume.') }}
                </p>

                <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                    <a href="{{route('register')}}" class="inline-flex items-center justify-center rounded-full bg-violet-700 px-6 sm:px-8 py-3 sm:py-4 text-base sm:text-lg font-semibold text-white shadow-lg transition hover:bg-violet-800">
                        {{ __('Get Started') }}
                    </a>
                    <a href="#features" class="inline-flex items-center justify-center rounded-full border border-violet-700 px-6 sm:px-8 py-3 sm:py-4 text-base sm:text-lg font-semibold text-violet-700 transition hover:bg-violet-100">
                        {{ __('Explore Features') }}
                    </a>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="max-w-7xl mx-auto py-20 sm:py-24 px-6">
            <h2 class="text-3xl sm:text-4xl font-bold text-violet-900 text-center mb-10 sm:mb-12">{{ __('Platform Features') }}</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">

                <div class="rounded-[32px] bg-white p-6 sm:p-8 text-center shadow-xl transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="text-5xl sm:text-6xl mb-4 sm:mb-5 flex justify-center">📝</div>
                    <h3 class="text-lg sm:text-xl font-semibold mb-2 sm:mb-3 text-gray-800">{{ __('Create Projects and Tasks') }}</h3>
                    <p class="text-violet-600 leading-7 text-sm sm:text-base">
                        {{ __('Create your project with all its details and easily define tasks and requirements.') }}
                    </p>
                </div>

                <div class="rounded-[32px] bg-white p-6 sm:p-8 text-center shadow-xl transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="text-5xl sm:text-6xl mb-4 sm:mb-5 flex justify-center">🤝</div>
                    <h3 class="text-lg sm:text-xl font-semibold mb-2 sm:mb-3 text-gray-800">{{ __('Collaborate with Students and Freelancers') }}</h3>
                    <p class="text-violet-600 leading-7 text-sm sm:text-base">
                        {{ __('Assign tasks to students or freelancers and track progress step by step.') }}
                    </p>
                </div>

                <div class="rounded-[32px] bg-white p-6 sm:p-8 text-center shadow-xl transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="text-5xl sm:text-6xl mb-4 sm:mb-5 flex justify-center">🎓</div>
                    <h3 class="text-lg sm:text-xl font-semibold mb-2 sm:mb-3 text-gray-800">{{ __('Trusted Training Certificates') }}</h3>
                    <p class="text-violet-600 leading-7 text-sm sm:text-base">
                        {{ __('Students receive a training certificate after completing the required number of tasks.') }}
                    </p>
                </div>

                <div class="rounded-[32px] bg-white p-6 sm:p-8 text-center shadow-xl transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="text-5xl sm:text-6xl mb-4 sm:mb-5 flex justify-center">📄</div>
                    <h3 class="text-lg sm:text-xl font-semibold mb-2 sm:mb-3 text-gray-800">{{ __('Professional Resume') }}</h3>
                    <p class="text-violet-600 leading-7 text-sm sm:text-base">
                        {{ __('Automatically add completed achievements to the resume.') }}
                    </p>
                </div>

            </div>
        </section>

        <!-- How It Works Section -->
        <section id="how_it_works" class="bg-violet-200 py-16 sm:py-20 px-6">
            <h2 class="text-3xl sm:text-4xl font-bold text-violet-900 text-center mb-10 sm:mb-12">{{ __('How the System Works') }}</h2>

            <div class="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">

                <div class="p-5 sm:p-6 bg-violet-100 rounded-lg shadow-lg text-center">
                    <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">1️⃣</div>
                    <h3 class="text-lg sm:text-xl font-semibold mb-2 text-gray-800">{{ __('Create your project') }}</h3>
                    <p class="text-gray-700 text-sm sm:text-base">{{ __('Define project details, task types, and required outcomes.') }}</p>
                </div>

                <div class="p-5 sm:p-6 bg-violet-100 rounded-lg shadow-lg text-center">
                    <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">2️⃣</div>
                    <h3 class="text-lg sm:text-xl font-semibold mb-2 text-gray-800">{{ __('Assign tasks') }}</h3>
                    <p class="text-gray-700 text-sm sm:text-base">{{ __('Assign tasks to students or freelancers and track progress step by step.') }}</p>
                </div>

                <div class="p-5 sm:p-6 bg-violet-100 rounded-lg shadow-lg text-center">
                    <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">3️⃣</div>
                    <h3 class="text-lg sm:text-xl font-semibold mb-2 text-gray-800">{{ __('Track progress') }}</h3>
                    <p class="text-gray-700 text-sm sm:text-base">{{ __('Monitor completed and pending tasks and evaluate performance easily.') }}</p>
                </div>

                <div class="p-5 sm:p-6 bg-violet-100 rounded-lg shadow-lg text-center">
                    <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">4️⃣</div>
                    <h3 class="text-lg sm:text-xl font-semibold mb-2 text-gray-800">{{ __('Certificate & Resume') }}</h3>
                    <p class="text-gray-700 text-sm sm:text-base">{{ __('After completing required tasks, the student receives a certificate and achievements are added to the resume.') }}</p>
                </div>

            </div>
        </section>

        <!-- Contact Us -->
        <section id="contact" class="bg-violet-50 px-6 py-16 sm:py-20">
            <div class="mx-auto max-w-5xl rounded-[36px] bg-white p-8 sm:p-10 shadow-2xl border border-violet-200">
                <h2 class="text-3xl sm:text-4xl font-bold text-violet-900 text-center mb-8 sm:mb-10">{{ __('Contact Us') }}</h2>
                <x-welcome-contact-us></x-welcome-contact-us>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-violet-900 text-violet-100 py-12 sm:py-14 px-6">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

                <div class="space-y-4">
                    <h4 class="font-bold text-lg">{{ __('Maham') }}</h4>
                    <p class="text-violet-300 text-sm sm:text-base">
                        {{ __('An integrated platform for project management, training, and resume building.') }}
                    </p>
                </div>

                <div class="space-y-4">
                    <h4 class="font-bold text-lg">{{ __('Quick Links') }}</h4>
                    <ul class="space-y-3 text-violet-300 text-sm sm:text-base">
                        <li><a href="#home" class="hover:text-white transition">{{ __('Home') }}</a></li>
                        <li><a href="#features" class="hover:text-white transition">{{ __('Features') }}</a></li>
                        <li><a href="#how_it_works" class="hover:text-white transition">{{ __('How it works') }}</a></li>
                        <li><a href="#contact" class="hover:text-white transition">{{ __('Contact us') }}</a></li>
                    </ul>
                </div>

                <div class="space-y-4">
                    <h4 class="font-bold text-lg">{{ __('Follow Us') }}</h4>
                    <div class="flex items-center gap-4 text-2xl sm:text-3xl">
                        <a href="#" class="hover:text-white transition" aria-label="Twitter">🐦</a>
                        <a href="#" class="hover:text-white transition" aria-label="Facebook">📘</a>
                        <a href="#" class="hover:text-white transition" aria-label="GitHub">💻</a>
                    </div>
                </div>

            </div>

            <p class="text-center mt-8 sm:mt-10 text-violet-400 text-sm sm:text-base">© 2025 {{ __('Maham') }}. {{ __('All rights reserved.') }}</p>
        </footer>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
