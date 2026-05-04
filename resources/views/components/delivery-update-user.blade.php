@props([
    'delivery' ,
    'project' ,
])
<div class="border mt-4 rounded-lg p-4 w-full bg-gray-50">
    <h4 class="text-sm font-semibold text-gray-700 mb-3">{{ __('Update Delivery Link') }}</h4>
    <x-form-structure action="{{route('delivery.update' , [$project->id , $delivery->id])}}" method="PUT"  button-class="mt-3">
        <x-form-fieldset name="link" type="url" placeholder="https://www.example.com" value="{{$delivery->link}}" lable_name="{{ __('Enter URL to your delivery update') }}"/>
    </x-form-structure>
</div>
