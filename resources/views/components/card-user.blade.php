<a href="{{route('profile.viewTo' , $user->id)}}">
    <div class="flex items-center w-full h-[80px] sm:h-[100px] mb-2 sm:mb-3 p-3 sm:p-4 border border-violet-500 rounded-md hover:border-violet-600 hover:shadow-md transition-all">
        <img src="{{Storage::url($user->information->photo ?? '')}}" alt="{{ $user->name }}" class="mr-3 sm:mr-4 w-[40px] h-[40px] sm:w-[50px] sm:h-[50px] rounded-full text-center border-2 border-violet-400 object-cover">
        <div class="min-w-0">
            <h1 class="text-sm sm:text-lg font-medium tracking-wide truncate capitalize">{{$user->name}}</h1>
        </div>
    </div>
</a>
