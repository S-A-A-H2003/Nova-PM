<div class="relative w-full min-h-[240px] modern-card overflow-hidden">
    <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-violet-600 via-sky-500 to-emerald-400"></div>
    <div class="relative z-10 grid gap-6 p-6 sm:p-8 lg:grid-cols-[1fr,260px] lg:items-center">
        <div>
            <p class="mb-3 text-sm font-semibold text-violet-600">{{ __('Welcome back') }}</p>
            <h1 class="text-2xl sm:text-4xl font-bold text-slate-900">{{ Auth::user()->name }}</h1>
            <p class="mt-4 max-w-2xl text-sm sm:text-base leading-7 text-slate-600">
                {{ __('Create projects, manage tasks, review deliveries, and keep your professional profile ready from one calm workspace.') }}
            </p>
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{route('project.index')}}" class="btn-primary">
                    {{ __("Let's Start") }}
                    <span aria-hidden="true">→</span>
                </a>
                <a href="{{route('task.index')}}" class="btn-secondary">
                    {{ __('Browse Tasks') }}
                </a>
            </div>
        </div>
        <div class="hidden lg:flex h-48 items-center justify-center">
            <img src="{{asset('assets/dashbord-time-management-amico.png')}}" alt="{{ __('Dashboard illustration') }}" class="h-full w-full object-contain drop-shadow-sm">
        </div>
    </div>
</div>
