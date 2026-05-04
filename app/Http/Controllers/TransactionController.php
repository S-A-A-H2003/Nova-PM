<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class TransactionController extends Controller
{
    protected $amount;

    public function selectAmount(){
        return view('transaction.selectAmount');
    }

    public function deposit(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'mode' => 'payment',

            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Wallet Deposit',
                    ],
                    'unit_amount' => $request->input('amount') * 100,
                ],
                'quantity' => 1,
            ]],

            'success_url' => route('transaction.succeeded'),
            'cancel_url' => route('transaction.failure'),

            'metadata' => [
                'user_id' => Auth::id(),
                'amount' => $request->input('amount'),
            ],
        ]);

        return redirect($session->url);
    }

    public function withdraw(){

   }

    public function completed(Request $request)
    {
        return redirect()->route('wallet.index')->with('success', 'Transaction completed successfully.');
    }

    public function canceled()
    {
        return redirect()->route('wallet.index')->with('error', 'Transaction was canceled.');
    }

    public function handle(){

   }
}
