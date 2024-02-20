<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Stripe\Customer;
use Stripe\Subscription;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Auth;
class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        $price = $request->price;
        return view('stripe_test',compact('price'));
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request): JsonResponse
    {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        $price = $request->price;

        // Set Stripe API key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Step 1: Create a PaymentIntent using the payment method ID obtained from the client
        $paymentIntent = PaymentIntent::create([
            'amount' => 50 * 100,
            'currency' => 'usd',
            'payment_method' => $request->paymentMethodId,
            'confirmation_method' => 'manual',
            'confirm' => true,
            'return_url' => route('campaigns.index'),
        ]);
        // $paymentMethod = PaymentMethod::retrieve($request->payment_method);

        // dd($paymentMethod);
        // Step 2: Retrieve customer information from the attached payment method
        // $paymentMethod = $paymentIntent->payment_method;
        // $customer = $paymentMethod->customer;

        // Step 3: Create a Subscription
        // $subscription = Subscription::create([
        //     'customer' => $customer,
        //     'items' => [['price' => $price]],
        // ]);

        // Step 4: Handle Subscription and Update User Details
        $user->qr_code_limit += ($price == 9) ? 10 : (($price == 29) ? 50 : 9999);
        $user->campaign_limit += ($price == 9) ? 2 : (($price == 29) ? 10 : 9999);
        $user->subscription_tier = ($price == 9) ? 'tier1' : (($price == 29) ? 'tier2' : 'tier3');
        // $user->stripe_customer_id = $customer; // Save customer ID for future use
        $user->subscription_start_date = now();
        $user->subscription_end_date = now()->addMonth();
        $user->save();

        return response()->json(['success' => true, 'paymentIntentId' => $request->paymentMethodId]);
    }




}
