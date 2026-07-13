<div class="w-full min-h-[125px] sm:min-h-[140px] modern-card flex flex-col sm:flex-row justify-between items-center p-4 sm:p-5 overflow-hidden relative">
    <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-violet-600 via-sky-500 to-emerald-400"></div>
    <div class="mb-3 sm:mb-0">
        <h1 class="font-bold text-3xl sm:text-4xl text-slate-900">{{$wallet->balance}} <span class="text-base sm:text-lg text-slate-500">{{$wallet->currency}}</span></h1>
    </div>

    <div class="flex gap-2 sm:gap-3">
        <a href="{{route('transaction.selectAmount')}}" class="w-[100px] sm:w-[100px] h-[45px] sm:h-[50px] btn-primary">
           <x-svg-deposit width="20" height="20" class="sm:w-[28px] sm:h-[28px]"/>
        </a>
    </div>
</div>
