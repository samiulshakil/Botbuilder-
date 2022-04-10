<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mancategory;

class ManController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAmin']);
    }
    
    public function index() {
        $datas = Mancategory::all();
        return view('backend.mancategory.index', compact('datas'));
    }

    public function create() {
        return view('backend.mancategory.create');
    }

    public function store(Request $request) { 
       $request->validate([
            'name' => 'required|unique:mancategories,name',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:1024',
        ]);

        $data = Mancategory::create([
            'name' => $request->name,
            'image' => $request->image,
        ]);


            $image = $request->file('image');
            $fileName = $data->id .'.' .$image->extension('image');
            $upload_path = 'uploads/mancategory/';
            $img_url = $upload_path.$fileName;
            $image->move($upload_path, $fileName);

            $data->image = $img_url;
            $data->save();

            
          
            return redirect()->route('man.category.index')->with('success', 'Man Category added successfully..');
    }

    public function edit($id){
        $singleCat = Mancategory::find($id);
        return view('backend.mancategory.edit', compact('singleCat'));
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|unique:mancategories,name,'.$request->mancat_id,
        ]);
        
        $mancategory = Mancategory::find($request->mancat_id);
        
        if($request->has('image')){            
            $image = $request->file('image');
            $fileName = $mancategory->id. '.' .$image->extension('image');
            $upload_path = 'uploads/mancategory/';
            $img_url = $upload_path.$fileName;
            $image->move($upload_path, $fileName);
            $mancategory->image = $img_url;
            
        }
            $mancategory->name = $request->name;   
            $mancategory->save();

            return redirect()->route('man.category.index')->with('success', 'Man Category Updated successfully..');


    }

    public function delete(Request $request){
        $id = $request->mancat_id;
        $mancategory = Mancategory::find($id);
        $mancategory->delete();

        return redirect()->route('man.category.index')->with('delete', 'Man Category deleted successfully..');
    }
}
