<a href="{{route('project.show' , $project->id)}}">
<div class="w-full min-h-[200px] sm:min-h-[220px] modern-card hover:border-violet-200 overflow-hidden group">
    <div class="p-4 sm:p-5 h-full flex flex-col">
        <div class="flex items-start justify-between mb-2 sm:mb-3">
            <p class="text-xs sm:text-sm text-slate-500">{{ $project->created_at->format('M d, Y') }}</p>
            @if($project->status == 'active')
                <span class="status-pill bg-emerald-100 text-emerald-700">
                    {{ __('Active') }}
                </span>
            @else
                <span class="status-pill bg-slate-100 text-slate-600">
                    {{ __('Stopped') }}
                </span>
            @endif
        </div>
        <h1 class="font-bold text-base sm:text-lg text-slate-900 mb-1 sm:mb-2 group-hover:text-violet-600 transition-colors line-clamp-2">{{ $project->name }}</h1>
        <p class="text-xs sm:text-sm text-slate-600 mb-3 sm:mb-4">{{ __($project->category) }}</p>
        <div class="mt-auto">
            <div class="flex items-center justify-between mb-1 sm:mb-2">
                <span class="text-xs text-slate-500">{{ __('Progress') }}</span>
                <span class="text-xs font-semibold text-slate-700">{{ $project->progress ?? 0 }}%</span>
            </div>
            <div class="w-full bg-slate-200 rounded-full h-1.5 sm:h-2 overflow-hidden">
                <div class="bg-gradient-to-r from-violet-600 to-sky-500 h-1.5 sm:h-2 rounded-full transition-all duration-700" style="width: {{ $project->progress ?? 0 }}%"></div>
            </div>
        </div>
    </div>
</div>
</a>
