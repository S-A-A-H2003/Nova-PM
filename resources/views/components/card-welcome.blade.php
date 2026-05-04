<div class="relative w-full h-[220px] bg-gradient-to-br from-violet-50 to-violet-100 rounded-2xl transition-all hover:shadow-lg border border-violet-100 overflow-hidden">
    <div class="absolute top-0 right-0 w-32 h-32 bg-violet-200 rounded-full -translate-y-1/2 translate-x-1/2 opacity-50"></div>
    <div class="absolute bottom-0 left-0 w-24 h-24 bg-violet-300 rounded-full translate-x-1/2 translate-y-1/2 opacity-30"></div>
    <div class="relative z-10 p-8">
        <div class="mb-3">
            <h1 class="font-bold text-2xl text-[#2D1B69] max-sm:text-xl">{{ __('Welcome back') }},</h1>
        </div>
        <div class="mb-5">
            <p class="text-lg text-[#2D1B69] font-medium max-sm:text-base">{{ Auth::user()->name }}</p>
        </div>
        <a href="{{route('project.index')}}" class="inline-flex items-center px-5 py-2.5 bg-violet-600 hover:bg-violet-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-200">
            <span>{{ __('Let\'s Start') }}</span>
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
        </a>
    </div>
    <div class="absolute top-0 right-0 w-[200px] h-[200px] max-lg:hidden">
        <img src="{{asset('assets/dashbord-time-management-amico.png')}}" alt="{{ __('Dashboard illustration') }}" class="w-full h-full object-contain">
    </div>
</div>
