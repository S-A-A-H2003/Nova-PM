@props([
    "id" => "",
    "isViewTo" => false
])
@php
     $languages = [
        __('English')     => "english",
        __('Spanish')     => "spanish",
        __('French')      => "french",
        __('German')      => "german",
        __('Chinese')     => "chinese",
        __('Japanese')    => "japanese",
        __('Arabic')      => "arabic",
        __('Russian')     => "russian",
        __('Portuguese')  => "portuguese",
        __('Italian')     => "italian",
        __('Korean')      => "korean",
        __('Hindi')       => "hindi",
        __('Turkish')     => "turkish",
        __('Dutch')       => "dutch",
        __('Swedish')     => "swedish",
        __('Norwegian')   => "norwegian",
        __('Greek')       => "greek",
        __('Polish')      => "polish",
        __('Hebrew')      => "hebrew",
        __('Thai')        => "thai",
        __('Vietnamese')  => "vietnamese",
        __('Persian')     => "persian",
        __('Indonesian')  => "indonesian",
        __('Malay')       => "malay",
    ];

    $englishLevels = [
        __('Beginner')     => "beginner",
        __('Elementary')   => "elementary",
        __('Pre-Intermediate') => "preIntermediate",
        __('Intermediate') => "intermediate",
        __('Upper-Intermediate') => "upperIntermediate",
        __('Advanced')     => "advanced",
        __('Fluent')       => "fluent",
        __('Native')       => "native",
    ];
@endphp

@if($isViewTo == false)
    <div @if($errors->hasAny(['languages_value' , 'languages_level' , 'languages_file'])) class="w-full mt-6 p-6 border-2 border-violet-300 rounded-xl bg-violet-50" @else class="hidden w-full mt-6 p-6 border-2 border-violet-300 rounded-xl bg-violet-50" @endif id="{{$id}}">
        <x-form-structure action="{{route('profile.cv.languages')}}" buttonClass="w-full mt-4 bg-violet-600 hover:bg-violet-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors" button="svg-send" formClass="w-full space-y-4">
            <h1 class="w-full text-center font-bold text-2xl text-gray-800 mb-2">{{ __('Add Language') }}</h1>
            <x-form-fieldset-select name="languages_value" value="{{old('languages_value')}}" :options="$languages" lableName="{{ __('Language') }}" fieldsetClass="w-full"/>
            <x-form-fieldset-select name="languages_level" value="{{old('languages_level')}}" :options="$englishLevels" lableName="{{ __('Proficiency Level') }}" fieldsetClass="w-full"/>
            <x-form-fieldset-file name="languages_file" lableName="{{ __('Certificate (Optional)') }}" fieldsetClass="w-full"/>
        </x-form-structure>
    </div>
@endif
