<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Str;

class MenuController extends Controller
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
        $menus = Menu::all();
        return view('backend.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.menu.create');
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
            'name' => 'required|unique:menus,name',
            'status' => 'required',
        ]);

        Menu::create([
            'name' => $request->name,
            'url' => $request->url,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]); 

        return redirect()->route('menu.index')->with('success', 'Menu Created successfully..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $menu = Menu::where('slug', $slug)->first();
        return view('backend.menu.edit', compact('menu'));
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
            'name' => 'required|unique:menus,name,'.$id,
            'status' => 'required',
        ]);

        $menu = Menu::find($id);

            $menu->name = $request->name;
            $menu->url = $request->url;
            $menu->slug = Str::slug($request->name);
            $menu->status = $request->status;
            $menu->save();

            return redirect()->route('menu.index')->with('success', 'Menu Updated successfully..');
            
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return redirect()->route('menu.index')->with('delete', 'Menu deleted successfully..');
    }
}
