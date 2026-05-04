@props([
    "userCvContent",
    "isViewTo" => false,
])

<section class="w-full h-fit mt-3 p-10" id="courses">
    <x-profile-general-header name="Courses" createId="button_create_courses" style_number="2" is_view_to="{{$isViewTo}}"/>
    <x-profile-courses-view :user_cv_content="$userCvContent" id="view_courses" is_view_to="{{$isViewTo}}"/>
    <x-profile-courses-create id="form_create_courses" is_view_to="{{$isViewTo}}"/>
</section>
