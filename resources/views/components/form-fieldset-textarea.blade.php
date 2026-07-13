@props([
    'id' => '',
    'fieldsetClass' => '',
    'name' => 'name',
    'lableClass' => 'text-slate-700 font-semibold text-sm mb-2 block',
    'lableName' => '',
    'value' => '',
    'placeholder' => '',
    'inputClass' => 'rounded-lg border border-slate-200 bg-white/90 w-full p-3 mt-1 text-slate-700 placeholder-slate-400 shadow-sm focus:border-violet-500 focus:ring-4 focus:ring-violet-100 transition-all resize-y min-h-[110px]',
    'inputClassWitherror' => 'rounded-lg border border-red-400 bg-red-50 placeholder-red-400 w-full p-3 mt-1 text-red-700 shadow-sm focus:border-red-500 focus:ring-4 focus:ring-red-100 resize-y min-h-[110px]',
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
