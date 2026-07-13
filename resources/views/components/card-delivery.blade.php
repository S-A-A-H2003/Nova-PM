<div class="w-full modern-card p-4 sm:p-5">
    <div class="flex flex-col gap-4">
        <div class="overflow-x-auto -mx-4 sm:mx-0">
            <table class="w-full min-w-[300px]">
                <tr class="border-b border-slate-100">
                    <th class="p-2 sm:p-3 text-start text-xs sm:text-sm font-semibold text-slate-600 w-24 sm:w-28">{{ __('Status') }}</th>
                    <td class="p-2 sm:p-3">
                        @if ($delivery->status == 'evaluation')
                            <span class="status-pill bg-emerald-100 text-emerald-800">
                                {{ __($delivery->status) }}
                            </span>
                        @elseif ($delivery->status == 'approved')
                            <span class="status-pill bg-sky-100 text-sky-800">
                                {{ __($delivery->status) }}
                            </span>
                        @elseif ($delivery->status == 'rejected')
                            <span class="status-pill bg-red-100 text-red-800">
                                {{ __($delivery->status) }}
                            </span>
                        @else
                            <span class="status-pill bg-slate-100 text-slate-800">
                                {{ __($delivery->status) }}
                            </span>
                        @endif
                    </td>
                </tr>
                <tr class="border-b border-slate-100">
                    <th class="p-2 sm:p-3 text-start text-xs sm:text-sm font-semibold text-slate-600 w-24 sm:w-28">{{ __('Link') }}</th>
                    <td class="p-2 sm:p-3">
                        <a class="font-medium text-xs sm:text-sm text-sky-600 hover:text-sky-700 hover:underline break-all" href="{{$delivery->link}}" target="_blank">
                            {{ Str::limit($delivery->link, 40) }}
                        </a>
                    </td>
                </tr>
                <tr class="border-b border-slate-100">
                    <th class="p-2 sm:p-3 text-start text-xs sm:text-sm font-semibold text-slate-600 w-24 sm:w-28">{{ __('Evaluation') }}</th>
                    <td class="p-2 sm:p-3">
                        <span class="text-xs sm:text-sm text-slate-700">{{$delivery->evaluation}}</span>
                    </td>
                </tr>
                <tr class="border-b border-slate-100">
                    <th class="p-2 sm:p-3 text-start text-xs sm:text-sm font-semibold text-slate-600 w-24 sm:w-28">{{ __('Feedback') }}</th>
                    <td class="p-2 sm:p-3">
                        <div class="text-xs sm:text-sm text-slate-700 prose prose-sm max-w-none">
                            {!!$delivery->feedback!!}
                        </div>
                    </td>
                </tr>
                <tr class="border-b border-slate-100">
                    <th class="p-2 sm:p-3 text-start text-xs sm:text-sm font-semibold text-slate-600 w-24 sm:w-28">{{ __('Is Best') }}</th>
                    <td class="p-2 sm:p-3">
                    @if($delivery->is_best)
                            <span class="status-pill bg-amber-100 text-amber-800">
                                {{ __('Best Delivery') }}
                            </span>
                        @else
                            <span class="text-xs text-slate-500">{{ __('No') }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="p-2 sm:p-3 text-start text-xs sm:text-sm font-semibold text-slate-600 w-24 sm:w-28">{{ __('Created') }}</th>
                    <td class="p-2 sm:p-3">
                        <span class="text-xs sm:text-sm text-slate-500">{{ $delivery->created_at->format('M d, Y H:i') }}</span>
                    </td>
                </tr>
            </table>
        </div>
        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-slate-100">
            @if(Illuminate\Support\Facades\Gate::allows('user' , [App\Models\Delivery::class , $delivery]))
                <x-delivery-update-user :project="$project" :delivery="$delivery"/>
            @elseif(Illuminate\Support\Facades\Gate::allows('owner' , [App\Models\Delivery::class , $project]))
                <x-delivery-update-owner :project="$project" :delivery="$delivery"/>
            @endif
        </div>
    </div>
</div>
