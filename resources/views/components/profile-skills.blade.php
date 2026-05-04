@props([
    "userCvContent",
    "isViewTo" => false,
])

<section class="w-full h-fit mt-3 p-10" id="skills">
    <x-profile-general-header name="Skills" createId="button_create_skills" style_number="2" is_view_to="{{$isViewTo}}"/>
    <x-profile-skills-view :user_cv_content="$userCvContent" id="view_skills" is_view_to="{{$isViewTo}}"/>
    <x-profile-skills-create id="form_create_skills" is_view_to="{{$isViewTo}}"/>
</section>
