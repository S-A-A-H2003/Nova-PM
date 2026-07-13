@extends('layouts.app')
@section('title', 'Project')
@section('content')
<section class="space-y-10">
    {{-- My Projects --}}
    <section class="w-full h-fit" id="my_projects">
        <div class="flex justify-between items-center mb-3">
            <p class="page-title">{{__("My Projects")}}</p>
            <button class="btn-primary" id="button_new_project">
                <x-svg-create class="fill-white hover:fill-white" width="20" height="20"/>
                {{ __('Create') }}
            </button>
        </div>
        <div class="mt-8 mb-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($my_projects as $project)
                <x-card-project :project="$project"/>
            @empty
                <div class="modern-card w-full h-[42vh] flex flex-col justify-center items-center col-start-1 col-end-3 text-center p-8">
                    <p class="text-slate-500 mb-4">{{__("You do not have any projects")}}</p>
                    <button id="button_new_project_other" class="btn-secondary">{{__("click here to create a new project.")}}</button>
                </div>
            @endforelse
        </div>

        <x-general-pagination :name="$my_projects"/>

        {{-- Create New Project --}}
        <x-project-create :errors="$errors" id="form_new_project"/>

    </section>

    {{-- Browse Projects --}}
    <section class="w-full h-fit" id="browse_projects">
        <div class="mb-3">
            <p class="page-title">{{__("Browse Projects")}}</p>
        </div>
        <div class="flex flex-wrap gap-2 justify-between items-center mb-4">
            <div class="flex flex-wrap gap-2">
                <form action="{{URL::current()}}#browse_projects" method="get" class="btn-secondary min-w-[120px] h-[44px]">
                    <input type="hidden" name="category" value="programming">
                    <button type="submit">{{__("Programming")}}</button>
                </form>
                <form action="{{URL::current()}}#browse_projects" method="get" class="btn-secondary min-w-[120px] h-[44px]">
                    <input type="hidden" name="category" value="designing">
                    <button type="submit">{{__("Designing")}}</button>
                </form>
                <form action="{{URL::current()}}#browse_projects" method="get" class="btn-secondary min-w-[120px] h-[44px]">
                    <input type="hidden" name="category" value="other">
                    <button type="submit">{{__("Other")}}</button>
                </form>
            </div>

            <x-search result_search="{{$result_search}}"/>
        </div>

        <div class="mt-8 mb-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($browse_projects as $project)
                    <x-card-project :project="$project"/>
                @empty
                    <p class="modern-card w-full h-[42vh] flex justify-center items-center col-start-1 col-end-3 text-slate-500">{{__("Oobs! There are no projects after creator yet")}}</p>
                @endforelse
        </div>
        <x-general-pagination :name="$browse_projects"/>


    </section>
</section>
@endsection
