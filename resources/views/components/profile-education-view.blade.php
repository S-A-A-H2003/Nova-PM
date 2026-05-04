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
        @foreach($userCvContent->where('type' , 'education') as $education)
            @php
                $counter++;
            @endphp
            <div class="p-4 bg-gray-50 rounded-lg">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex-1">
                        <h3 class="font-bold text-lg text-gray-800 capitalize">{{$education->value}}</h3>
                        <div class="flex items-center gap-2 mt-1 text-sm text-gray-600">
                            <span class="capitalize">{{json_decode($education->extensions)->education_education}}</span>
                            <span>•</span>
                            <span class="capitalize">{{json_decode($education->extensions)->education_adress}}</span>
                        </div>
                        <div class="flex items-center gap-4 mt-2 text-sm">
                            <span class="text-gray-500">
                                {{\Carbon\Carbon::parse(json_decode($education->extensions)->education_start_date)->translatedFormat('M Y')}} - {{\Carbon\Carbon::parse(json_decode($education->extensions)->education_end_date)->translatedFormat('M Y')}}
                            </span>
                            <span class="text-gray-500">GPA: {{json_decode($education->extensions)->education_gpa}}</span>
                        </div>
                    </div>
                    <a href="{{route('utilities.viewFile' , ['App\Models\CvContent' , $education->id , 'extensions' , true ,'education_file'])}}" target="_blank" class="flex-shrink-0">
                        <svg class="w-8 h-8 text-violet-500 hover:text-violet-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </a>
                </div>
                @if(!$isViewTo)
                    <div class="mt-3 pt-3 border-t border-gray-200 flex justify-end">
                        <x-profile-general-header routePath="profile.cv.education.delete" routeId="{{$education->id}}" editId="button_edit_education_{{$counter}}" style_number="3" is_view_to="{{$isViewTo}}"/>
                    </div>
                @endif
            </div>
            <x-profile-education-edit :education="$education" id="form_edit_education_{{$counter}}" is_view_to="{{$isViewTo}}"/>
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
        let education_counter = `{{$counter}}`;
    </script>
@endpush
