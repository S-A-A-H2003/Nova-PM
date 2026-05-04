@props([
    'errors' ,
    'project' ,
    'id' => ''
])
<div
    @if($errors->hasAny(['title' , 'task_budget' , 'task_description']))
        class ="absolute w-[960px] h-fit bg-white shadow-2xl top-16 rounded-xl p-6 z-10 ring-1 ring-red-200"
    @else
        class ="absolute w-[960px] h-fit bg-white shadow-inner top-16 rounded-xl p-6 z-10 hidden"
    @endif
    id="{{$id}}">

    <div id="close_form_new_task" class=" absolute right-5 py-2">
        <x-svg-cross/>
</div>

    <x-form-structure action="{{route('task.store' , $project->id)}}"  button-class="mt-3" form-class="p-5 mt-10">
        <input type="hidden" name="status" value="active">
        <div class="grid grid-cols-2 gap-2">
            <x-form-fieldset
                name="title"
                value="{{old('title')}}"
                placeholder="Task Title"
                lable-name="Task Title"
            />

            <x-form-fieldset
                type="number"
                name="task_budget"
                value="{{old('budget' , 0)}}"
                placeholder="Budget"
                lable-name="Budget"
            />
            <x-form-fieldset
                type="file"
                name="files[]"
                placeholder="Add new atachments"
                lable-name="Atachments"
                fieldset-class="col-start-1 col-end-3 w-full"
                multiple
            />
        </div>

        <x-form-fieldset-textarea
            type="text"
            name="task_description"
            value="{{old('description')}}"
            placeholder="Description"
            lable-name="Description"
        />
    </x-form-structure>
</div>
