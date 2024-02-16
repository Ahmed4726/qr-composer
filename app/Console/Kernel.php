<?php

namespace App\Console;

use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // Fetch users with active subscriptions that are due for monthly charge
            $users = User::whereDate('subscription_end_date', '<=', now())->get();

            foreach ($users as $user) {
                // Integrate with Stripe to charge the user here
                try {
                    // Assume you have a Stripe customer ID saved in the user model
                    $stripeCustomer = \Stripe\Customer::retrieve($user->stripe_customer_id);

                    // Charge the user for the subscription
                    $invoice = \Stripe\Invoice::create([
                        'customer' => $stripeCustomer->id,
                        'billing' => 'send_invoice', // or 'charge_automatically' based on your preference
                        'days_until_due' => 30, // 30 days until due for the next charge
                    ]);

                    // Update the subscription_end_date to next month
                    $user->subscription_end_date = now()->addMonth();

                    // Save the changes
                    $user->save();

                    // Log or notify the user about the successful charge
                    $this->info('User ' . $user->id . ' charged successfully.');
                } catch (\Exception $e) {
                    // Handle any exceptions (e.g., log, notify, etc.)
                    $this->error('Failed to charge user ' . $user->id . ': ' . $e->getMessage());
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
