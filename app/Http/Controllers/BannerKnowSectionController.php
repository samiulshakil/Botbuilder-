<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BannerKnowSection;

class BannerKnowSectionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAmin']);
    }

    public function edit(){
        $data  = BannerKnowSection::first();
        return view('backend.bannerknow_section.edit', compact('data'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'know_title' => 'required',
            'know_subtitle' => 'required',
            'know_description' => 'required',
        ]);

        $BannerKnow = BannerKnowSection::find($id);

        if($request->hasFile('banner_bg_image')){
            $banner_img= $request->banner_bg_image;
            $file_name = 'banner'.'.'.$banner_img->extension('banner_bg_image');
            $upload_path = 'uploads/banner_know_section/';
            $img_url = $upload_path.$file_name;
            $banner_img->move($upload_path,$file_name);
            $BannerKnow->banner_bg_image = $img_url;
        }

        if($request->hasFile('know_image')){
            $know_img= $request->know_image;
            $file_name = 'know'.'.'.$know_img->extension('know_image');
            $upload_path = 'uploads/banner_know_section/';
            $img_url = $upload_path.$file_name;
            $know_img->move($upload_path,$file_name);
            $BannerKnow->know_image = $img_url;
        }


        $BannerKnow->know_title = $request->know_title;
        $BannerKnow->know_subtitle = $request->know_subtitle;
        $BannerKnow->know_description = $request->know_description;
        $BannerKnow->save();

        return redirect()->back()->with('success', 'Banner Know Section Updated successfully..');
    }
}
