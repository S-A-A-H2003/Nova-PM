@props([
    "id" => "",
    "isViewTo" => false
])

@if($isViewTo == false)
    <div @if($errors->summary->hasAny(['summary_value_create'])) class="w-full h-fit mt-6 p-5 border border-violet-500 rounded-md" @else class="hidden w-full h-fit mt-6 p-5 border border-violet-500 rounded-md" @endif id="{{$id}}">
        <x-form-structure action="{{route('profile.cv.summary')}}" buttonClass="w-full h-fit rounded-xl bg-violet-300 flex justify-center items-center p-3" buttonClassChiled="fill-white" formClass="w-full h-fit flex flex-col justify-center items-center">
            <h1 class="w-full h-fit font-bold text-3xl p-5 text-center">{{ __('Summary') }}</h1>
            <x-form-fieldset-textarea name="summary_value_create" value="{{old('summary_value_create')}}" lableName="{{ __('Description') }}" placeholder="{{ __('Description') }}" inputClass="w-full h-fit" inputClassWitherror="w-full h-fit" fieldsetClass="w-full h-fit" errorBag="summary"/>
        </x-form-structure>
    </div>
@endif
