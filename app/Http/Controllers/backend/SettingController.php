<?php

namespace App\Http\Controllers\backend;

use App\Models\Setting;
use App\Models\Optimize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use Illuminate\Support\Facades\Artisan;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    //get infos of setting
    public function index()
    {
        $data_setting = Setting::first();

        //get status mode maintenance
        $data_maintenance = Maintenance::latest()->select('type')->first();
        // dd($data_maintenance);
        return view('backend.pages.setting.index', compact('data_setting', 'data_maintenance'));
    }


    public function store(Request $request)
    {
        //request validation................
        // dd($request->all());

        //verify if data exist
        $data_exist = Setting::with('media')->get();


        if (count($data_exist) > 0) {
            // dd($request->all());

            $data_exist_ = Setting::with('media')->first();
            $media = $data_exist_->media;
            // dd(count($data_exist_->media));


            //insert data
            //update data if record exist
            $data_setting = tap(Setting::find($data_exist_['id']))->update([
                'facebook_link' => $request['facebook_link'],
                'instagram_link' => $request['instagram_link'],
                'twitter_link' => $request['twitter_link'],
                'linkedin_link' => $request['linkedin_link'],
                'tiktok_link' => $request['tiktok_link'],

                //infos application
                'phone' => $request['phone'],
                'email' => $request['email'],
                'localisation' => $request['localisation'],
                'google_maps' => $request['google_maps'],
                'siege_social' => $request['siege_social'],

                //security
                // 'mode_maintenance'=>'',
            ]);

            //insert image logo
            if ($request->has('logo_header') && count($media) > 0) {
                $data_setting->clearMediaCollection('logo_header');
                $data_setting->addMediaFromRequest('logo_header')->toMediaCollection('logo_header');
            } elseif ($request->has('logo_header')) {
                $data_setting->addMediaFromRequest('logo_header')->toMediaCollection('logo_header');
            }


            if ($request->has('logo_footer') && count($media) > 0) {
                $data_setting->clearMediaCollection('logo_footer');
                $data_setting->addMediaFromRequest('logo_footer')->toMediaCollection('logo_footer');
            } elseif ($request->has('logo_footer')) {
                $data_setting->addMediaFromRequest('logo_footer')->toMediaCollection('logo_footer');
            }
        } else {
            $data_setting = Setting::create([
                'facebook_link' => $request['facebook_link'],
                'instagram_link' => $request['instagram_link'],
                'twitter_link' => $request['twitter_link'],
                'linkedin_link' => $request['linkedin_link'],
                'tiktok_link' => $request['tiktok_link'],

                //infos application
                'phone' => $request['phone'],
                'email' => $request['email'],
                'localisation' => $request['localisation'],
                'google_maps' => $request['google_maps'],
                'siege_social' => $request['siege_social'],

                //security
                // 'mode_maintenance'=>'',
            ]);

            //insert image logo
            if ($request->has('logo_header')) {
                $data_setting->addMediaFromRequest('logo_header')->toMediaCollection('logo_header');
            }


            if ($request->has('logo_footer')) {
                $data_setting->addMediaFromRequest('logo_footer')->toMediaCollection('logo_footer');
            }
        }





        Alert::success('Operation réussi', 'Success Message');

        return back();
    }
}
