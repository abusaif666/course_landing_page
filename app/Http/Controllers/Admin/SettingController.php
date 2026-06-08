<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function general()
    {
        return view('admin.setting.general');
    }

    public function generalStore(Request $request)
    {
        $setting = GeneralSetting::first();

        GeneralSetting::updateOrCreate(
            ['id' => $setting->id ?? null],
            [
                'site_name' => $request->site_name,
                'site_title' => $request->site_title,
            ]
        );

        return redirect()->back()->with('success', 'General Setting Updated Successfully');
    }

    public function website()
    {
        return view('admin.setting.website');
    }

    public function websiteStore(Request $request)
    {
        $website = WebsiteSetting::first();

        // ================= LOGO =================

        if ($request->hasFile('logo')) {

            // old logo delete
            if ($website && $website->logo && \Storage::disk('public')->exists('setting/'.$website->logo)) {
                \Storage::disk('public')->delete('setting/'.$website->logo);
            }

            $logo = $request->file('logo');

            $logoName = time().'_logo.'.$logo->getClientOriginalExtension();

            $logo->storeAs('setting', $logoName, 'public');

        } else {

            $logoName = $website->logo ?? null;
        }

        // ================= FAVICON =================

        if ($request->hasFile('favicon')) {

            // old favicon delete
            if ($website && $website->favicon && \Storage::disk('public')->exists('setting/'.$website->favicon)) {
                \Storage::disk('public')->delete('setting/'.$website->favicon);
            }

            $favicon = $request->file('favicon');

            $faviconName = time().'_favicon.'.$favicon->getClientOriginalExtension();

            $favicon->storeAs('setting', $faviconName, 'public');

        } else {

            $faviconName = $website->favicon ?? null;
        }

        // ================= CREATE OR UPDATE =================

        WebsiteSetting::updateOrCreate(
            ['id' => $website->id ?? null],
            [
                'logo' => $logoName,
                'favicon' => $faviconName,
            ]
        );

        return redirect()->back()->with('success', 'Website Setting Updated Successfully');
    }

}
