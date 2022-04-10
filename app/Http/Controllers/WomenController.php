<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Womencategory;

class WomenController extends Controller
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
        $datas = Womencategory::all();
        return view('backend.womencategory.index', compact('datas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.womencategory.create');
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
            'name' => 'required|unique:womencategories,name',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:1024',
        ]);

        $data = Womencategory::create([
            'name' => $request->name,
            'image' => $request->image,
        ]);


            $image = $request->file('image');
            $fileName = $data->id .'.' .$image->extension('image');
            $upload_path = 'uploads/womencategory/';
            $img_url = $upload_path.$fileName;
            $image->move($upload_path, $fileName);

            $data->image = $img_url;
            $data->save();

            
          
            return redirect()->route('womens.index')->with('success', 'Women Category added successfully..');
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
        $singleCat = Womencategory::find($id);
        return view('backend.womencategory.edit', compact('singleCat'));
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
            'name' => 'required|unique:womencategories,name,'.$id,
        ]);
        
        $womencategory = Womencategory::find($id);
        
        if($request->has('image')){            
            $image = $request->file('image');
            $fileName = $id. '.' .$image->extension('image');
            $upload_path = 'uploads/womencategory/';
            $img_url = $upload_path.$fileName;
            $image->move($upload_path, $fileName);
            $womencategory->image = $img_url;
            
        }
            $womencategory->name = $request->name;   
            $womencategory->save();

            return redirect()->route('womens.index')->with('success', 'Women Category Updated successfully..');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $womencategory = Womencategory::find($id);
        $womencategory->delete();

        return redirect()->route('womens.index')->with('delete', 'Women Category deleted successfully..');
    }
}
