<a href="{{route('project.show' , $project->id)}}">
<div class="w-full min-h-[200px] sm:min-h-[220px] bg-[#FCFBFF] rounded-2xl transition-all hover:shadow-lg border border-gray-100 hover:border-violet-200 overflow-hidden group">
    <div class="p-4 sm:p-5 h-full flex flex-col">
        <div class="flex items-start justify-between mb-2 sm:mb-3">
            <p class="text-xs sm:text-sm text-gray-500">{{ $project->created_at->format('M d, Y') }}</p>
            @if($project->status == 'active')
                <span class="inline-flex items-center px-2 py-0.5 sm:px-2.5 sm:py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                    {{ __('Active') }}
                </span>
            @else
                <span class="inline-flex items-center px-2 py-0.5 sm:px-2.5 sm:py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                    {{ __('Stopped') }}
                </span>
            @endif
        </div>
        <h1 class="font-bold text-base sm:text-lg text-gray-800 mb-1 sm:mb-2 group-hover:text-violet-600 transition-colors line-clamp-2">{{ $project->name }}</h1>
        <p class="text-xs sm:text-sm text-gray-600 mb-3 sm:mb-4">{{ __($project->category) }}</p>
        <div class="mt-auto">
            <div class="flex items-center justify-between mb-1 sm:mb-2">
                <span class="text-xs text-gray-500">{{ __('Progress') }}</span>
                <span class="text-xs font-medium text-gray-700">{{ $project->progress ?? 0 }}%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-1.5 sm:h-2">
                <div class="bg-violet-600 h-1.5 sm:h-2 rounded-full transition-all duration-500" style="width: {{ $project->progress ?? 0 }}%"></div>
            </div>
        </div>
    </div>
</div>
</a>
