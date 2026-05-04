<aside class="rounded-l-2xl bg-[#FCFBFF] flex items-center justify-center max-xl:hidden transition">
   <div class="w-[318px] min-h-[581px] bg-[#F5F2FF] rounded-xl flex flex-col items-center p-6">
        <!-- Language Toggle -->
        <div class="w-full">
            <label class="flex items-center justify-between cursor-pointer group">
                <span class="text-gray-700 font-medium text-sm">{{ __('Language') }}</span>
                <div class="relative">
                    <a href="{{route('language.switch', ['locale' => app()->getLocale() === 'ar' ? 'en' : 'ar'])}}"
                       class="relative block w-14 h-8 rounded-full transition-all duration-300 ease-in-out
                              {{ app()->getLocale() === 'ar' ? 'bg-violet-500' : 'bg-gray-300' }}">
                        <span class="absolute top-1 left-1 bg-white w-6 h-6 rounded-full shadow-md transform transition-transform duration-300 ease-in-out
                                     {{ app()->getLocale() === 'ar' ? 'translate-x-6' : 'translate-x-0' }} flex items-center justify-center text-xs font-bold">
                            {{ app()->getLocale() === 'ar' ? 'ع' : 'EN' }}
                        </span>
                    </a>
                </div>
            </label>
        </div>
   </div>
</aside>
