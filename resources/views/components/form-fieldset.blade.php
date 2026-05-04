@props([
    'id' => '',
    'fieldsetClass' => '',
    'name' => 'name',
    'lableClass' => 'text-gray-700 font-medium text-sm mb-2 block',
    'lableName' => '',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'inputClass' => 'rounded-lg border-[1.5px] border-gray-300 bg-white w-full p-3 mt-1 text-gray-700 focus:border-violet-500 focus:ring-2 focus:ring-violet-200 transition-all',
    'inputClassWitherror' => 'rounded-lg border-[1.5px] border-red-500 bg-red-50 placeholder-red-500 w-full p-3 mt-1 text-red-700 focus:border-red-500 focus:ring-2 focus:ring-red-200',
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

