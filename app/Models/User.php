<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Notification;
use App\Models\QrCode;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function qrCodes()
    {
        return $this->hasMany(QrCode::class);
    }

    public function readNotifications()
    {
        return $this->belongsToMany(Notification::class, 'user_notification');
    }

    public function notReadNotifications()
    {
        $readNotifications = $this->readNotifications()->pluck('id')->toArray();

        return Notification::whereNotIn('id', $readNotifications)
            ->where('status', 0)
            ->get();
    }

    public function exceedsCampaignLimit()
    {
        return $this->subscription_tier !== 'tier3' && $this->campaigns()->count() >= $this->campaign_limit;
    }

    public function exceedsQrCodeLimit()
    {
        return $this->subscription_tier !== 'tier3' && $this->qrCodes()->count() >= $this->qr_code_limit;
    }
}
