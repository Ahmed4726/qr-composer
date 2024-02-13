<?php
      
namespace App\Http\Controllers;
       
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;       
class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe_test');
    }
      
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request): RedirectResponse
    {
        // $user = auth()->user()->id;
        // $cart = Order::selectRaw('SUM(bill) as subtotal')->where('user_id', $user)->where('status', 'Unpaid')->get();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      
        Stripe\Charge::create ([
            
                "amount" => 50 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment Successful." 
        ]);
        // $order = Order::where('user_id', $user)->update(['status' => 'Paid']);
        // if (Auth::check()) {
        //     $user = Auth::user();
        //     $user->status = 'Paid';
        //     $user->save();
        // }
        return redirect()->back()
                ->with('success', 'Payment successful!');
    }
}