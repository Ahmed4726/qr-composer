<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class CampaignController extends Controller
{
    // Default pageConfig
    protected $pageConfigs = [
        'navbarType' => 'sticky',
        'footerType' => 'static'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("ok");
        $campaigns = Campaign::where('user_id', auth()->user()->id)->get();
        // dd($campaigns);
        $breadcrumbs = [
            ['link'=>"",'name'=>trans('locale.campaign.title')], ['name'=>trans('locale.campaign.list')]
        ];
        return view('/pages/campaigns/index', [
            'pageConfigs' => $this->pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'campaigns' => $campaigns
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link'=>"",'name'=>trans('locale.campaign.title')], ['name'=>trans('locale.campaign.create')]
        ];

        return view('/pages/campaigns/create', [
            'pageConfigs' => $this->pageConfigs,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->File('logo'));
        $validator = $request->validate([
            'campaign_name' => 'required|string|max:190',
            'url' => "required|url",
        ]);

        $logoPath = null;
      if ($request->hasFile('logo'))
      {
          $filename = $request->file('logo')->getClientOriginalName();
          $logoPath = $request->file('logo')->move(public_path('/images'), $filename);
          $logoPath = "images/{$filename}";
      }
        $campaign = $request->user()->campaigns()->create([
            'campaign_name' => $request->campaign_name,
            'url' => $request->url,
            'foreground' => $request->foreground,
            'background' => $request->background,
            'logo' => $logoPath
        ]);

        return redirect()
            ->route('campaigns.show', $campaign->id)
            ->with('message', 'Campaign created Successfully'));
    }


    public function show($id)
    {
        $campaigns = Campaign::where('id',$id)->get();
   
        $breadcrumbs = [
            ['link'=>"",'name'=>trans('locale.campaign.title')], ['name'=>trans('locale.campaign.view')]
        ];
        return view('/pages/campaigns/view', compact('campaigns'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return redirect()
            ->route('campaigns.index')
            ->with('message', 'Compaign deleted Successfully');
    }

    /**
     * Remove the specified resource from storage via ajax.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxDelete(Request $request)
    {
        $campaign = Campaign::findOrfail($request->campaign_id);
        $campaign->delete();

        return new JsonResponse(null, 204);
    }
}
