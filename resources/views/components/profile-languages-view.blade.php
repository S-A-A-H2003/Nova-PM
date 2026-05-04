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
        @foreach($userCvContent->where('type' , 'languages') as $language)
            @php
                $counter++;
            @endphp
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-sm font-medium">
                        {{ $counter }}
                    </span>
                    <div>
                        <span class="font-semibold text-gray-800 capitalize">{{$language->value}}</span>
                        <span class="text-gray-600 text-sm ml-2">({{json_decode($language->extensions)->languages_level}})</span>
                        @if(json_decode($language->extensions)->languages_file ?? null)
                            <a href="{{route('utilities.viewFile' , ['App\Models\CvContent' , $language->id , 'extensions' , true ,"languages_file"])}}" target="_blank" class="ml-2 text-violet-600 hover:text-violet-700 hover:underline text-sm flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                {{ __('Certificate') }}
                            </a>
                        @endif
                    </div>
                </div>
                @if(!$isViewTo)
                    <div class="flex items-center gap-2">
                        <x-profile-general-header routePath="profile.cv.languages.delete" routeId="{{$language->id}}" editId="button_edit_languages_{{$counter}}" style_number="3" is_view_to="{{$isViewTo}}"/>
                    </div>
                @endif
            </div>
            <x-profile-languages-edit :language="$language" id="form_edit_languages_{{$counter}}" is_view_to="{{$isViewTo}}"/>
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
        let languages_counter = `{{$counter}}`;
    </script>
@endpush
