<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\QRCode;
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
        $qrCode = QRCode::create([
            'campaign_id' => $campaign->id,
            'qr_code_name' => $request->campaign_name,
            'qr_code_url' => $request->url,
            'foreground' => $request->foreground,
            'background' => $request->background,
            'logo' => $logoPath
        ]);
        return redirect()
            ->route('campaigns.show', $campaign->id)
            ->with('message', 'Campaign created Successfully');
    }

    public function qrCode($id)
    {
        $campaign_id = $id;
        $campaigns = QRCode::where('campaign_id', $id)->get();
        return view('/pages/qrCode/index', compact('campaigns','campaign_id'));
    }

    public function showQrCode($id)
    {


        $campaign_id = $id;
        $campaigns = QRCode::where('id', $id)->get();
        return view('/pages/qrCode/view', compact('campaigns','campaign_id'));
    }

    public function qrStore(Request $request)
    {
        if (auth()->user()->exceedsQrCodeLimit()) {
            return redirect()->back()->with('message', 'You have exceeded the QR code limit.');
        }

        $logoPath = null;
        if ($request->hasFile('logo'))
        {
            $filename = $request->file('logo')->getClientOriginalName();
            $logoPath = $request->file('logo')->move(public_path('/images'), $filename);
            $logoPath = "images/{$filename}";
        }

        $qrCode = QRCode::create([
            'campaign_id' => $request->campaign_id,
            'qr_code_name' => $request->campaign_name,
            'qr_code_url' => $request->url,
            'foreground' => $request->foreground,
            'background' => $request->background,
            'logo' => $logoPath
        ]);
        return redirect()
            ->route('qrCode.show', $qrCode->id)
            ->with('message', 'QRCode created Successfully');
    }
    public function show($id)
    {
        $campaigns = Campaign::where('id',$id)->get();

        $breadcrumbs = [
            ['link'=>"",'name'=>trans('locale.campaign.title')], ['name'=>trans('locale.campaign.view')]
        ];
        return view('/pages/campaigns/view', compact('campaigns'));
    }

    public function qrCreate($id, Request $request)
    {
        $campaign = $id;
        // dd($campaign);
        return view('/pages/qrCode/create', compact('campaign'));
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
    public function qrUpdate(Request $request, $id)
    {
        // dd($request);
        $qrcode = QRCode::find($id);
        $qrcode->update([
            'qr_code_name' => $request->qr_name,
            'qr_code_url' => $request->url,
            'foreground' => $request->foreground,
            'background' => $request->background,
        ]);

        return redirect()
        ->route('qrCode.show', $id)
        ->with('message', 'QRCode Updated Successfully');
    }


    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return redirect()
            ->route('campaigns.index')
            ->with('message', 'Compaign deleted Successfully');
    }

    public function qrDestroy($id)
    {
        // dd('ok');
        $qrcode = QRCode::where('id',$id)->delete();

        return redirect()
            ->route('campaigns.index')
            ->with('message', 'QRCode deleted Successfully');
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
