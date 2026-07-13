@props([
    "id" => "",
    "isViewTo" => false
])

@if($isViewTo == false)
    <div @if($errors->education->hasAny(['education_value_create' , 'education_education_create' , 'education_adress_create' , 'education_start_date_create' , 'education_end_date_create' , 'education_gpa_create' , 'education_file_create'])) class="w-full mt-6 p-6 border-2 border-violet-300 rounded-xl bg-violet-50" @else class="hidden w-full mt-6 p-6 border-2 border-violet-300 rounded-xl bg-violet-50" @endif id="{{$id}}">
        <x-form-structure action="{{route('profile.cv.education')}}" buttonClass="w-full mt-4 bg-violet-600 hover:bg-violet-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors" button="svg-send" formClass="w-full space-y-4">
            <h1 class="w-full text-center font-bold text-2xl text-gray-800 mb-2">{{ __('Add Education') }}</h1>
            <x-form-fieldset name="education_value_create" value="{{old('education_value_create')}}" lableName="{{ __('Degree Name') }}" placeholder="{{ __('Enter degree name') }}" fieldsetClass="w-full" errorBag="education"/>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-form-fieldset name="education_education_create" value="{{old('education_education_create')}}" lableName="{{ __('Field of Study') }}" placeholder="{{ __('Enter field of study') }}" fieldsetClass="w-full" errorBag="education"/>
                <x-form-fieldset name="education_adress_create" value="{{old('education_adress_create')}}" lableName="{{ __('Institution') }}" placeholder="{{ __('Enter institution name') }}" fieldsetClass="w-full" errorBag="education"/>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-form-fieldset name="education_start_date_create" type="month" value="{{old('education_start_date_create')}}" lableName="{{ __('Start Date') }}" fieldsetClass="w-full" errorBag="education"/>
                <x-form-fieldset name="education_end_date_create" type="month" value="{{old('education_end_date_create')}}" lableName="{{ __('End Date') }}" fieldsetClass="w-full" errorBag="education"/>
            </div>
            <x-form-fieldset name="education_gpa_create" value="{{old('education_gpa_create')}}" lableName="{{ __('GPA') }}" placeholder="{{ __('Enter GPA') }}" fieldsetClass="w-full" errorBag="education"/>
            <x-form-fieldset-file name="education_file_create" lableName="{{ __('Certificate (Optional)') }}" fieldsetClass="w-full" errorBag="education"/>
        </x-form-structure>
    </div>
@endif
