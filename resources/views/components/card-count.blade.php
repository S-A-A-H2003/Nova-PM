@props([
    'count' => '',
    'name' => '',
    'color' => 'violet',
])
@php
    $colors = [
        'violet' => 'text-violet-400',
        'blue' => 'text-blue-400',
        'purple' => 'text-purple-400',
        'gray' => 'text-gray-400',
        'green' => 'text-green-400',
        'amber' => 'text-amber-400',
        'emerald' => 'text-emerald-400',
        'rose' => 'text-rose-400',
    ];
    $colorClass = $colors[$color] ?? 'text-violet-400';
@endphp
<div class="w-full max-w-[176px] h-36 rounded-2xl bg-[#FCFBFF] shadow-sm flex flex-col justify-center items-center m-3 p-3 sm:p-4 hover:shadow-lg transition-all border border-gray-50 hover:border-violet-200">
    <div class="flex flex-col w-full items-center justify-center text-center">
        <h4 class="font-semibold text-xs sm:text-sm text-gray-700 mb-2">{{__($name)}}</h4>
        <p class="{{$colorClass}} font-bold text-2xl sm:text-3xl">{{$count}}</p>
    </div>
</div>
