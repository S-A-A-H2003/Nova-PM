@props([
    'errors' ,
    'project' ,
    'id' => ''
])
@php
    $options = [
        "Programming" => "programming",
        "Designing" => "designing",
        "Other" => "other",
    ]
@endphp
<div
    @if($errors->hasAny(['name' , 'Category' , 'budget' , 'description']))
        class ="absolute top-16 right-0 w-[960px] h-fit bg-white shadow-inner rounded-md p-5 z-10"
    @else
        class ="absolute top-16 right-0 w-[960px] h-fit bg-white shadow-inner rounded-md p-5 z-10 hidden"
    @endif  id="{{$id}}">

    <div id="close_form_edit_project" class=" absolute right-5 py-2">
        <x-svg-cross/>
    </div>

    <x-form-structure action="{{route('project.update' , $project->id)}}" method="PUT"  button-class="mt-3" form-class="p-5 mt-10">
        <x-form-fieldset
            type="checkbox"
            name="status"
            lable-name="Status"
            fieldset-class="mb-2"
            checked="{{$project->status == 'active'}}"
        />

        <div class="grid grid-cols-2 gap-2">
            <x-form-fieldset
                name="name"
                value="{{$project->name}}"
                placeholder="Project Name"
                lable-name="Project Name"
            />

            <x-form-fieldset-select
                name="category"
                lable-name="Category"
                value="{{$project->category}}"
                :options="$options"
            />

            <x-form-fieldset
                type="number"
                name="budget"
                value="{{$project->budget}}"
                placeholder="Budget"
                lable-name="Budget"
                fieldset-class="col-start-1 col-end-3 w-full"
            />
        </div>

        <x-form-fieldset-textarea
            type="text"
            name="description"
            value="{{$project->description}}"
            placeholder="Description"
            lable-name="Description"
        />
    </x-form-structure>
</div>
