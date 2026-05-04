@extends('layouts.app', ['isProfile' => true])
@section('title', __('Profile'))
@section('content')
<section class="w-full h-fit flex flex-col justify-center items-center py-6">
    <div class="w-full max-w-4xl h-fit p-4 sm:p-6 bg-white rounded-xl shadow-sm border border-gray-100 mx-4">
        <x-profile-overview :user_information="$user_information" :user="$user" :evaluation="$evaluation"/>
        <x-profile-summary :user_cv_content="$user_cv_content"/>
        <x-profile-education :user_cv_content="$user_cv_content"/>
        <x-profile-skills :user_cv_content="$user_cv_content"/>
        <x-profile-professional-experience :user_cv_content="$user_cv_content"/>
        <x-profile-languages :user_cv_content="$user_cv_content"/>
        <x-profile-courses :user_cv_content="$user_cv_content"/>
    </div>
</section>
@endsection
