@extends('layouts.app')
@section('title', __('Tasks'))
@section('content')
<section class="w-full">
    {{-- Browse Tasks --}}
    <section class="w-full h-fit">
        <div class="mb-3 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="page-title">{{ __('Browse Tasks') }}</h2>
            <div class="w-full sm:w-auto">
                <x-search result_search="{{$result_search}}"/>
            </div>
        </div>
        <div class="w-full mt-8 mb-5">
            @forelse($tasks_in_progress as $key => $project)
                @php $projectModel = \App\Models\Project::find($key) @endphp
                @if($projectModel)
                    <div class="mb-6">
                        <h3 class="font-bold text-xl text-slate-800 my-6 mx-2 border-l-4 border-violet-500 pl-4">
                            {{ $projectModel->name }}
                        </h3>
                        <div class="grid gap-4">
                            @foreach($project as $task)
                                <x-card-task :project="$task->project" :task="$task" is_second_style="true"/>
                            @endforeach
                        </div>
                    </div>
                @endif
            @empty
                <div class="modern-card p-12 text-center">
                    <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <p class="text-slate-500 text-lg">{{ __("No tasks in progress yet.") }}</p>
                </div>
            @endforelse
        </div>
    </section>
</section>
@endsection
