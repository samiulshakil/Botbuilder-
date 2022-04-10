<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAmin']);
    }

    public function edit(){
        $data = Footer::first();
        return view('backend.footer.edit', compact('data'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'footer_left_side_title' => 'required',
            'footer_left_side_subtitle' => 'required',
            'footer_left_side_btn_name' => 'required',
        ]);

        $footer = Footer::find($id);

        if($request->hasFile('footer_left_side_logo')){
            $logo= $request->footer_left_side_logo;
            $file_name = 'left-logo'.'.'.$logo->extension('footer_left_side_logo');
            $upload_path = 'uploads/footer/';
            $img_url = $upload_path.$file_name;
            $logo->move($upload_path,$file_name);
            $footer->footer_left_side_logo = $img_url;
        }

        if($request->hasFile('footer_left_side_btn_image')){
            $button_image= $request->footer_left_side_btn_image;
            $file_name = 'button'.'.'.$button_image->extension('footer_left_side_btn_image');
            $upload_path = 'uploads/footer/';
            $img_url = $upload_path.$file_name;
            $button_image->move($upload_path,$file_name);
            $footer->footer_left_side_btn_image = $img_url;
        }


        $footer->footer_left_side_title = $request->footer_left_side_title;
        $footer->footer_left_side_subtitle = $request->footer_left_side_subtitle;
        $footer->footer_left_side_btn_name = $request->footer_left_side_btn_name;
        $footer->save();

        return redirect()->back()->with('success', 'Footer Left Side Updated successfully..');
    }
}
