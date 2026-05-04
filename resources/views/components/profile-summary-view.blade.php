@props([
    "id",
    "userCvContent",
])
@php
    $value = $userCvContent->where('type' , 'summary')->value('value') ?? "";
@endphp

@if($value)
<div class="w-full mt-6 p-5 bg-gray-50 rounded-xl border border-gray-100" id="{{$id}}">
    <div class="prose max-w-none" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        {!!$value!!}
    </div>
</div>
@endif
