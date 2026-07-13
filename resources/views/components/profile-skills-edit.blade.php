@props([
    "skill",
    "id" => "",
    "isViewTo" => false
])

@if($isViewTo == false)
    <div @if($errors->skills->hasAny(['skills_value_update'])) class="w-full mt-6 p-6 border-2 border-violet-300 rounded-xl bg-violet-50" @else class="hidden w-full mt-6 p-6 border-2 border-violet-300 rounded-xl bg-violet-50" @endif id="{{$id}}">
        <x-form-structure action="{{route('profile.cv.skills.update' , $skill->id)}}" method="PUT" buttonClass="w-full mt-4 bg-violet-600 hover:bg-violet-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors" button="svg-send" formClass="w-full space-y-4">
            <h1 class="w-full text-center font-bold text-2xl text-gray-800 mb-2">{{ __('Edit Skill') }}</h1>
            <x-form-fieldset name="skills_value_update" value="{{$skill->value}}" lableName="{{ __('Skill Name') }}" placeholder="{{ __('Enter skill name') }}" fieldsetClass="w-full" errorBag="skills"/>
        </x-form-structure>
    </div>
@endif
