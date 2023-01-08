<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SettingService;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    use FileUpload;
    public function main_section(){
        $settings = Setting::first();
        $services  =SettingService::all();
        return view('dashboard.settings.edit',compact('settings','services'));
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

    public function footer_update(Request $request){
        $request->validate([
            'facebook_link' => 'url',
            'twitter_link' => 'url',
            'instagram_link' => 'url',
        ]);
        # Footer Data
        Setting::updateOrCreate(
            ['id' =>  $request->get('id')],
            [
                'facebook_link' => $request->facebook_link,
                'twitter_link' => $request->twitter_link,
                'instagram_link' => $request->instagram_link,
            ]
        );
        return redirect()->back()->with(['success' => __('dashboard.settings_edited_successfully')]);

    }

    public function about_update(Request $request){
        $request->validate([
            'about_text_ar' => 'required|string',
            'about_text_en' => 'required|string',
        ]);
        # About Data
        Setting::updateOrCreate(
            ['id' =>  $request->get('id')],
            [
                'about_text_ar' => $request->about_text_ar,
                'about_text_en' => $request->about_text_en,
            ]
        );
        return redirect()->back()->with(['success' => __('dashboard.settings_edited_successfully')]);
    }

    public function services_update(Request $request){
        $request->validate([
            'services_title' => 'array',
            'services_title.*' => 'required',
            'services_icon' => 'array',
            'services_icon.*' => 'required',
            'services_text' => 'array',
            'services_text.*' => 'required',
        ]);
        DB::table('setting_services')->truncate();
        foreach ($request->get('services_title') as $key=>$value){
            SettingService::create([
               'title' => $request->get('services_title')[$key],
               'icon' => $request->get('services_icon')[$key],
               'text' => $request->get('services_text')[$key],
            ]);
        }
        return redirect()->back()->with(['success' => __('dashboard.settings_edited_successfully')]);
    }
}
