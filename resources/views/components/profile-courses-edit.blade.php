@props([
    "course",
    "id" => "",
    "isViewTo" => false
])

@if($isViewTo == false)
    <div @if($errors->hasAny(['courses_value' , 'courses_place' , 'courses_start_date' , 'courses_end_date' , 'courses_file'])) class="w-full mt-6 p-6 border-2 border-violet-300 rounded-xl bg-violet-50" @else class="hidden w-full mt-6 p-6 border-2 border-violet-300 rounded-xl bg-violet-50" @endif id="{{$id}}">
        <x-form-structure action="{{route('profile.cv.courses.update' , $course->id)}}" method="PUT" buttonClass="w-full mt-4 bg-violet-600 hover:bg-violet-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors" button="svg-send" formClass="w-full space-y-4">
            <h1 class="w-full text-center font-bold text-2xl text-gray-800 mb-2">{{ __('Edit Course') }}</h1>
            <x-form-fieldset name="courses_value" value="{{$course->value}}" lableName="{{ __('Course Name') }}" placeholder="{{ __('Enter course name') }}" fieldsetClass="w-full"/>
            <x-form-fieldset name="courses_place" value="{{json_decode($course->extensions)->courses_place}}" lableName="{{ __('Institution') }}" placeholder="{{ __('Enter institution name') }}" fieldsetClass="w-full"/>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-form-fieldset name="courses_start_date" type="month" value="{{json_decode($course->extensions)->courses_start_date}}" lableName="{{ __('Start Date') }}" fieldsetClass="w-full"/>
                <x-form-fieldset name="courses_end_date" type="month" value="{{json_decode($course->extensions)->courses_end_date}}" lableName="{{ __('End Date') }}" fieldsetClass="w-full"/>
            </div>
            <x-form-fieldset-file name="courses_file" isUpdate="{{true}}" lableName="{{ __('Certificate (Optional)') }}" fieldsetClass="w-full">
                <a href="{{route('utilities.viewFile' , ['App\Models\CvContent' , $course->id , 'extensions' , true ,'courses_file'])}}" target="_blank" class="text-violet-600 hover:text-violet-700 hover:underline text-sm">
                    {{ __('View Previous File') }}
                </a>
            </x-form-fieldset-file>
        </x-form-structure>
    </div>
@endif
