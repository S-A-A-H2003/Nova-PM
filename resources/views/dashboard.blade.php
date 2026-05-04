@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
{{-- Header --}}
<section>
    <x-search :result_search="$result_search"/>
    @if($user_to_view_cv)
        {{-- Cross --}}
        <x-form-structure action="{{URL::current()}}" button="svg-cross" method="GET" form_class="w-full h-fit mb-5 flex justify-end pr-5">
            <x-form-fieldset type="hidden" name="search" value="" lable_name=""/>
        </x-form-structure>
        {{-- End Cross --}}
        <div class="w-full h-fit bg-white p-4 sm:p-5 rounded-lg shadow-md z-40 mx-4 sm:mx-0">
            @forelse($user_to_view_cv as $user)
                <x-card-user :user="$user"/>
            @empty
                <p class="w-full h-[50vh] flex justify-center items-center text-gray-600 text-base sm:text-lg">{{ __("There are no any use as this name.") }}</p>
            @endforelse
        </div>
    @endif
    @if(!$user_to_view_cv)
        <div class="mx-4 sm:mx-0">
            <x-card-welcome/>
        </div>
    @endif
</section>
{{-- Projects --}}
@if(!$user_to_view_cv)
    <section class="mt-8 sm:mt-10 w-full h-fit px-4 sm:px-0">
        <div class="mb-3">
            <p class="p-4 font-bold text-2xl text-gray-800">{{ __('Projects') }}</p>
        </div>
        <div class="flex flex-wrap gap-3 sm:gap-4 justify-center sm:justify-start">
            <x-card-count count="{{$project_number}}" name="{{ __('My Projects') }}" color="violet"/>
            <x-card-count count="{{$project_category_programming_number}}" name="{{ __('Programming') }}" color="blue"/>
            <x-card-count count="{{$project_category_designing_number}}" name="{{ __('Designing') }}" color="purple"/>
            <x-card-count count="{{$project_category_other_number}}" name="{{ __('Other') }}" color="gray"/>
            <x-card-count count="{{$project_type_free_number}}" name="{{ __('Free') }}" color="green"/>
            <x-card-count count="{{$project_type_paid_number}}" name="{{ __('Paid') }}" color="amber"/>
            <x-card-count count="{{$project_status_active_number}}" name="{{ __('Active') }}" color="emerald"/>
            <x-card-count count="{{$project_status_stopped_number}}" name="{{ __('Stopped') }}" color="rose"/>
        </div>
    </section>
    {{-- Tasks --}}
    <section class="mt-8 w-full h-fit px-4 sm:px-0">
        <div class="mb-3">
            <p class="p-4 font-bold text-2xl text-gray-800">{{ __('Tasks') }}</p>
        </div>
        <div class="flex flex-wrap gap-3 sm:gap-4">
            <x-card-count count="{{$in_progress}}" name="{{ __('In Progress') }}" color="violet"/>
        </div>
    </section>
@endif
@endsection

