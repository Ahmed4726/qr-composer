<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe;
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
        $user = User::where('id',$user_id)->first();
        $price = $request->price;

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // Step 1: Store Card Details
        $paymentMethod = \Stripe\PaymentMethod::create([
            'type' => 'card',
            'card' => [
                'token' => $request->paymentMethodId,
            ],
        ]);

        // Step 2: Create a Customer
        $customer = \Stripe\Customer::create([
            'payment_method' => $paymentMethod->id,
            'email' => $user->email,
        ]);

        // Step 3: Set Up a Subscription
        $subscription = \Stripe\Subscription::create([
            'customer' => $customer->id,
            'items' => [['price' => $price]],
        ]);

        // Step 4: Handle Subscription and Update User Details
        $user->qr_code_limit += ($price == 9) ? 10 : (($price == 29) ? 50 : 9999);
        $user->campaign_limit += ($price == 9) ? 2 : (($price == 29) ? 10 : 9999);
        $user->subscription_tier = ($price == 9) ? 'tier1' : (($price == 29) ? 'tier2' : 'tier3');
        $user->stripe_customer_id = $customer->id; // Save customer ID for future use
        $user->subscription_start_date = now();
        $user->subscription_end_date = now()->addMonth();
        $user->save();

        return response()->json(['success' => true, 'paymentIntentId' => $subscription->latest_invoice->payment_intent]);
    }




}
