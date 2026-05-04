@extends('layouts.app')
@section('title', 'Wallet')
@section('content')
    <section>
        <x-card-wallet :wallet="$wallet"/>
    </section>
    <section class="px-2 sm:px-0">
        <h1 class="font-bold p-3 text-2xl mt-16 mb-10">{{__("Transactions")}}</h1>
        @if($transactions->count() > 0)
            <div class="overflow-x-auto -mx-4 sm:mx-0">
                <table class="w-full min-w-[600px] h-fit p-4 sm:p-10">
                    <thead>
                        <tr>
                            <th class="bg-violet-300 p-2 text-xs sm:text-sm">{{ __('TYPE') }}</th>
                            <th class="bg-violet-300 p-2 text-xs sm:text-sm">{{ __('AMOUNT') }}</th>
                            <th class="bg-violet-300 p-2 text-xs sm:text-sm">{{ __('CURRENCY') }}</th>
                            <th class="bg-violet-300 p-2 text-xs sm:text-sm">{{ __('STATUS') }}</th>
                            <th class="bg-violet-300 p-2 text-xs sm:text-sm">{{ __('DESCRIPTION') }}</th>
                            <th class="bg-violet-300 p-2 text-xs sm:text-sm">{{ __('DATE') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td class="text-center p-2 bg-violet-100 text-xs sm:text-sm">{{$transaction->type}}</td>
                                <td class="text-center p-2 bg-violet-100 text-xs sm:text-sm">{{$transaction->amount}}</td>
                                <td class="text-center p-2 bg-violet-100 text-xs sm:text-sm">{{$transaction->currency}}</td>
                                <td class="text-center p-2 bg-violet-100 text-xs sm:text-sm">{{$transaction->status}}</td>
                                <td class="text-center p-2 bg-violet-100 text-xs sm:text-sm break-all">{{$transaction->description}}</td>
                                <td class="text-center p-2 bg-violet-100 text-xs sm:text-sm whitespace-nowrap">{{$transaction->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class=" w-full h-[50vh] flex justify-center items-center col-start-1 col-end-3">{{__("You do not have any transactions.")}}</p>
        @endif
    </section>
@endsection
