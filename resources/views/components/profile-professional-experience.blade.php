@props([
    "userCvContent",
    "isViewTo" => false,
])

<section class="w-full h-fit mt-3 p-10" id="professional_experience">
    <x-profile-general-header name="Professional Experience" createId="button_create_professional_experience" style_number="2" is_view_to="{{$isViewTo}}"/>
    <x-profile-professional-experience-view :user_cv_content="$userCvContent" id="view_professional_experience" is_view_to="{{$isViewTo}}"/>
    <x-profile-professional-experience-create id="form_create_professional_experience" is_view_to="{{$isViewTo}}"/>
</section>
