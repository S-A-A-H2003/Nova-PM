<a href="{{route('profile.viewTo' , $user->id)}}">
    <div class="flex items-center w-full h-[80px] sm:h-[100px] mb-2 sm:mb-3 p-3 sm:p-4 modern-card hover:border-violet-300">
        <img src="{{Storage::url($user->information->photo ?? '')}}" alt="{{ $user->name }}" class="mr-3 sm:mr-4 w-[40px] h-[40px] sm:w-[50px] sm:h-[50px] rounded-full text-center border-2 border-violet-200 object-cover shadow-sm">
        <div class="min-w-0">
            <h1 class="text-sm sm:text-lg font-semibold tracking-wide truncate capitalize text-slate-900">{{$user->name}}</h1>
        </div>
    </div>
</a>
