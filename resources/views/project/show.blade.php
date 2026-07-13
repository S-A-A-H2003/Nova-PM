@extends('layouts.app')
@section('title', __('Project'))
@section('content')
<section>
    <section class="p-2 w-full h-fit">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h1 class="font-bold text-3xl text-gray-800">{{$project->name}}</h1>
            <div class="flex flex-wrap justify-center items-center gap-2 w-full sm:w-auto">
                <span class="bg-violet-100 text-violet-700 px-4 py-2 rounded-full text-sm font-medium">
                    {{ __($project->category) }}
                </span>
                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-medium">
                    {{ __($project->type) }}
                </span>
                <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm font-medium">
                    {{ $project->created_at->format('M d, Y') }}
                </span>
                @if($project->status == 'active')
                    <span class="bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-sm font-medium">
                        {{ __('Active') }}
                    </span>
                @else
                    <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm font-medium">
                        {{ __('Stopped') }}
                    </span>
                @endif
                @if(Illuminate\Support\Facades\Gate::allows('create' , [App\Models\Task::class , $project]))
                    <span class="bg-violet-100 text-violet-700 px-4 py-2 rounded-full text-sm font-medium" id="button_edit_project">
                        <x-svg-edit width="25" height="25" />
                    </span>
                    <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-medium">
                        <form action="{{route('project.destroy' , $project->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button>
                                <x-svg-trash width="20" height="20" />
                            </button>
                        </form>
                    </span>
                @endif
            </div>
        </div>
        <div class="p-6 w-full bg-white rounded-xl shadow-sm mt-4 border border-gray-100">
            <div class="prose max-w-none" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                {!!$project->description!!}
            </div>
        </div>
            <div class="mt-6">
                <h2 class="pb-4 px-2 text-2xl font-bold text-gray-800">{{ __('Attachment') }}</h2>
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[300px]">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-semibold text-gray-600">#</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-semibold text-gray-600">{{ __('File') }}</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-semibold text-gray-600">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($project->attachments as $key => $attachment )
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-4 sm:px-6 py-4 text-xs sm:text-sm text-gray-500">{{$key+1}}</td>
                                        <td class="px-4 sm:px-6 py-4">
                                            <a class="text-violet-600 hover:text-violet-700 hover:underline font-medium text-xs sm:text-sm break-all" href="{{route('utilities.viewFile' , ['App\Models\Attachment' , $attachment->id , 'attachment'])}}" target="_blank">
                                                {{$attachment->attachment}}
                                            </a>
                                        </td>
                                        <td class="px-4 sm:px-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <button onclick="document.getElementById('attachment_update_{{$attachment->id}}').classList.remove('hidden')" class="p-1 text-gray-400 hover:text-violet-600 cursor-pointer transition-colors">
                                                    <x-svg-edit width="20" height="20"/>
                                                </button>
                                                <x-form-structure action="{{route('attachment.destroy' , [$attachment->id])}}" method="DELETE" button="svg-cross" buttonClass="p-1"></x-form-structure>
                                                <x-attachment-update :attachment="$attachment" :id="'attachment_update_' . $attachment->id" />
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-4 sm:px-6 py-8 sm:py-12 text-center">
                                            <div class="flex flex-col items-center gap-3">
                                                <svg class="w-12 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                                                </svg>
                                                <p class="text-gray-500 text-sm">{{ __("not have any attachments") }}</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>

    <section class="p-2 w-full h-fit mt-6">
        <div class="mb-5 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="font-bold text-2xl text-gray-800">{{ __('Tasks') }}</h2>
            @if(Illuminate\Support\Facades\Gate::allows('create' , [App\Models\Task::class , $project]))
                <button class="btn-primary flex items-center gap-2" id="button_new_task">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    {{ __('New Task') }}
                </button>
                <x-task-create :project="$project" id="new_task"/>
            @endif
        </div>

        @if(Illuminate\Support\Facades\Gate::allows('checkView' , [App\Models\Project::class , $project]))
            <div class="grid gap-4">
                @forelse ($project->tasks as $task)
                    <x-card-task :task="$task" :project="$project"/>
                @empty
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <p class="text-gray-500 mb-3">{{ __('You do not have any tasks') }}</p>
                        <button class="btn-secondary" id="button_new_task_other">
                            {{ __('click here to create a new task.') }}
                        </button>
                    </div>
                @endforelse
            </div>
        @else
            <div class="grid gap-4">
                @forelse ($project->tasks as $task)
                    <x-card-task :task="$task" :project="$project"/>
                @empty
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        </svg>
                        <p class="text-gray-500">{{ __("not any tasks yet!") }}</p>
                    </div>
                @endforelse
            </div>
        @endif
    </section>

    <section class="p-2 w-full h-fit mt-6">
        <div class="mb-5 flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800">{{ __('Comments') }}</h2>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            @forelse($comments as $comment)
                <div class="flex gap-4 pb-4 mb-4 border-b border-gray-100 last:border-0 last:mb-0 last:pb-0">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-full bg-violet-100 flex items-center justify-center">
                            <span class="text-violet-600 font-bold">{{ substr($comment->user->name, 0, 2) }}</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-semibold text-gray-800 text-sm">{{ $comment->user->name }}</span>
                            <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-700 text-sm whitespace-pre-wrap">{{ $comment->content }}</p>
                        @if(Auth::id() === $comment->user_id)
                            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs text-gray-400 hover:text-red-500 transition-colors">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center py-8">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 12h4m-4 4h8M3 20h18a2 2 0 002-2V6a2 2 0 00-2-2H3a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-gray-500 text-lg">{{ __('No comments yet!') }}</p>
                </div>
            @endforelse

            <form action="{{ route('comment.project.store', $project->id) }}" method="POST" class="mt-6 pt-6 border-t border-gray-100">
                @csrf
                <div class="flex gap-3">
                    <div class="flex-1">
                        <textarea
                            name="content"
                            rows="3"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-violet-400 focus:ring-2 focus:ring-violet-100 transition-all resize-none text-sm"
                            placeholder="{{ __('Write your comment here...') }}"
                        ></textarea>
                        @error('content')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="btn-primary px-6 py-3">
                            {{ __('Send') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <x-project-edit :errors="$errors" :project="$project" id="edit_project" />
</section>
@endsection
