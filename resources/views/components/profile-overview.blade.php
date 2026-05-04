@props([
    "user",
    "userInformation",
    "evaluation",
    "isViewTo" => false,
])

<section class="w-full h-fit p-10" id="overview">
    <x-profile-general-header name="Overview" style_number="4" edit_id="button_edit_overview" is_view_to="{{$isViewTo}}"/>
    <x-profile-overview-view :user_information="$userInformation" :user="$user" :evaluation="$evaluation" is_view_to="{{$isViewTo}}"/>
    <x-profile-overview-create-edit :user_information="$userInformation" :user="$user" is_view_to="{{$isViewTo}}"/>
</section>
