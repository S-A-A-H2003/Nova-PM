<aside class="flex items-center justify-center max-xl:hidden transition">
    <div class="w-[318px] min-h-[581px] glass-panel rounded-lg flex flex-col items-center p-6">
        <div class="w-full">
            <label class="flex items-center justify-between cursor-pointer group">
                <span class="text-slate-700 font-semibold text-sm">{{ __('Language') }}</span>
                <div class="relative">
                    <a href="{{route('language.switch', ['locale' => app()->getLocale() === 'ar' ? 'en' : 'ar'])}}"
                       class="relative block w-14 h-8 rounded-full transition-all duration-300 ease-in-out
                              {{ app()->getLocale() === 'ar' ? 'bg-violet-600' : 'bg-slate-300' }}">
                        <span class="absolute top-1 left-1 bg-white w-6 h-6 rounded-full shadow-md transform transition-transform duration-300 ease-in-out
                                     {{ app()->getLocale() === 'ar' ? 'translate-x-6' : 'translate-x-0' }} flex items-center justify-center text-[10px] font-bold text-slate-700">
                            {{ app()->getLocale() === 'ar' ? 'AR' : 'EN' }}
                        </span>
                    </a>
                </div>
            </label>
        </div>
    </div>
</aside>
