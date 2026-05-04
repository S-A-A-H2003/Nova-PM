@props([
    "id",
    "userCvContent",
    "isViewTo" => false
])
@php
    $counter = 0;
@endphp

<div class="w-full mt-6 p-5 bg-white rounded-xl shadow-sm border border-gray-100" id="{{$id}}">
    <div class="grid gap-2">
        @foreach($userCvContent->where('type' , 'skills') as $skill)
            @php
                $counter++;
            @endphp
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-violet-100 text-violet-600 rounded-full flex items-center justify-center text-sm font-medium">
                        {{ $counter }}
                    </span>
                    <span class="text-gray-700 capitalize">{{$skill->value}}</span>
                </div>
                @if(!$isViewTo)
                    <div class="flex items-center gap-2">
                        <x-profile-general-header routePath="profile.cv.skills.delete" routeId="{{$skill->id}}" editId="button_edit_skills_{{$counter}}" style_number="3" is_view_to="{{$isViewTo}}"/>
                    </div>
                @endif
            </div>
            <x-profile-skills-edit :skill="$skill" id="form_edit_skills_{{$counter}}" is_view_to="{{$isViewTo}}"/>
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
        let skills_counter = `{{$counter}}`;
    </script>
@endpush
