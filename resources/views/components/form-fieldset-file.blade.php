@props([
    'name' => 'name',
    'fieldsetClass' => '',
    'isUpdate' => false
])

<fieldset class="{{$fieldsetClass}}">
    <label for="{{str_replace('[]' , '' , $name)}}" @class(["w-full h-[25vh] flex flex-col justify-center items-center rounded-md border-[1.5px] border-violet-600 p-3 mt-1 mb-3" ,  "w-full h-[25vh] flex flex-col justify-center items-center rounded-md border-[1.5px] border-red-600 placeholder-red-600 p-3 mt-1 mb-3" => $errors->has($name)])>
        @if($isUpdate)
            {{$slot}}
        @else
            <x-svg-create/>
        @endif
    </label>
    <input type="file" name="{{$name}}" id="{{str_replace('[]' , '' , $name)}}" class="hidden">
    <x-general-one-error name="{{$name}}"/>
</fieldset>

