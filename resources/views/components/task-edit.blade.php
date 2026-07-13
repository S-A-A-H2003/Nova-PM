@props([
    'errors' ,
    'project' ,
    'task' ,
    'id' => ''
])
<div
    @if($errors->hasAny(['title' , 'task_budget' , 'task_description']))
        class ="absolute top-16 right-8 w-[960px] h-fit bg-white shadow-2xl rounded-xl p-6 z-10 ring-1 ring-red-200"
    @else
        class ="absolute top-16 right-8 w-[960px] h-fit bg-white shadow-inner rounded-xl p-6 z-10 hidden"
    @endif
    id="{{$id}}">

    <div id="close_form_edit_task" class=" absolute right-4 top-4 py-2">
        <x-svg-cross class="w-5 h-5 text-gray-400 hover:text-gray-600 cursor-pointer"/>
    </div>

    <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('Edit Task') }}</h3>
    <x-form-structure action="{{route('task.update' , [$project->id , $task->id])}}" method="PUT"  button-class="mt-4 bg-violet-600 hover:bg-violet-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors" form-class="space-y-4" button="svg-send">
        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
            <x-form-fieldset
                type="checkbox"
                name="status"
                lable-name="{{ __('Mark as Active') }}"
                checked="{{$task->status == 'active'}}"
            />
        </div>
        <div class="grid grid-cols-2 gap-4">
            <x-form-fieldset
                name="title"
                value="{{$task->title}}"
                placeholder="{{ __('Task Title') }}"
                lable-name="{{ __('Task Title') }}"
            />
            <x-form-fieldset
                type="number"
                name="task_budget"
                value="{{$task->budget}}"
                placeholder="{{ __('Budget') }}"
                lable-name="{{ __('Budget') }}"
            />
        </div>
        <x-form-fieldset-textarea
            type="text"
            name="task_description"
            value="{{$task->description}}"
            placeholder="{{ __('Write task description...') }}"
            lable-name="{{ __('Description') }}"
        />
    </x-form-structure>
</div>

    <x-form-structure action="{{route('task.update' , [$project->id , $task->id])}}" method="PUT"  button-class="mt-3" form-class="p-5 mt-10">
        <x-form-fieldset
            type="checkbox"
            name="status"
            lable-name="Status"
            fieldset-class="mb-2"
            checked="{{$task->status == 'active'}}"
        />
        <div class="grid grid-cols-2 gap-2">
            <x-form-fieldset
                name="title"
                value="{{$task->title}}"
                placeholder="Task Title"
                lable-name="Task Title"
            />

            <x-form-fieldset
                type="number"
                name="task_budget"
                value="{{$task->budget}}"
                placeholder="Budget"
                lable-name="Budget"
            />
        </div>

        <x-form-fieldset-textarea
            type="text"
            name="task_description"
            value="{{$task->description}}"
            placeholder="Description"
            lable-name="Description"
        />
    </x-form-structure>
</div>
