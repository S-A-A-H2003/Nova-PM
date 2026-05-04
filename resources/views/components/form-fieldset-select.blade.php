@props([
    'id' => '',
    'fieldsetClass' => '',
    'options',
    'name' => 'name',
    'lableClass' => 'text-gray-700 font-medium text-sm mb-2 block',
    'lableName' => 'Name',
    'value' => '',
    'selectClass' => 'rounded-lg border-[1.5px] border-gray-300 bg-white w-full p-3 mt-1 text-gray-700 focus:border-violet-500 focus:ring-2 focus:ring-violet-200 transition-all',
    'selectClassWitherror' => 'rounded-lg border-[1.5px] border-red-500 bg-red-50 text-red-700 focus:border-red-500 focus:ring-2 focus:ring-red-200',
])

<fieldset class="{{$fieldsetClass}}">
    <label for="{{$name}}" class="{{$lableClass}}">{{$lableName}}</label>
    <select
        id="{{$id}}"
        name="{{$name}}"
        value="{{$value}}"
        @class([$selectClass ,  $selectClassWitherror => $errors->has($name)])
    >
        @foreach($options as $key => $val)
            <option value="{{$val}}" @selected($val == $value)>{{$key}}</option>
        @endforeach
    </select>
    <x-general-one-error name="{{$name}}"/>
</fieldset>


