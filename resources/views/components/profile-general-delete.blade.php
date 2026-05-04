@props([
    "path" => "/",
    "id",
    "isViewTo" => false
])

@if($isViewTo == false)
    <x-form-structure action="{{route($path , $id)}}" method="DELETE" button="svg-trash">
    </x-form-structure>
@endif
