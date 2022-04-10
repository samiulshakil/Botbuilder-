<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuickLink;

class QuickLinkController extends Controller
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
        $quicklinks = QuickLink::all();
        return view('backend.quick_link.index', compact('quicklinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quick_link.create');
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
            'name' => 'required|unique:quick_links,name',
            'status' => 'required',
        ]);

        QuickLink::create([
            'name' => $request->name,
            'url' => $request->url,
            'status' => $request->status,
        ]); 

        return redirect()->route('quicklink.index')->with('success', 'Quick Link Created successfully..');
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
    public function edit($id)
    {
        $quicklink = QuickLink::find($id);
        return view('backend.quick_link.edit', compact('quicklink'));
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
        $quicklink = QuickLink::find($id);

        $request->validate([
            'name' => 'required|unique:quick_links,name,'.$id,
            'status' => 'required',
        ]);

        $quicklink->name = $request->name;
        $quicklink->url = $request->url;
        $quicklink->status = $request->status;
        $quicklink->save();

        return redirect()->route('quicklink.index')->with('success', 'Quick Link Updated successfully..');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quicklink = QuickLink::find($id);
        $quicklink->delete();
        
        return redirect()->route('quicklink.index')->with('delete', 'Social Media Deleted Successfully');

    }
}
