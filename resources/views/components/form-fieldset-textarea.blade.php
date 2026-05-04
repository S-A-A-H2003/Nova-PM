@props([
    'id' => '',
    'fieldsetClass' => '',
    'name' => 'name',
    'lableClass' => 'text-gray-700 font-medium text-sm mb-2 block',
    'lableName' => '',
    'value' => '',
    'placeholder' => '',
    'inputClass' => 'rounded-lg border-[1.5px] border-gray-300 bg-white w-full p-3 mt-1 text-gray-700 placeholder-gray-400 focus:border-violet-500 focus:ring-2 focus:ring-violet-200 transition-all resize-y min-h-[100px]',
    'inputClassWitherror' => 'rounded-lg border-[1.5px] border-red-500 bg-red-50 placeholder-red-500 w-full p-3 mt-1 text-red-700 focus:border-red-500 focus:ring-2 focus:ring-red-200 resize-y min-h-[100px]',
])

<fieldset class="{{$fieldsetClass}}">
    <label for="{{$name}}" class="{{$lableClass}}">{{$lableName}}</label>
    <textarea
        id="{{$id}}"
        name="{{$name}}"
        placeholder="{{$placeholder}}"
        @class([$inputClass ,  $inputClassWitherror => $errors->has($name)])
    >{!!$value!!}</textarea>
    <x-general-one-error name="{{$name}}"/>
</fieldset>

