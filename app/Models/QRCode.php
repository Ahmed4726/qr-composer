<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    protected $table = 'qr_code';


    protected $fillable = [
        'campaign_id',
        'qr_code_name',
        'campaign_id',
        'qr_code_url',
        'foreground',
        'background',
        'logo'
    ];

}
