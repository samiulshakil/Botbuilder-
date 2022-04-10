<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mancategory;
use App\Models\ManSubCategory;

class ManSubCategoryController extends Controller
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
        $datas = ManSubCategory::paginate(5);
        return view('backend.mansubcategory.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mancategories = Mancategory::all();
        return view('backend.mansubcategory.create', compact('mancategories'));
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
            'mancategory_id' => 'required',
            'image' => 'required',
            'hidden_image' => 'required',
        ]);

        
        $data = ManSubCategory::create([
            'mancategory_id' => $request->mancategory_id,
            'image' => $request->image,
            'hidden_image' => $request->hidden_image,
        ]);
            
            $image = $request->file('image');
            $fileName = $data->id .'.' .$image->extension('image');
            $upload_path = 'uploads/mansubcategory/image/';
            $img_url = $upload_path.$fileName;
            $image->move($upload_path, $fileName);
            $data->image = $img_url;



            $hidden_image = $request->file('hidden_image');
            $fileNames = $data->id .'.' .$hidden_image->extension('hidden_image');
            $upload_paths = 'uploads/mansubcategory/hidden/';
            $img_urls = $upload_paths.$fileNames;
            $hidden_image->move($upload_paths, $fileNames);
            $data->hidden_image = $img_urls;

            $data->save();

        

        return redirect()->route('mansubcategories.index')->with('success', 'Man Sub Category added successfully..');

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
        $categories = Mancategory::all();
        $subCategory = ManSubCategory::find($id);
        return view('backend.mansubcategory.edit', compact(['subCategory', 'categories']));
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
            'mancategory_id' => 'required',
        ]);

        $subcategory = ManSubCategory::find($id);

        if($request->image){
            $image = $request->image;
            $fileName =  $subcategory->id .'.' .$image->extension('image');
            $upload_path = 'uploads/mansubcategory/image/';
            $img_url = $upload_path.$fileName;
            $image->move($upload_path, $fileName);
            $subcategory->image = $img_url;
        }

        if($request->hidden_image){
            $image = $request->hidden_image;
            $fileName =  $subcategory->id .'.' .$image->extension('hidden_image');
            $upload_path = 'uploads/mansubcategory/hidden/';
            $img_url = $upload_path.$fileName;
            $image->move($upload_path, $fileName);
            $subcategory->hidden_image = $img_url;
        }

        $subcategory->mancategory_id = $request->mancategory_id;
        $subcategory->save();

        return redirect()->route('mansubcategories.index')->with('success', 'Man Sub Category Updated successfully..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCategory = ManSubCategory::find($id);
        $subCategory->delete();

        return redirect()->route('mansubcategories.index')->with('delete', 'Sub Category deleted successfully..');
    }
}
