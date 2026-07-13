@props([
    'id' => '',
    'fieldsetClass' => '',
    'name' => 'name',
    'lableClass' => 'text-slate-700 font-semibold text-sm mb-2 block',
    'lableName' => '',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'inputClass' => 'rounded-lg border border-slate-200 bg-white/90 w-full p-3 mt-1 text-slate-700 placeholder-slate-400 shadow-sm focus:border-violet-500 focus:ring-4 focus:ring-violet-100 transition-all',
    'inputClassWitherror' => 'rounded-lg border border-red-400 bg-red-50 placeholder-red-400 w-full p-3 mt-1 text-red-700 shadow-sm focus:border-red-500 focus:ring-4 focus:ring-red-100',
    'checked' => false,
])

<fieldset class="{{$fieldsetClass}}" id="{{$id}}">
    @if($type == 'checkbox')
        <label for="{{str_replace('[]' , '' , $name)}}" class="{{$lableClass}} inline-flex items-center gap-2">
            <input
                id="{{$id}}"
                type="{{$type}}"
                name="{{$name}}"
                placeholder="{{$placeholder}}"
                @class(["w-4 h-4 rounded border-gray-300 text-violet-600 focus:ring-violet-500",  "ring-2 ring-red-200 border-red-500 bg-red-50" => $errors->has($name)])
                @checked($checked)
                >
            {{$lableName}}
        </label>
    @else
        <label for="{{str_replace('[]' , '' , $name)}}" class="{{$lableClass}}">{{$lableName}}</label>
        <input
            id="{{$id}}"
            type="{{$type}}"
            name="{{$name}}"
            value="{{$value}}"
            placeholder="{{$placeholder}}"
            @class([$inputClass ,  $inputClassWitherror => $errors->has($name)])
            @checked($checked)
            @required($attributes->has('required'))
            {{$attributes}}
        >
    @endif
    <x-general-one-error name="{{$name}}"/>
</fieldset>
