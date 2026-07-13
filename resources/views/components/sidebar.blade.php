<aside class="max-sm:hidden transition">
    <div class="h-full m-3 rounded-lg glass-panel flex flex-col justify-evenly items-center">
        <ul class="pt-8 space-y-6 flex flex-col items-center">
            <li class="mb-10 flex items-center justify-center mt-4">
                <a href="{{route('dashboard')}}" class="hover:scale-105 transition-transform">
                    <x-application-logo class="w-10 h-10"/>
                </a>
            </li>
            <li class="relative mb-5 flex items-center justify-center group hover:bg-violet-600 w-14 h-14 rounded-lg cursor-pointer transition-all {{ request()->routeIs('dashboard') ? 'bg-violet-600 shadow-lg shadow-violet-200' : 'bg-white/60' }}">
                <a href="{{route('dashboard')}}" class="flex items-center justify-center w-full h-full">
                    <svg class="{{ request()->routeIs('dashboard') ? 'fill-white' : 'fill-slate-700' }} group-hover:fill-white transition-colors w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                        <path d="M24 21h2v5h-2zm-4-5h2v10h-2zm-9 10a5.006 5.006 0 0 1-5-5h2a3 3 0 1 0 3-3v-2a5 5 0 0 1 0 10z"/>
                        <path d="M28 2H4a2.002 2.002 0 0 0-2 2v24a2.002 2.002 0 0 0 2 2h24a2.003 2.003 0 0 0 2-2V4a2.002 2.002 0 0 0-2-2Zm0 9H14V4h14ZM12 4v7H4V4ZM4 28V13h24l.002 15Z"/>
                    </svg>
                </a>
                <x-general-tooltip-top-right>{{ __('Dashboard') }}</x-general-tooltip-top-right>
            </li>
            <li class="relative mb-5 flex items-center justify-center group hover:bg-violet-600 w-14 h-14 rounded-lg cursor-pointer transition-all {{ request()->routeIs('project.*') ? 'bg-violet-600 shadow-lg shadow-violet-200' : 'bg-white/60' }}">
                <a href="{{route('project.index')}}" class="flex items-center justify-center w-full h-full">
                    <svg class="{{ request()->routeIs('project.*') ? 'fill-white' : 'fill-slate-700' }} group-hover:fill-white transition-colors w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 2048 2048">
                        <path d="M608 256q45 0 77 9t58 24t46 31t40 31t44 23t55 10h992q27 0 50 10t40 27t28 41t10 50v896h-128V512H928q-31 0-54 9t-44 24t-41 31t-45 31t-58 23t-78 10H128v1024h1024v128H0V384q0-27 10-50t27-40t41-28t50-10h480zm0 256q24 0 42-4t33-13t29-20t32-27q-17-15-31-26t-30-20t-33-13t-42-5H128v128h480zm1184 1152h256v128h-256v256h-128v-256h-256v-128h256v-256h128v256zm-339-723l-429 430l-429-430l90-90l339 338l339-338l90 90z"/>
                    </svg>
                </a>
                <x-general-tooltip-top-right>{{ __('Projects') }}</x-general-tooltip-top-right>
            </li>
            <li class="relative mb-5 flex items-center justify-center group hover:bg-violet-600 w-14 h-14 rounded-lg cursor-pointer transition-all {{ request()->routeIs('task.*') ? 'bg-violet-600 shadow-lg shadow-violet-200' : 'bg-white/60' }}">
                <a href="{{route('task.index')}}" class="flex items-center justify-center w-full h-full">
                    <svg class="{{ request()->routeIs('task.*') ? 'stroke-white' : 'stroke-slate-700' }} group-hover:stroke-white transition-colors w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" stroke-width="1.5" d="M12 20h12m-12-8h12M12 4h12M1 19l3 3l5-5m-8-6l3 3l5-5m0-8L4 6L1 3"/>
                    </svg>
                </a>
                <x-general-tooltip-top-right>{{ __('Tasks') }}</x-general-tooltip-top-right>
            </li>
            <li class="relative mb-5 flex items-center justify-center group hover:bg-violet-600 w-14 h-14 rounded-lg cursor-pointer transition-all {{ request()->routeIs('wallet.*') || request()->routeIs('transaction.*') ? 'bg-violet-600 shadow-lg shadow-violet-200' : 'bg-white/60' }}">
                <a href="{{route('wallet.index')}}" class="flex items-center justify-center w-full h-full">
                    <svg class="{{ request()->routeIs('wallet.*') || request()->routeIs('transaction.*') ? 'fill-white' : 'fill-slate-700' }} group-hover:fill-white transition-colors w-6 h-6" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="24" height="24">

                        <path d="M21,6H5c-.859,0-1.672-.372-2.235-.999,.55-.614,1.349-1.001,2.235-1.001H23c.553,0,1-.448,1-1s-.447-1-1-1H5C2.239,2,0,4.239,0,7v10c0,2.761,2.239,5,5,5H21c1.657,0,3-1.343,3-3V9c0-1.657-1.343-3-3-3Zm1,13c0,.551-.448,1-1,1H5c-1.654,0-3-1.346-3-3V6.998c.854,.639,1.904,1.002,3,1.002H21c.552,0,1,.449,1,1v10Zm-2-5c0,.552-.448,1-1,1s-1-.448-1-1,.448-1,1-1,1,.448,1,1Z"/>
                    </svg>
                </a>
                <x-general-tooltip-top-right>{{ __('Wallet') }}</x-general-tooltip-top-right>
            </li>
            <li class="relative mb-5 flex items-center justify-center group hover:bg-violet-600 w-14 h-14 rounded-lg cursor-pointer transition-all {{ request()->routeIs('profile.*') ? 'bg-violet-600 shadow-lg shadow-violet-200' : 'bg-white/60' }}">
                <a href="{{route('profile.view')}}" class="flex items-center justify-center w-full h-full">
                    <svg class="{{ request()->routeIs('profile.*') ? 'fill-white' : 'fill-slate-700' }} group-hover:fill-white transition-colors w-6 h-6" xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="24" height="24">

                        <path d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z"/>
                        <path d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z"/>
                    </svg>
                </a>
                <x-general-tooltip-top-right>{{ __('Profile') }}</x-general-tooltip-top-right>
            </li>
            <li class="relative mb-5 flex items-center justify-center group hover:bg-red-500 w-14 h-14 rounded-lg cursor-pointer transition-all bg-white/60">
                <form action="{{route('logout')}}" method="POST" class="flex items-center justify-center w-full h-full">
                    @csrf
                    <button type="submit" class="flex items-center justify-center w-full h-full">
                        <svg class="fill-slate-700 group-hover:fill-white transition-colors w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/>
                        </svg>
                    </button>
                </form>
                <x-general-tooltip-top-right>{{ __('Logout') }}</x-general-tooltip-top-right>
            </li>
        </ul>
    </div>
</aside>

<nav class="sm:hidden fixed inset-x-3 bottom-3 z-50 glass-panel rounded-lg px-2 py-2">
    <ul class="grid grid-cols-5 gap-1">
        <li>
            <a href="{{route('dashboard')}}" class="flex flex-col items-center gap-1 rounded-lg px-2 py-2 text-[11px] font-semibold {{ request()->routeIs('dashboard') ? 'bg-violet-600 text-white shadow-md' : 'text-slate-600' }}">
                <span class="text-[10px] uppercase tracking-wide">H</span>
                {{ __('Home') }}
            </a>
        </li>
        <li>
            <a href="{{route('project.index')}}" class="flex flex-col items-center gap-1 rounded-lg px-2 py-2 text-[11px] font-semibold {{ request()->routeIs('project.*') ? 'bg-violet-600 text-white shadow-md' : 'text-slate-600' }}">
                <span class="text-[10px] uppercase tracking-wide">P</span>
                {{ __('Projects') }}
            </a>
        </li>
        <li>
            <a href="{{route('task.index')}}" class="flex flex-col items-center gap-1 rounded-lg px-2 py-2 text-[11px] font-semibold {{ request()->routeIs('task.*') ? 'bg-violet-600 text-white shadow-md' : 'text-slate-600' }}">
                <span class="text-[10px] uppercase tracking-wide">T</span>
                {{ __('Tasks') }}
            </a>
        </li>
        <li>
            <a href="{{route('wallet.index')}}" class="flex flex-col items-center gap-1 rounded-lg px-2 py-2 text-[11px] font-semibold {{ request()->routeIs('wallet.*') || request()->routeIs('transaction.*') ? 'bg-violet-600 text-white shadow-md' : 'text-slate-600' }}">
                <span class="text-[10px] uppercase tracking-wide">$</span>
                {{ __('Wallet') }}
            </a>
        </li>
        <li>
            <a href="{{route('profile.view')}}" class="flex flex-col items-center gap-1 rounded-lg px-2 py-2 text-[11px] font-semibold {{ request()->routeIs('profile.*') ? 'bg-violet-600 text-white shadow-md' : 'text-slate-600' }}">
                <span class="text-[10px] uppercase tracking-wide">U</span>
                {{ __('Profile') }}
            </a>
        </li>
    </ul>
</nav>
