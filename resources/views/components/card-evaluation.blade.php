@props([
    "value"
])

<div class="w-full max-w-[320px] sm:max-w-[40vh] mx-auto sm:mx-4 bg-white rounded-lg sm:rounded-md shadow-md p-3 sm:p-4 flex flex-col">
    <a href="{{route('profile.viewTo' , $value->user->id)}}">
        <div class="flex items-center mb-3 sm:mb-4">
            <img src="{{Storage::url($value->user->information->photo ?? '')}}" alt="{{ $value->user->name }}" class="mr-2 sm:mr-3 w-[40px] h-[40px] sm:w-[45px] sm:h-[45px] rounded-full text-center border-2 border-violet-400 object-cover">
            <p class="text-sm sm:text-base truncate">{{$value->user->name}}</p>
        </div>
    </a>
    <div class="w-full min-h-[120px] sm:min-h-[35vh] rounded-md border border-violet-400 p-3 break-words cursor-text flex-1">
        {{$value->comment}}
    </div>
    <div class="mx-auto mt-3">
        @if($isViewTo == false)
                <x-form-structure action="{{route('user.evaluation.delete' , $value->id)}}" method="DELETE" button="svg-trash"></x-form-structure>
        @endif
    </div>
</div>
