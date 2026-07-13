@extends('layouts.app')
@section('title', 'Wallet')
@section('content')
    <section>
        <x-card-wallet :wallet="$wallet"/>
    </section>
    <section class="mt-10">
        <h1 class="page-title mb-6">{{__("Transactions")}}</h1>
        @if($transactions->count() > 0)
            <div class="overflow-x-auto modern-card">
                <table class="w-full min-w-[600px] h-fit">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="p-3 text-xs sm:text-sm text-slate-600">{{ __('TYPE') }}</th>
                            <th class="p-3 text-xs sm:text-sm text-slate-600">{{ __('AMOUNT') }}</th>
                            <th class="p-3 text-xs sm:text-sm text-slate-600">{{ __('CURRENCY') }}</th>
                            <th class="p-3 text-xs sm:text-sm text-slate-600">{{ __('STATUS') }}</th>
                            <th class="p-3 text-xs sm:text-sm text-slate-600">{{ __('DESCRIPTION') }}</th>
                            <th class="p-3 text-xs sm:text-sm text-slate-600">{{ __('DATE') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($transactions as $transaction)
                            <tr class="hover:bg-slate-50">
                                <td class="text-center p-3 text-xs sm:text-sm text-slate-700">{{__($transaction->type)}}</td>
                                <td class="text-center p-3 text-xs sm:text-sm font-semibold text-slate-900">{{$transaction->amount}}</td>
                                <td class="text-center p-3 text-xs sm:text-sm text-slate-700">{{$transaction->currency}}</td>
                                <td class="text-center p-3 text-xs sm:text-sm text-slate-700">{{__($transaction->status)}}</td>
                                <td class="text-center p-3 text-xs sm:text-sm text-slate-600 break-all">{{$transaction->description}}</td>
                                <td class="text-center p-3 text-xs sm:text-sm text-slate-500 whitespace-nowrap">{{$transaction->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="modern-card w-full h-[40vh] flex justify-center items-center text-slate-500">{{__("You do not have any transactions.")}}</p>
        @endif
    </section>
@endsection
