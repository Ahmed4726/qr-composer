<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Campaign;
use App\Models\CampaignHit;
use App\Models\QRCode;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $name = auth()->user()->name;

            // Get the authenticated user
        $user = Auth::user();

        // Check if the user is an admin using a query
        $isAdmin = $user && User::where('id', $user->id)->where('is_admin', '1')->exists();


        // Counting Users
        $count_total_users = User::count();
        $count_active_users = User::where('status', '1')->count();
        $count_in_active_users = User::where('status', '0')->count();
        $count_subscription_tier_free = User::where('subscription_tier', 'free')->count();
        $count_subscription_tier_tier1 = User::where('subscription_tier', 'tier1')->count();
        $count_subscription_tier_tier2 = User::where('subscription_tier', 'tier2')->count();
        $count_subscription_tier_tier3 = User::where('subscription_tier', 'tier3')->count();

        // Counting Campaigns
        $total_campaigns = Campaign::count();


        // Counting ipstack Details:
        // $campaignHits = CampaignHit::get();

        $campaignHitsCountry = CampaignHit::select('country', 'country_flag', DB::raw('COUNT(*) as hit_count'))
                                            ->groupBy('country', 'country_flag')
                                            ->get();
        // $campaignNames = Campaign::pluck('campaign_name');

        // Counting QR Codes
        $total_qr_codes = QRCode::count();

        return view('dashboard', compact(
            'name',
            'isAdmin',
            'count_total_users',
            'count_active_users',
            'count_in_active_users',
            'count_subscription_tier_free',
            'count_subscription_tier_tier1',
            'count_subscription_tier_tier2',
            'count_subscription_tier_tier3',
            'total_campaigns',
            'total_qr_codes',
            'campaignHitsCountry'
        ));
    }

    public function getCoordinates(Request $request)
    {
        $type = $request->type;

        if ($type == 'today') {
            $data = CampaignHit::whereDate('created_at', '=', Carbon::today()->toDateString())
                ->whereHas('campaign', function($query) {
                    $query->where('user_id', Auth::user()->id);
                })
                ->get();
        } else if ($type == 'week') {
            $data = CampaignHit::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->whereHas('campaign', function($query) {
                    $query->where('user_id', Auth::user()->id);
                })
                ->get();
        } else if ($type == 'month') {
            $data = CampaignHit::whereMonth('created_at', '=', Carbon::now()->month)
                ->whereHas('campaign', function($query) {
                    $query->where('user_id', Auth::user()->id);
                })
                ->get();
        } else {
            $data = CampaignHit::whereHas('campaign', function($query) {
                    $query->where('user_id', Auth::user()->id);
                })
                ->get();
        }

        return new JsonResponse($data);
    }
}
