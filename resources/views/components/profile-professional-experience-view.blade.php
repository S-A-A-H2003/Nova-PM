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
        @foreach($userCvContent->where('type' , 'professionalExperience') as $professional_experience)
            @php
                $counter++;
            @endphp
            <div class="p-4 bg-gray-50 rounded-lg">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex-1">
                        <h3 class="font-bold text-lg text-gray-800">
                            <span class="capitalize">{{$professional_experience->value}}</span>
                            @if(json_decode($professional_experience->extensions)->professional_experience_adress ?? null)
                                <span class="text-gray-500 ml-2">• {{json_decode($professional_experience->extensions)->professional_experience_adress}}</span>
                            @endif
                        </h3>
                        <div class="flex items-center gap-4 mt-2 text-sm text-gray-500">
                            <span>
                                {{\Carbon\Carbon::parse(json_decode($professional_experience->extensions)->professional_experience_start_date)->translatedFormat('M Y')}} - {{\Carbon\Carbon::parse(json_decode($professional_experience->extensions)->professional_experience_end_date)->translatedFormat('M Y')}}
                            </span>
                        </div>
                        @if(json_decode($professional_experience->extensions)->professional_experience_description ?? null)
                            <p class="mt-2 text-sm text-gray-600 leading-relaxed">
                                {!!json_decode($professional_experience->extensions)->professional_experience_description!!}
                            </p>
                        @endif
                    </div>
                    <div class="flex items-start gap-2">
                        <a href="{{route('utilities.viewFile' , ['App\Models\CvContent' , $professional_experience->id , 'extensions' , true ,'professional_experience_file'])}}" target="_blank" class="flex-shrink-0">
                            <svg class="w-8 h-8 text-violet-500 hover:text-violet-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </a>
                        @if(!$isViewTo)
                            <x-profile-general-header routePath="profile.cv.professionalExperience.delete" routeId="{{$professional_experience->id}}" editId="button_edit_professional_experience_{{$counter}}" style_number="3" is_view_to="{{$isViewTo}}"/>
                        @endif
                    </div>
                </div>
            </div>
            <x-profile-professional-experience-edit :professional_experience="$professional_experience" id="form_edit_professional_experience_{{$counter}}" is_view_to="{{$isViewTo}}"/>
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
        let professional_experience_counter = `{{$counter}}`;
    </script>
@endpush
