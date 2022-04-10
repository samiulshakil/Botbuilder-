<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mancategory;
use App\Models\ManSubCategory;
use App\Models\AddToFavourite;
use Illuminate\Support\Facades\Auth;
use App\Models\Womencategory;
use App\Models\WomenSubCategory;
use App\Models\AddToFavouriteWomen;
use App\Models\BannerKnowSection;
use App\Models\BotBuilderSection;
use App\Models\PreOrderSection;
use App\Models\NewsSection;

class FrontendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'home'] );
    }

    public function home(){
        $banner_know = BannerKnowSection::first();
        $pre_order = PreOrderSection::first();
        $news = NewsSection::first();

        return view('frontend.home.home', compact('banner_know', 'pre_order', 'news'));
    }

    public function botBuilder(){
        $categories = Mancategory::all();
        $sub_categories = ManSubCategory::all();
        $fav = AddToFavourite::all();

        $women_categories = Womencategory::all();
        $women_sub_categories = WomenSubCategory::all();
        $fav_women = AddToFavouriteWomen::all();

        $botbuilder_content = BotBuilderSection::first();

        return view('frontend.bot-builder.botbuilder', compact('categories', 'sub_categories', 'fav', 'women_categories', 'women_sub_categories', 'fav_women', 'botbuilder_content'));
    }

    public function favourite(Request $request){
        $request->validate([
            'sub_category_id' => 'required',
        ]);

        $sub_category_id = $request->sub_category_id;
        $user_id = Auth::id(); 
        $category_id = $request->category_id; 
        $existing = AddToFavourite::where('category_id',$category_id)->where('user_id', $user_id)->first();

        if(!$existing){
            AddToFavourite::create([
                'user_id' => $user_id,
                'category_id' => $category_id,
                'sub_category_id' => $sub_category_id,
            ]); 
 
        }else{

            $existing->sub_category_id = $sub_category_id;
            $existing->save(); 
        } 
        
        $categories = Mancategory::all();
        $sub_categories = ManSubCategory::all();
        $fav = AddToFavourite::all();


        $view = view('frontend.partial.boy_body', compact('categories', 'sub_categories', 'fav'));
        $single_data = $view->render();
        return response()->json(['success' => 'Successfully Add', 'single_render' => $single_data]);



    }

    public function favouriteWomen(Request $request){
        $request->validate([
            'women_sub_category_id' => 'required',
        ]);

        $women_sub_category_id = $request->women_sub_category_id;
        $women_category_id = $request->women_category_id; 
        $user_id = Auth::id(); 
        $existings = AddToFavouriteWomen::where('women_category_id',$women_category_id)->where('user_id', $user_id)->first();

        if(!$existings){
            AddToFavouriteWomen::create([
                'user_id' => $user_id,
                'women_category_id' => $women_category_id,
                'women_sub_category_id' => $women_sub_category_id,
            ]); 
 
        }else{

            $existings->women_sub_category_id = $women_sub_category_id;
            $existings->save(); 
        } 
        
        $women_categories = Womencategory::all();
        $women_sub_categories = WomenSubCategory::all();
        $fav_women = AddToFavouriteWomen::all();


        $view = view('frontend.partial.girl_body', compact('women_categories', 'women_sub_categories', 'fav_women'));
        $women_data = $view->render();
        return response()->json(['success' => 'Successfully Add', 'women_data' => $women_data]);



    }

    public function hiddenImage(Request $request){
        $id = $request->sub_category_id;
        $sub_cat = ManSubCategory::find($id);
        return response()->json(['sub_cat' => $sub_cat]);
    }
}


