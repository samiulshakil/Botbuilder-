<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BotBuilderSection;

class BotBuilderSectionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAmin']);
    }

    public function edit(){
        $data  = BotBuilderSection::first();
        return view('backend.botbuilder_section.edit', compact('data'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'botbuilder_title' => 'required',
            'botbuilder_sub_title' => 'required',
            'botbuilder_lady_button' => 'required',
            'botbuilder_man_button' => 'required',
        ]);

        $botbuilder = BotBuilderSection::find($id);

        if($request->hasFile('botbuilder_button_bg')){
            $button_bg= $request->botbuilder_button_bg;
            $file_name = 'bot_button'.'.'.$button_bg->extension('botbuilder_button_bg');
            $upload_path = 'uploads/botbuilder_section/';
            $img_url = $upload_path.$file_name;
            $button_bg->move($upload_path,$file_name);
            $botbuilder->botbuilder_button_bg = $img_url;
        }

        if($request->hasFile('botbuilder_smoke_bg')){
            $smoke_bg= $request->botbuilder_smoke_bg;
            $file_name = 'smoke_bg'.'.'.$smoke_bg->extension('botbuilder_smoke_bg');
            $upload_path = 'uploads/botbuilder_section/';
            $img_url = $upload_path.$file_name;
            $smoke_bg->move($upload_path,$file_name);
            $botbuilder->botbuilder_smoke_bg = $img_url;
        }

        $botbuilder->botbuilder_title = $request->botbuilder_title;
        $botbuilder->botbuilder_sub_title = $request->botbuilder_sub_title;
        $botbuilder->botbuilder_lady_button = $request->botbuilder_lady_button;
        $botbuilder->botbuilder_man_button = $request->botbuilder_man_button;
        $botbuilder->save();

        return redirect()->back()->with('success', 'Bot Builder Section Updated successfully..');
    }
}
