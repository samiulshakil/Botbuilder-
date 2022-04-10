<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Womencategory;
use App\Models\WomenSubCategory;

class WomenSubCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'isAmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = WomenSubCategory::paginate(5);
        return view('backend.womensubcategory.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $womencategories = Womencategory::all();
        return view('backend.womensubcategory.create', compact('womencategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'womencategory_id' => 'required',
            'hidden_image' => 'required',
            'image' => 'required',
        ]);

        $data = WomenSubCategory::create([
            'womencategory_id' => $request->womencategory_id,
            'image' => $request->image,
            'hidden_image' => $request->hidden_image,
        ]); 


        $image = $request->file('image');           
        $fileName = $data->id .'.' .$image->extension('image');
        $upload_path = 'uploads/Womensubcategory/image/';
        $img_url = $upload_path.$fileName;
        $image->move($upload_path, $fileName);
        $data->image = $img_url; 


        $hidden_image = $request->file('hidden_image');
        $fileNames = $data->id .'.' .$hidden_image->extension('hidden_image');
        $upload_paths = 'uploads/Womensubcategory/hidden/';
        $img_urls = $upload_paths.$fileNames;  
        $hidden_image->move($upload_paths, $fileNames);
        $data->hidden_image = $img_urls;

        $data->save();


        return redirect()->route('womensubcategories.index')->with('success', 'Women Sub Category added successfully..');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Womencategory::all();
        $subCategory = WomenSubCategory::find($id);
        return view('backend.womensubcategory.edit', compact(['subCategory', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'womencategory_id' => 'required',
        ]);

        $subcategory = WomenSubCategory::find($id);

        if($request->image){
            $image = $request->image;
            $fileName = $subcategory->id .'.' .$image->extension('image');
            $upload_path = 'uploads/womensubcategory/image/';
            $img_url = $upload_path.$fileName;
            $image->move($upload_path, $fileName);
            $subcategory->image = $img_url;
        }

        if($request->file('hidden_image')){
            $image = $request->hidden_image;
            $fileName = $subcategory->id .'.' .$image->extension('hidden_image');
            $upload_path = 'uploads/womensubcategory/hidden/';
            $img_url = $upload_path.$fileName;
            $image->move($upload_path, $fileName);
            $subcategory->hidden_image = $img_url;
        }

        $subcategory->womencategory_id = $request->womencategory_id;
        $subcategory->save();

        return redirect()->route('womensubcategories.index')->with('success', 'Women Sub Category Updated successfully..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCategory = WomenSubCategory::find($id);
        $subCategory->delete();

        return redirect()->route('womensubcategories.index')->with('delete', 'Sub Category deleted successfully..');
    }

}
