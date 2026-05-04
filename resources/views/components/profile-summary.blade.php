@props([
    "userCvContent",
    "isViewTo" => false,
])
@php
    $id = $userCvContent->where('type' , 'summary')->value('id') ?? null;
@endphp
<section class="w-full h-fit mt-3 p-10" id="summary">
    <x-profile-general-header name="Summary" routePath="profile.cv.summary.delete" routeId="{{$id}}" createId="button_create_summary" editId="button_edit_summary" is_view_to="{{$isViewTo}}"/>
    <x-profile-summary-view :user_cv_content="$userCvContent" id="view_summary" is_view_to="{{$isViewTo}}"/>
    <x-profile-summary-create id="form_create_summary" is_view_to="{{$isViewTo}}"/>
    <x-profile-summary-edit :user_cv_content="$userCvContent" id="form_edit_summary" is_view_to="{{$isViewTo}}"/>
</section>
