<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreOrderSection;

class PreOrderSectionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAmin']);
    }

    public function edit(){
        $data  = PreOrderSection::first();
        return view('backend.preorder_section.edit', compact('data'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'pre_order_title' => 'required',
            'pre_order_description' => 'required',
            'button_text' => 'required',
            'button_url' => 'required',
        ]);

        $pre_order = PreOrderSection::find($id);

        if($request->hasFile('pre_order_bg')){
            $pre_order_bg= $request->pre_order_bg;
            $file_name = 'preorder'.'.'.$pre_order_bg->extension('pre_order_bg');
            $upload_path = 'uploads/pre_order_section/';
            $img_url = $upload_path.$file_name;
            $pre_order_bg->move($upload_path,$file_name);
            $pre_order->pre_order_bg = $img_url;
        }

        if($request->hasFile('pre_order_card_image')){
            $card_image= $request->pre_order_card_image;
            $file_name = 'card'.'.'.$card_image->extension('pre_order_card_image');
            $upload_path = 'uploads/banner_know_section/';
            $img_url = $upload_path.$file_name;
            $card_image->move($upload_path,$file_name);
            $pre_order->pre_order_card_image = $img_url;
        }

        if($request->hasFile('button_image')){
            $button_image= $request->button_image;
            $file_name = 'button'.'.'.$button_image->extension('button_image');
            $upload_path = 'uploads/banner_know_section/';
            $img_url = $upload_path.$file_name;
            $button_image->move($upload_path,$file_name);
            $pre_order->button_image = $img_url;
        }


        $pre_order->pre_order_title = $request->pre_order_title;
        $pre_order->pre_order_description = $request->pre_order_description;
        $pre_order->button_text = $request->button_text;
        $pre_order->button_url = $request->button_url;
        $pre_order->save();

        return redirect()->back()->with('success', 'Banner Know Section Updated successfully..');
    }
}
