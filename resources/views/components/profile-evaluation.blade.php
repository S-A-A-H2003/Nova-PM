@props([
    'user',
    'evaluationsSender'
])
@php
    $evaluation_sender = $evaluationsSender->where('user_id' , Auth::id())->where('evaluationable_id' , $user->id)->first();
@endphp
@if(Auth::id() != $user->id)
    <section class="w-full h-fit mt-3 p-10" id="courses">
        <h1 class="w-full h-fit font-bold text-3xl p-5 text-center text-gray-800">{{ __('Evaluation') }}</h1>
        <x-form-structure action="{{route('user.evaluation')}}" formClass="border border-violet-200 flex flex-col p-6 bg-white rounded-xl shadow-sm">
            <x-form-fieldset
                type="hidden"
                name="recipient"
                value="{{$user->id}}" />

            <div class="mb-6">
                <label class="text-gray-700 font-medium mb-3 block text-center">{{ __('Rate this user') }}</label>
                <div class="flex justify-center space-x-3">
                    @for($i = 1; $i <= 5; $i++)
                        <label class="flex flex-col items-center cursor-pointer">
                            <input type="checkbox" 
                                   name="rate[]" 
                                   value="{{$i}}"
                                   class="peer sr-only"
                                   {{ ($evaluation_sender && in_array($i, explode(',', $evaluation_sender->rate ?? []))) ? 'checked' : '' }}>
                            <div class="w-12 h-12 rounded-full border-2 border-gray-300 peer-checked:border-violet-500 peer-checked:bg-violet-100 flex items-center justify-center transition-all hover:border-violet-400">
                                <svg class="w-6 h-6 text-gray-400 peer-checked:text-violet-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                            <span class="text-xs mt-1 text-gray-500">{{$i}}</span>
                        </label>
                    @endfor
                </div>
            </div>

            <x-form-fieldset-textarea
                name="comment"
                lable_name="{{ __('Comment') }}"
                placeholder="{{ __('Write your comment here...') }}"
                value="{{$evaluation_sender->comment ?? old('comment')}}"/>

            <button type="submit" class="w-full mt-4 btn-primary justify-center">
                {{ __('Submit Evaluation') }}
            </button>
        </x-form-structure>
    </section>
@endif
