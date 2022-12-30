<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    use FileUpload;
    public function main_section(){
        $settings = Setting::first();
        return view('dashboard.settings.edit',compact('settings'));
    }

    public function main_section_update(Request $request){
        $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg,svg,gif|max:2048',
            'logo' => 'nullable|mimes:png,jpg,jpeg,svg,gif|max:2048',
        ]);

        # Main Setting Data
        $settings = Setting::updateOrCreate(
            ['id' =>  $request->get('id')],
            [
                'header' => $request->get('header'),
                'about' => $request->get('about'),
            ]
        );

        # Main Banner
        if ($request->has('image')){
            if ($settings->image){
                $this->deleteFile('public/settings/uploads/'.$settings->image);
            }
            $fileName = $this->uploadFile($request->image,'settings/uploads');
            $settings->update(['image' => $fileName]);
        }

        # Logo And Favicon
        if ($request->has('logo')){
            if ($settings->logo){
                $this->deleteFile('public/settings/uploads/'.$settings->logo);
            }
            $fileName = $this->uploadFile($request->logo,'settings/uploads');
            $settings->update(['logo' => $fileName]);
        }
        return redirect()->back()->with(['success' => __('dashboard.settings_edited_successfully')]);
    }
}
