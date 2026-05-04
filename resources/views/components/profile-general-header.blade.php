@props([
    "routeId" => "",
    "createId" => "",
    "editId" => "",
    "routePath" => "",
    "name" => "",
    "isViewTo" => false,
    "styleNumber" => "1"

])

<div class="w-full flex justify-between items-center">
    <h1 class="font-bold text-3xl">{{__($name)}}</h1>
    @if($isViewTo == false)
        <div class="h-fit p-5 flex items-center">
            @switch($styleNumber)
                @case("1")
                    @if($routeId)
                        <x-profile-general-delete path="{{$routePath}}" id="{{$routeId}}"/>
                    @endif
                    @if($routeId)
                        <div id="{{$editId}}" class="mx-5">
                            <x-svg-edit width="24" height="24" />
                        </div>
                    @endif
                    @if(!$routeId)
                        <button id="{{$createId}}">
                            <x-svg-create/>
                        </button>
                    @endif
                    @break
                    @case("2")
                        <button id="{{$createId}}">
                            <x-svg-create/>
                        </button>
                    @break
                    @case("3")
                        <x-profile-general-delete path="{{$routePath}}" id="{{$routeId}}"/>
                        <div id="{{$editId}}" class="mx-5">
                            <x-svg-edit width="24" height="24" />
                        </div>
                    @break
                 @case("4")
                         <div id="{{$editId}}" class="mx-5">
                             <x-svg-edit width="24" height="24" />
                         </div>
                     @break
                 @default
             @endswitch
        </div>
    @endif
</div>
