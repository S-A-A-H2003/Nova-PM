@props([
    "user",
    "evaluation",
    "userInformation",
    "isViewTo" => false,
])

@php
    $rate = $evaluation->avg('rate') ?? 0;
    $rate = round($rate);
@endphp

<div class="w-full h-fit mt-6 p-5" id="view_overview">
    <div class="w-full h-fit flex flex-col justify-center items-center text-center">
        <img src="{{Storage::url($userInformation->photo ?? '')}}" alt="{{ __('User photo') }}" class="mb-4 w-[150px] h-[150px] rounded-full object-cover border-4 border-violet-200 shadow-lg">
        <h1 class="font-bold text-3xl tracking-wide mb-3 text-gray-800">{{$user->name}}</h1>
        <div class="mb-3">
            @switch((int)$rate)
                @case(0)
                    <x-svg-stars/>
                @break
                @case(1)
                    <x-svg-stars fill="1"/>
                @break
                @case(2)
                    <x-svg-stars fill="2"/>
                    @break
                @case(3)
                    <x-svg-stars fill="3"/>
                    @break
                @case(4)
                    <x-svg-stars fill="4"/>
                    @break
                @case(5)
                    <x-svg-stars fill="5"/>
                    @break
            @endswitch
        </div>
        @if($userInformation->occupation ?? null)
            <p class="text-lg bg-violet-100 text-violet-700 py-1.5 px-4 mt-2 rounded-full font-medium">
                {{$userInformation->occupation ?? ''}}
            </p>
        @endif
        <p class="text-gray-600 mt-2">{{$userInformation->address ?? ''}}</p>
    </div>
    @if($userInformation)
        <div class="mt-10 flex flex-col items-center">
            <button id="button_read_more" class="text-violet-600 hover:text-violet-700 font-medium flex items-center gap-1 transition-colors">
                {{ __('Read More') }}...
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div class="hidden mt-4 w-full max-w-md" id="read_more">
                <div class="bg-gray-50 rounded-xl p-6 space-y-3">
                    @if($userInformation->date_pirth)
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-gray-700">{{ $userInformation->date_pirth->format('M d, Y') }}</span>
                        </div>
                    @endif
                    @if($userInformation->gender)
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="capitalize text-gray-700">{{$userInformation->gender}}</span>
                        </div>
                    @endif
                    @if($user->phone_number)
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <a href="tel:{{$user->phone_number}}" class="text-gray-700 hover:text-violet-600">{{$user->phone_number}}</a>
                        </div>
                    @endif
                    @if($userInformation->email)
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <a href="mailto:{{$userInformation->email}}" class="text-gray-700 hover:text-violet-600">{{$userInformation->email}}</a>
                        </div>
                    @endif
                    @if($userInformation->link_one)
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                            </svg>
                            <a href="{{$userInformation->link_one}}" target="_blank" class="text-gray-700 hover:text-violet-600">
                                {{ $userInformation->link_one_as ?? $userInformation->link_one }}
                            </a>
                        </div>
                    @endif
                    @if($userInformation->link_two)
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                            </svg>
                            <a href="{{$userInformation->link_two}}" target="_blank" class="text-gray-700 hover:text-violet-600">
                                {{ $userInformation->link_two_as ?? $userInformation->link_two }}
                            </a>
                        </div>
                    @endif
                    @if($userInformation->link_three)
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                            </svg>
                            <a href="{{$userInformation->link_three}}" target="_blank" class="text-gray-700 hover:text-violet-600">
                                {{ $userInformation->link_three_as ?? $userInformation->link_three }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endif
        @if(!$evaluation->isEmpty())
            <div class="my-8 w-full">
                <h2 class="font-bold text-3xl text-gray-800 mb-8 text-center">{{ __('Comments') }}</h2>
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($evaluation as $value)
                        <x-card-evaluation :value="$value" is_view_to="{{$isViewTo}}"/>
                    @endforeach
                </div>
            </div>
        @endif
</div>
