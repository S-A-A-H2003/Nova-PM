@props([
    'name',
    'bag' => null,
])

@php
    $renderMessage = null;
    if ($bag) {
        $renderMessage = $errors->getBag($bag)->first(str_ends_with($name, '[]') ? str_replace('[]', '.0', $name) : $name);
    }
@endphp

@if($bag)
    @if($renderMessage)
        <p class="text-red-600 bg-red-50 border border-red-100 rounded-lg px-3 py-2 text-sm flex items-start gap-2 mt-2 animate-soft-scale">
            <svg class="w-4 h-4 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            {{ __($renderMessage) }}
        </p>
    @endif
@else
    @if(str_ends_with($name , '[]'))
        @error(str_replace('[]' , '.0' , $name))
            <p class="text-red-600 bg-red-50 border border-red-100 rounded-lg px-3 py-2 text-sm flex items-start gap-2 mt-2 animate-soft-scale">
                <svg class="w-4 h-4 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                {{__($message)}}
            </p>
        @enderror
    @else
        @error($name)
            <p class="text-red-600 bg-red-50 border border-red-100 rounded-lg px-3 py-2 text-sm flex items-start gap-2 mt-2 animate-soft-scale">
                <svg class="w-4 h-4 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                {{__($message)}}
            </p>
        @enderror
    @endif
@endif
