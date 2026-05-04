@props([
    'errors' ,
    'id' => ''
])
@php
    $options = [
        "Select Category" => "",
        "Programming" => "programming",
        "Designing" => "designing",
        "Other" => "other",
    ]
@endphp
<div
    @if($errors->hasAny(['name' , 'Category' , 'budget' , 'description']))
        class ="absolute w-[960px] h-fit bg-white shadow-2xl top-16 rounded-md p-5 z-10"
    @else
        class ="absolute w-[960px] h-fit bg-white shadow-inner top-16 rounded-md p-5 z-10 hidden"
    @endif
    id="{{$id}}">

    <div id="close_form_new_project" class=" absolute right-5 py-2">
        <x-svg-cross/>
    </div>

    <x-form-structure action="{{route('project.store')}}"  button-class="mt-3" form-class="p-5 mt-10">
        <input type="hidden" name="status" value="active">
        <div class="grid grid-cols-2 gap-2">
            <x-form-fieldset
                name="name"
                value="{{old('name')}}"
                placeholder="Project Name"
                lable-name="Project Name"
            />

            <x-form-fieldset-select
                name="category"
                lable-name="Category"
                value="{{old('category')}}"
                :options="$options"
            />

            <x-form-fieldset
                type="number"
                name="budget"
                value="{{old('budget' , 0)}}"
                placeholder="Budget"
                lable-name="Budget"
                fieldset-class="col-start-1 col-end-3 w-full"
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
            name="description"
            value="{{old('description')}}"
            placeholder="Description"
            lable-name="Description"
        />
    </x-form-structure>
</div>
