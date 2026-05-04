@props([
    "userCvContent",
    "isViewTo" => false,
])

<section class="w-full h-fit mt-3 p-10" id="education">
    <x-profile-general-header name="Education" createId="button_create_education" style_number="2" is_view_to="{{$isViewTo}}"/>
    <x-profile-education-view :user_cv_content="$userCvContent" id="view_education" is_view_to="{{$isViewTo}}"/>
    <x-profile-education-create id="form_create_education" is_view_to="{{$isViewTo}}"/>
</section>
