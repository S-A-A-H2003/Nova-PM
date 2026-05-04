@props([
     'errors' ,
     'project' ,
     'task' ,
     'id' => ''
 ])
 <div
     @if($errors->any())
         class ="absolute w-[960px] h-fit bg-white shadow-2xl top-16 rounded-lg p-5 z-10 ring-1 ring-red-200"
     @else
         class ="absolute w-[960px] h-fit bg-white shadow-inner top-16 rounded-lg p-5 z-10 hidden"
     @endif
     id="{{$id}}">
 
     <div id="close_form_new_delivery" class=" absolute right-4 top-4 py-2">
         <x-svg-cross class="w-5 h-5 text-gray-400 hover:text-gray-600 cursor-pointer"/>
     </div>
 
     <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('Create New Delivery') }}</h3>
     <x-form-structure action="{{route('delivery.store' , [$project->id , $task->id])}}"  button-class="mt-4" form-class="p-2 mt-2">
         <x-form-fieldset name="link" type="url" placeholder="https://www.example.com" lable_name="{{ __('Enter URL to your delivery') }}"/>
     </x-form-structure>
 </div>
