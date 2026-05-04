@props([
    "userCvContent",
    "id" => "",
    "isViewTo" => false
])
@php
    $routeId = $userCvContent->where('type' , 'summary')->value('id') ?? null;
    $value = $userCvContent->where('type' , 'summary')->value('value') ?? "";
@endphp

@if($isViewTo == false)
    @if($routeId)
        <div @if($errors->hasAny(['summary_value'])) class="w-full h-fit mt-6 p-5 border border-violet-500 rounded-md" @else class="hidden w-full h-fit mt-6 p-5 border border-violet-500 rounded-md" @endif id="{{$id}}">
            <x-form-structure action="{{route('profile.cv.summary.update' , $routeId)}}" method="PUT" buttonClass="w-full h-fit rounded-xl bg-violet-300 flex justify-center items-center p-3" buttonClassChiled="fill-white" formClass="w-full h-fit flex flex-col justify-center items-center">
                <h1 class="w-full h-fit font-bold text-3xl p-5 text-center">{{ __('Summary') }}</h1>
                <x-form-fieldset-textarea name="summary_value" value="{{$value}}" lableName="{{ __('Description') }}" placeholder="{{ __('Description') }}" inputClass="w-full h-fit" inputClassWitherror="w-full h-fit" fieldsetClass="w-full h-fit"/>
            </x-form-structure>
        </div>
    @endif
@endif
