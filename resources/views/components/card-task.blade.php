@props([
    'project',
    'task',
    'is_second_style' => false,
])
<a href="{{route('task.show' , [$project->id , $task->id])}}">
<div class="w-full min-h-[100px] sm:min-h-[110px] modern-card hover:border-violet-200 p-4 sm:p-5 flex flex-col justify-between group">
    <div class="flex-1">
        <h3 class="font-bold text-base sm:text-lg text-slate-900 group-hover:text-violet-600 transition-colors line-clamp-2">{{$task->title}}</h3>
        <div class="flex items-center gap-2 sm:gap-4 mt-1 sm:mt-2 flex-wrap">
            <span class="status-pill bg-violet-100 text-violet-700">
                {{ __($project->category) }}
            </span>
            <span class="text-xs sm:text-sm text-slate-600">{{ __('Budget') }}: ${{ number_format($task->budget, 0) }}</span>
        </div>
    </div>
    <div class="mt-3 sm:mt-4 pt-2 sm:pt-3 border-t border-slate-100 flex justify-between items-center">
        <span class="text-xs text-slate-500 truncate max-w-[60%] sm:max-w-none">{{ $project->name }}</span>
        @if(!(\App\Models\UserTask::check($task->id)))
            <form action="{{route('user.task.add' ,[$project->id , $task->id])}}" method="POST" class="flex items-center">
                @csrf
                <button type="submit" class="p-1.5 sm:p-2 hover:bg-violet-50 rounded-lg transition-colors" title="{{ __('Save task') }}">
                    <x-svg-bookmark isFull="false" class="w-4 h-4 sm:w-5 sm:h-5 text-gray-400 hover:text-violet-600"/>
                </button>
            </form>
        @else
            <form action="{{route('user.task.add' ,[$project->id , $task->id])}}" method="POST" class="flex items-center">
                @csrf
                <button type="submit" class="p-1.5 sm:p-2 hover:bg-violet-50 rounded-lg transition-colors" title="{{ __('Task saved') }}">
                    <x-svg-bookmark isFull="true" class="w-4 h-4 sm:w-5 sm:h-5 text-violet-600"/>
                </button>
            </form>
        @endif
    </div>
</div>
</a>
