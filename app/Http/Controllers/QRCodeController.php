<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\CampaignHit;
use App\Models\QRCode;
use Endroid\QrCode\Color\Color;
use Illuminate\Support\Facades\Http;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Redirect;

class QRCodeController extends Controller
{
    // IP track access key
    protected $accessKey = '1a16715ccd10b1c6e5e4d5636890f51d';

    /**
     * This generates QR code image from campaign id.
     *
     * @param \App\Models\Campaign  $campaign
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function generateQRCode(QRCode $campaign, Request $request)
     {
         // Generate the URL for the QR code
         $url = route('qrcode-track', $campaign);
        //  dd($url);
         $url1 = $campaign->qr_code_url;
                 // Convert RGB to Color
        $foregroundColor = new Color(
            $this->convertRGB($campaign->foreground)['r'],
            $this->convertRGB($campaign->foreground)['g'],
            $this->convertRGB($campaign->foreground)['b']
        );

        $backgroundColor = new Color(
            $this->convertRGB($campaign->background)['r'],
            $this->convertRGB($campaign->background)['g'],
            $this->convertRGB($campaign->background)['b']
        );
         // Use the Builder to create a QrCode instance
         $qrCode = Builder::create()
             ->writer(new PngWriter())
             ->data($url)
             ->encoding(new Encoding('UTF-8'))
             ->errorCorrectionLevel(ErrorCorrectionLevel::High)
             ->size(400)
             ->margin(10)
             ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
             ->foregroundColor($foregroundColor)
             ->backgroundColor($backgroundColor);

         // Set logo if available
         if ($campaign->logo != null) {
             $logoPath = public_path($campaign->logo);
             $qrCode->logoPath($logoPath)
                 ->logoResizeToWidth(150)
                 ->logoPunchoutBackground(true);
         }

        // Build the QrCode
        $qrCode = $qrCode->build();
        //  echo $qrCode->output();
        header('Content-Type: '.$qrCode->getMimeType());
        $image = $qrCode->getString();
        return $image;
        // dd($dataUri);
         // Return the QR code as a response
        //  return $qrCode->getString();
        //  return response($qrCode->writeString())->header('Content-Type', $qrCode->getContentType());
     }

    /**
     * User info track and return QR code url
     *
     * @param \App\Models\Campaign  $campaign
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function qrCodeTrack(QRCode $qrcode, Request $request)
    {
        $ip = $request->ip(); // Use Laravel's request method for more reliable IP retrieval
        $ipTrackURL = 'http://api.ipstack.com/' . $ip . '?access_key=' . $this->accessKey;
        dd($trackResponse);
        // try {
            $trackResponse = json_decode(Http::get($ipTrackURL));

            if (isset($trackResponse->latitude) && isset($trackResponse->longitude)) {
                CampaignHit::create([
                    'campaign_id' => $qrcode->campaign_id,
                    'latitude' => $trackResponse->latitude,
                    'longitude' => $trackResponse->longitude,
                    'location' => $trackResponse->continent_name . '/' . $trackResponse->city . '/' . $trackResponse->zip,
                    'browser' => $request->server('HTTP_USER_AGENT')
                ]);
            }
        // } catch (\Exception $e) {
        //     // Handle API request errors (e.g., log the error)
        // }

        // Redirect the user to the URL stored in $qrcode->qr_code_url after tracking
        return Redirect::to($qrcode->qr_code_url);
    }

    /**
     * convert hex color value to rgb color
     *
     * @param String  $hexValue
     * @return Array  $arrayRGB
     */
    private function convertRGB($color)
    {
        list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
        return ['r' => $r, 'g' => $g, 'b' => $b];
    }
}
