@props([
    "userCvContent",
    "isViewTo" => false,
])

<section class="w-full h-fit mt-3 p-10" id="languages">
    <x-profile-general-header name="Languages" createId="button_create_languages" style_number="2" is_view_to="{{$isViewTo}}"/>
    <x-profile-languages-view :user_cv_content="$userCvContent" id="view_languages" is_view_to="{{$isViewTo}}"/>
    <x-profile-languages-create id="form_create_languages" is_view_to="{{$isViewTo}}"/>
</section>
