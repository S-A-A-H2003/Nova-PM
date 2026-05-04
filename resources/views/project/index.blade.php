@extends('layouts.app')
@section('title', 'Project')
@section('content')
<section>
    {{-- My Projects --}}
    <section class="w-full h-fit px-5 mb-5" id="my_projects">
        <div class="flex justify-between items-center mb-3">
            <p class="p-4 font-bold text-2xl">{{__("My Projects")}}</p>
            <x-svg-create/>
        </div>
        <div class="mt-8 mb-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($my_projects as $project)
                <x-card-project :project="$project"/>
            @empty
                <p class="w-full h-[50vh] flex justify-center items-center col-start-1 col-end-3">{{__("You do not have any projects")}}<button id="button_new_project_other" class="text-blue-600 underline ml-1"> {{__("click here to create a new project.")}}</button></p>
            @endforelse
        </div>

        <x-general-pagination :name="$my_projects"/>

        {{-- Create New Project --}}
        <x-project-create :errors="$errors" id="form_new_project"/>

    </section>

    {{-- Browse Projects --}}
    <section class="w-full h-fit px-5" id="browse_projects">
        <div class="mb-3">
            <p class="p-4 font-bold text-2xl">{{__("Browse Projects")}}</p>
        </div>
        <div class="flex flex-wrap gap-2 justify-between items-center mb-4">
            <div class="flex flex-wrap gap-2">
                <form action="{{URL::current()}}#browse_projects" method="get" class="w-auto min-w-[120px] h-[50px] flex items-center justify-center rounded-full font-thin text-slate-800 text-lg hover:text-white hover:bg-[#9854CB]">
                    <input type="hidden" name="category" value="programming">
                    <button type="submit">{{__("Programming")}}</button>
                </form>
                <form action="{{URL::current()}}#browse_projects" method="get" class="w-auto min-w-[120px] h-[50px] flex items-center justify-center rounded-full font-thin text-slate-800 text-lg hover:text-white hover:bg-[#9854CB]">
                    <input type="hidden" name="category" value="designing">
                    <button type="submit">{{__("Designing")}}</button>
                </form>
                <form action="{{URL::current()}}#browse_projects" method="get" class="w-auto min-w-[120px] h-[50px] flex items-center justify-center rounded-full font-thin text-slate-800 text-lg hover:text-white hover:bg-[#9854CB]">
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
                    <p class="w-full h-[50vh] flex justify-center items-center col-start-1 col-end-3">{{__("Oobs! There are no projects after creator yet")}}</p>
                @endforelse
        </div>
        <x-general-pagination :name="$browse_projects"/>


    </section>
</section>
@endsection
