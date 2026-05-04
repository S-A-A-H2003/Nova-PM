@extends('layouts.app')
@section('title', 'Cv')
@section('content')
<section class="w-full h-fit -mt-7 flex flex-col justify-center items-center">
    <div class="w-[90%] h-fit p-5 bg-white rounded-xl">
        <x-profile-overview :user_information="$user_information" :user="$user" isViewTo="{{true}}" :evaluation="$evaluation"/>
        <x-profile-summary :user_cv_content="$user_cv_content" isViewTo="{{true}}"/>
        <x-profile-education :user_cv_content="$user_cv_content" isViewTo="{{true}}"/>
        <x-profile-skills :user_cv_content="$user_cv_content" isViewTo="{{true}}"/>
        <x-profile-professional-experience :user_cv_content="$user_cv_content" isViewTo="{{true}}"/>
        <x-profile-languages :user_cv_content="$user_cv_content" isViewTo="{{true}}"/>
        <x-profile-courses :user_cv_content="$user_cv_content" isViewTo="{{true}}"/>
        <x-profile-evaluation :user="$user" :evaluations_sender="$evaluations_sender"/>
    </div>
</section>
@endsection
