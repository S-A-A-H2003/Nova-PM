@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4 text-center">{{ __('Deposit Funds') }}</h1>

    {{-- Fees explanation --}}
    <div class="bg-yellow-100 border-l-4 border-yellow-400 p-4 mb-6">
        <p class="text-yellow-800 text-sm">
            {{ __('Note: Stripe charges a processing fee of 2.9% + $0.30 per transaction.') }}<br>
            {{ __('The net balance will be displayed before you are redirected to the payment page.') }}
        </p>
    </div>

    {{--Form Structure--}}
    <x-form-structure
        action="{{route('transaction.deposit')}}"
        buttonClass="bg-violet-600 hover:bg-violet-700 text-white w-full py-3 rounded-md font-semibold flex items-center justify-center"
        buttonClassChiled="fill-white"
        >
        <x-form-fieldset
            name="amount"
            placeholder="{{ __('Enter amount') }}"
            type="number"
            required
        />

        {{-- Display net amount dynamically --}}
        <div class="mb-4 text-gray-700">
            <p>{{ __('Net balance after fees:') }} <span id="net-amount">0</span> $</p>
        </div>
    </x-form-structure>
</div>

{{-- Calculate net balance dynamically --}}
<script>
    const amountInput = document.querySelector('input[name="amount"]');
    const netAmountEl = document.getElementById('net-amount');

    amountInput.addEventListener('input', () => {
        const amount = parseFloat(amountInput.value) || 0;
        const fee = amount * 0.029 + 0.30; // 2.9% + 0.30$
        const net = amount - fee;
        netAmountEl.textContent = net.toFixed(2);
    });
</script>
@endsection

