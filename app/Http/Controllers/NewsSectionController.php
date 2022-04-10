<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsSection;

class NewsSectionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAmin']);
    }

    public function edit(){
        $data  = NewsSection::first();
        return view('backend.news_section.edit', compact('data'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'left_title' => 'required',
            'left_sub_title' => 'required',
            'left_button_name' => 'required',
            'right_side_title' => 'required',
            'right_side_sub_title' => 'required',
        ]);

        $news = NewsSection::find($id);

        if($request->hasFile('left_button_image')){
            $button_bg= $request->left_button_image;
            $file_name = 'button'.'.'.$button_bg->extension('left_button_image');
            $upload_path = 'uploads/news_section/';
            $img_url = $upload_path.$file_name;
            $button_bg->move($upload_path,$file_name);
            $news->left_button_image = $img_url;
        }

        if($request->hasFile('right_side_image')){
            $right_img= $request->right_side_image;
            $file_name = 'right_image'.'.'.$right_img->extension('right_side_image');
            $upload_path = 'uploads/news_section/';
            $img_url = $upload_path.$file_name;
            $right_img->move($upload_path,$file_name);
            $news->right_side_image = $img_url;
        }

        $news->left_title = $request->left_title;
        $news->left_sub_title = $request->left_sub_title;
        $news->left_button_name = $request->left_button_name;
        $news->left_button_url = $request->left_button_url;
        $news->right_side_title = $request->right_side_title;
        $news->right_side_sub_title = $request->right_side_sub_title;
        $news->save();

        return redirect()->back()->with('success', 'News Section Updated successfully..');
    }
}
