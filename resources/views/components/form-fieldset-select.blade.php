@props([
    'id' => '',
    'fieldsetClass' => '',
    'options',
    'name' => 'name',
    'lableClass' => 'text-slate-700 font-semibold text-sm mb-2 block',
    'lableName' => 'Name',
    'value' => '',
    'selectClass' => 'rounded-lg border border-slate-200 bg-white/90 w-full p-3 mt-1 text-slate-700 shadow-sm focus:border-violet-500 focus:ring-4 focus:ring-violet-100 transition-all',
    'selectClassWitherror' => 'rounded-lg border border-red-400 bg-red-50 text-red-700 shadow-sm focus:border-red-500 focus:ring-4 focus:ring-red-100',
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

