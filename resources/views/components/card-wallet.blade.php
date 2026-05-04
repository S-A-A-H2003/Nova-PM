<div class="w-full min-h-[125px] sm:min-h-[140px] bg-violet-100 flex flex-col sm:flex-row justify-between items-center p-4 sm:p-5 transition">
    <div class="mb-3 sm:mb-0">
        <h1 class="font-bold text-3xl sm:text-4xl text-violet-500">{{$wallet->balance}} <span class="text-base sm:text-lg">{{$wallet->currency}}</span></h1>
    </div>

    <div class="flex gap-2 sm:gap-3">
        <a href="{{route('transaction.selectAmount')}}" class="w-[100px] sm:w-[100px] h-[45px] sm:h-[50px] bg-violet-500 flex items-center justify-center">
           <x-svg-deposit width="20" height="20" class="sm:w-[28px] sm:h-[28px]"/>
        </a>
    </div>
</div>
