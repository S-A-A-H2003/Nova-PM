@props([
    "education",
    "id" => "",
    "isViewTo" => false
])

@if($isViewTo == false)
    <div @if($errors->education->hasAny(['education_value_update' , 'education_education_update' , 'education_adress_update' , 'education_start_date_update' , 'education_end_date_update' , 'education_gpa_update' , 'education_file_update'])) class="w-full mt-6 p-6 border-2 border-violet-300 rounded-xl bg-violet-50" @else class="hidden w-full mt-6 p-6 border-2 border-violet-300 rounded-xl bg-violet-50" @endif id="{{$id}}">
        <x-form-structure action="{{route('profile.cv.education.update' , $education->id)}}" method="PUT" buttonClass="w-full mt-4 bg-violet-600 hover:bg-violet-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors" button="svg-send" formClass="w-full space-y-4">
            <h1 class="w-full text-center font-bold text-2xl text-gray-800 mb-2">{{ __('Edit Education') }}</h1>
            <x-form-fieldset name="education_value_update" value="{{$education->value}}" lableName="{{ __('Degree Name') }}" placeholder="{{ __('Enter degree name') }}" fieldsetClass="w-full" errorBag="education"/>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-form-fieldset name="education_education_update" value="{{json_decode($education->extensions)->education_education}}" lableName="{{ __('Field of Study') }}" placeholder="{{ __('Enter field of study') }}" fieldsetClass="w-full" errorBag="education"/>
                <x-form-fieldset name="education_adress_update" value="{{json_decode($education->extensions)->education_adress}}" lableName="{{ __('Institution') }}" placeholder="{{ __('Enter institution name') }}" fieldsetClass="w-full" errorBag="education"/>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-form-fieldset name="education_start_date_update" type="month" value="{{json_decode($education->extensions)->education_start_date}}" lableName="{{ __('Start Date') }}" fieldsetClass="w-full" errorBag="education"/>
                <x-form-fieldset name="education_end_date_update" type="month" value="{{json_decode($education->extensions)->education_end_date}}" lableName="{{ __('End Date') }}" fieldsetClass="w-full" errorBag="education"/>
            </div>
            <x-form-fieldset name="education_gpa_update" value="{{json_decode($education->extensions)->education_gpa}}" lableName="{{ __('GPA') }}" placeholder="{{ __('Enter GPA') }}" fieldsetClass="w-full" errorBag="education"/>
            <x-form-fieldset-file name="education_file_update" lableName="{{ __('Certificate (Optional)') }}" fieldsetClass="w-full" errorBag="education">
                <a href="{{route('utilities.viewFile' , ['App\Models\CvContent' , $education->id , 'extensions' , true ,'education_file'])}}" target="_blank" class="text-violet-600 hover:text-violet-700 hover:underline text-sm">
                    {{ __('View Previous File') }}
                </a>
            </x-form-fieldset-file>
        </x-form-structure>
    </div>
@endif
