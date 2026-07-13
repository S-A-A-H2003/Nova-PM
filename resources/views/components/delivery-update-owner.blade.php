@props([
    "delivery" ,
    "project" ,
])
@php
    $options = ["Select Evaluation " => "" , "Pad" => "pad" , "Good" => "good" , "Very Good" => "very good" , "Excellent" => "excellent"];
@endphp
<div class="border mt-4 rounded-lg p-4 w-full bg-gray-50">
    <h4 class="text-sm font-semibold text-gray-700 mb-3">{{ __('Evaluate Delivery') }}</h4>
    <x-form-structure action="{{route('delivery.update' , [$project->id , $delivery->id])}}" method="PUT"  button-class="mt-3">
        <x-form-fieldset-select name="evaluation" lable-name="{{ __('Evaluation') }}" :options="$options" value="{{$delivery->evaluation}}"/>
        <x-form-fieldset-textarea name="feedback" lable-name="{{ __('Feedback') }}"  value="{{$delivery->feedback}}"/>
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mt-6 mb-3 rounded-md">
            <div class="flex items-start gap-2">
                <svg class="w-5 h-5 text-yellow-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM11 14a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 102 0V7a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                <p class="text-yellow-800 text-sm">
                    {{ __('Note: If the delivery is selected as the best, any financial bonus will go to this person and you will not be able to undo this action.') }}
                </p>
            </div>
        </div>
        <x-form-fieldset name="isbest" type="checkbox" checked="{{$delivery->isbest}}" lable-name="{{ __('Mark as best delivery') }}"/>
    </x-form-structure>
</div>
