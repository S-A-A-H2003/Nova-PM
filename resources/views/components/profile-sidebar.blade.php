<aside class="rounded-l-2xl bg-[#FCFBFF] flex items-center justify-center max-xl:hidden transition overflow-scroll">
    <div class="w-[318px] min-h-[581px] bg-[#F5F2FF] rounded-xl flex flex-col p-6">

       <div class="w-full mt-3">
           <div class="w-full flex flex-col items-center my-2">
                <h2 class="mb-3 font-bold text-lg">{{ __('Issuing Now') }}</h2>
                <div class="flex items-center justify-center space-x-2">
                    <a href="{{route('issuingACertificateOfTraining')}}">
                        <x-svg-download/>
                    </a>

                    <a href="{{route('showACertificateOfTraining')}}">
                        <x-svg-show/>
                    </a>
                </div>
            </div>
           <h1 class="w-full mx-auto my-3 font-bold">{{ __('Issuing a certificate of training') }}</h1>
           <div class="text-sm">
               <h2 class="mb-3">{{ __('To issue a certificate of training, you must have at least ten residents extracted as one of the following:') }}</h2>
               <ul class="list-disc p-4 text-xs">
                   <li>{{ __('10 excellent or 10 very good') }}</li>
                   <li>{{ __('5 good, 5 very good') }}</li>
                   <li>{{ __('2 poor, 3 good, 4 very good, 1 excellent') }}</li>
                   <li>{{ __('3 poor, 2 good, 3 very good, 2 excellent') }}</li>
               </ul>
           </div>
       </div>

       <hr class=" bg-[#D9D9D9] h-[1px] w-full rounded-md my-6">

       <div class="w-full flex flex-col items-center my-2">
            <h2 class="mb-3 font-bold text-lg">{{ __('Share CV') }}</h2>
            <div class="flex items-center justify-center space-x-2">
                <button id="shere_link_profile">
                <x-svg-share/>
                </button>
                <button id="copy_link_profile" class="w-full mt-2 flex flex-col items-center">
                    <x-svg-copy/>
                </button>
                <button class="w-full mt-2 flex flex-col items-center">
                    <a href="{{URL::signedRoute('profile.viewTo' , Auth::id())}}">
                        <x-svg-show/>
                    </a>
                </button>
            </div>
            <div class="w-full mt-2 hidden break-words h-[15vh] overflow-scroll" id="view_link_profile">
                <a href="{{URL::signedRoute('profile.viewTo' , Auth::id())}}" id="link_profile" class="text-blue-400 hover:text-blue-600 hover:underline block">{{URL::signedRoute('profile.viewTo' , Auth::id())}}</a>
            </div>
       </div>

       <hr class=" bg-[#D9D9D9] h-[1px] w-full rounded-md my-6">

       <div class="w-full flex flex-col items-center my-2">
            <h2 class="mb-3 font-bold text-lg">{{ __('Download CV') }}</h2>
            <div>
                <a href="{{route('IssuingACvPdf')}}"><x-svg-download/></a>
            </div>
       </div>


   </div>
</aside>
