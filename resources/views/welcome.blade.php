<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}} | {{ __('Project Management and Training Platform') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">
        <header class="fixed inset-x-0 top-0 z-50 px-4 py-3">
            <div class="mx-auto flex max-w-7xl items-center justify-between rounded-lg border border-white/70 bg-white/85 px-4 py-3 shadow-sm backdrop-blur-xl">
                <a href="#home" class="text-xl font-extrabold text-slate-900">{{config('app.name')}}</a>

                <nav class="hidden items-center gap-6 text-sm font-semibold text-slate-600 md:flex">
                    <a href="#home" class="hover:text-violet-600">{{ __('Home') }}</a>
                    <a href="#features" class="hover:text-violet-600">{{ __('Features') }}</a>
                    <a href="#how_it_works" class="hover:text-violet-600">{{ __('How it works') }}</a>
                    <a href="#contact" class="hover:text-violet-600">{{ __('Contact us') }}</a>
                </nav>

                <div class="flex items-center gap-2">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn-primary px-4 py-2 text-sm">{{ __('Dashboard') }}</a>
                        @else
                            <a href="{{ route('login') }}" class="btn-secondary px-4 py-2 text-sm">{{ __('Log in') }}</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn-primary px-4 py-2 text-sm">{{ __('Register') }}</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        <main id="home">
            <section class="mx-auto grid min-h-screen max-w-7xl items-center gap-10 px-6 pb-20 pt-32 lg:grid-cols-[1.05fr,.95fr]">
                <div class="animate-fade-in-up">
                    <p class="mb-4 inline-flex rounded-full border border-violet-200 bg-white/80 px-4 py-2 text-sm font-semibold text-violet-700 shadow-sm">
                        {{ __('Project Management and Training Platform') }}
                    </p>
                    <h1 class="max-w-4xl text-4xl font-extrabold leading-tight text-slate-950 sm:text-6xl">
                        {{ __('An integrated platform for project management, training, and resume building.') }}
                    </h1>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
                        {{ __('Design your project, define tasks, track students and freelancers, and get training certificates while adding achievements directly to your resume.') }}
                    </p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="{{route('register')}}" class="btn-primary">{{ __('Get Started') }}</a>
                        <a href="#features" class="btn-secondary">{{ __('Explore Features') }}</a>
                    </div>
                </div>

                <div class="animate-soft-scale">
                    <div class="modern-card relative overflow-hidden p-5 sm:p-6">
                        <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-violet-600 via-sky-500 to-emerald-400"></div>
                        <div class="grid gap-4">
                            <div class="rounded-lg bg-slate-50 p-4">
                                <div class="mb-3 flex items-center justify-between">
                                    <span class="text-sm font-semibold text-slate-600">{{ __('Projects') }}</span>
                                    <span class="status-pill bg-emerald-100 text-emerald-700">{{ __('Active') }}</span>
                                </div>
                                <div class="h-3 w-2/3 rounded-full bg-slate-200"></div>
                                <div class="mt-3 h-2 rounded-full bg-gradient-to-r from-violet-600 to-sky-500"></div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="rounded-lg bg-white p-4 shadow-sm ring-1 ring-slate-100">
                                    <p class="text-sm text-slate-500">{{ __('Tasks') }}</p>
                                    <p class="mt-2 text-3xl font-bold text-slate-900">24</p>
                                </div>
                                <div class="rounded-lg bg-white p-4 shadow-sm ring-1 ring-slate-100">
                                    <p class="text-sm text-slate-500">{{ __('Certificates') }}</p>
                                    <p class="mt-2 text-3xl font-bold text-slate-900">10</p>
                                </div>
                            </div>
                            <div class="rounded-lg bg-slate-950 p-5 text-white">
                                <p class="text-sm text-slate-300">{{ __('Progress') }}</p>
                                <p class="mt-2 text-2xl font-bold">{{ __('Track progress') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="features" class="mx-auto max-w-7xl px-6 py-20">
                <div class="mb-10 text-center">
                    <p class="text-sm font-semibold text-violet-600">{{ __('Features') }}</p>
                    <h2 class="mt-2 text-3xl font-bold text-slate-950 sm:text-4xl">{{ __('Platform Features') }}</h2>
                </div>
                <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach([
                        ['Create Projects and Tasks', 'Create your project with all its details and easily define tasks and requirements.'],
                        ['Collaborate with Students and Freelancers', 'Assign tasks to students or freelancers and track progress step by step.'],
                        ['Trusted Training Certificates', 'Students receive a training certificate after completing the required number of tasks.'],
                        ['Professional Resume', 'Automatically add completed achievements to the resume.'],
                    ] as $feature)
                        <div class="modern-card p-6">
                            <div class="mb-5 h-10 w-10 rounded-lg bg-violet-100"></div>
                            <h3 class="text-lg font-bold text-slate-900">{{ __($feature[0]) }}</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600">{{ __($feature[1]) }}</p>
                        </div>
                    @endforeach
                </div>
            </section>

            <section id="how_it_works" class="bg-white/55 px-6 py-20">
                <div class="mx-auto max-w-7xl">
                    <div class="mb-10 text-center">
                        <p class="text-sm font-semibold text-violet-600">{{ __('How it works') }}</p>
                        <h2 class="mt-2 text-3xl font-bold text-slate-950 sm:text-4xl">{{ __('How the System Works') }}</h2>
                    </div>
                    <div class="grid gap-5 md:grid-cols-4">
                        @foreach([
                            ['01', 'Create your project', 'Define project details, task types, and required outcomes.'],
                            ['02', 'Assign tasks', 'Assign tasks to students or freelancers and track progress step by step.'],
                            ['03', 'Track progress', 'Monitor completed and pending tasks and evaluate performance easily.'],
                            ['04', 'Certificate & Resume', 'After completing required tasks, the student receives a certificate and achievements are added to the resume.'],
                        ] as $step)
                            <div class="modern-card p-6">
                                <span class="text-sm font-bold text-violet-600">{{ $step[0] }}</span>
                                <h3 class="mt-4 text-lg font-bold text-slate-900">{{ __($step[1]) }}</h3>
                                <p class="mt-3 text-sm leading-7 text-slate-600">{{ __($step[2]) }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="contact" class="px-6 py-20">
                <div class="mx-auto max-w-5xl modern-card p-6 sm:p-10">
                    <h2 class="mb-8 text-center text-3xl font-bold text-slate-950 sm:text-4xl">{{ __('Contact Us') }}</h2>
                    <x-welcome-contact-us />
                </div>
            </section>
        </main>

        <footer class="border-t border-slate-200 bg-white/70 px-6 py-10">
            <div class="mx-auto flex max-w-7xl flex-col gap-4 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between">
                <p>© 2026 {{ __('Maham') }}. {{ __('All rights reserved.') }}</p>
                <div class="flex gap-4">
                    <a href="#features" class="hover:text-violet-600">{{ __('Features') }}</a>
                    <a href="#contact" class="hover:text-violet-600">{{ __('Contact us') }}</a>
                </div>
            </div>
        </footer>
    </body>
</html>
