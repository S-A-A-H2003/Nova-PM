@props([
    "id",
    "userCvContent",
    "isViewTo" => false
])
@php
    $counter = 0;
@endphp
<div class="w-full mt-6 p-5 bg-white rounded-xl shadow-sm border border-gray-100" id="{{$id}}">
    <div class="grid gap-3">
        @foreach($userCvContent->where('type' , 'courses') as $course)
            @php
                $counter++;
            @endphp
            <div class="p-4 bg-gray-50 rounded-lg">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex-1">
                        <h3 class="font-bold text-lg text-gray-800">
                            <span class="capitalize">{{$course->value}}</span>
                            @if(json_decode($course->extensions)->courses_place ?? null)
                                <span class="text-gray-500 ml-2">• {{json_decode($course->extensions)->courses_place}}</span>
                            @endif
                        </h3>
                        <div class="mt-1 text-sm text-gray-500">
                            {{\Carbon\Carbon::parse(json_decode($course->extensions)->courses_start_date)->translatedFormat('M Y')}} - {{\Carbon\Carbon::parse(json_decode($course->extensions)->courses_end_date)->translatedFormat('M Y')}}
                        </div>
                    </div>
                    <div class="flex items-start gap-2">
                        <a href="{{route('utilities.viewFile' , ['App\Models\CvContent' , $course->id , 'extensions' , true ,'courses_file'])}}" target="_blank" class="flex-shrink-0">
                            <svg class="w-8 h-8 text-violet-500 hover:text-violet-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </a>
                        @if(!$isViewTo)
                            <x-profile-general-header routePath="profile.cv.courses.delete" routeId="{{$course->id}}" editId="button_edit_courses_{{$counter}}" style_number="3" is_view_to="{{$isViewTo}}"/>
                        @endif
                    </div>
                </div>
            </div>
            <x-profile-courses-edit :course="$course" id="form_edit_courses_{{$counter}}" is_view_to="{{$isViewTo}}"/>
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
        let courses_counter = `{{$counter}}`;
    </script>
@endpush
