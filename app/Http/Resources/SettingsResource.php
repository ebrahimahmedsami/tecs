<?php

namespace App\Http\Resources;

use App\Models\Clinic;
use App\Models\SettingService;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingsResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'header' => $this->header,
            'about' => $this->about,
            'facebook_link' => $this->facebook_link,
            'twitter_link' => $this->twitter_link,
            'instagram_link' => $this->instagram_link,
            'about_text' => $this->about_text,
            'image' => $this->image ? asset('storage/settings/uploads/'.$this->image) : asset('dashboardAssets/app-assets/images/logo/main-logo-black.jpeg'),
            'logo' => $this->logo ? asset('storage/settings/logo/'.$this->image) : asset('dashboardAssets/app-assets/images/logo/main-logo-black.jpeg'),
            'services' => ServicesResource::collection(SettingService::all()),
            'clinics' => ClinicssResource::collection(Clinic::where('announce',Clinic::ANNOUNCE_YES)->get()),
        ];
    }
}
