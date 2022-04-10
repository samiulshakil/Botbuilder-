<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
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
        $socials = SocialMedia::all();
        return view('backend.social_media.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.social_media.create');
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
            'name' => 'required|unique:social_media,name',
            'icon_class' => 'required',
            'status' => 'required',
        ]);

        SocialMedia::create([
            'name' => $request->name,
            'icon_class' => $request->icon_class,
            'url' => $request->url,
            'status' => $request->status,
        ]); 

        return redirect()->route('socialmedia.index')->with('success', 'Social Media Created successfully..');
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
        $social = SocialMedia::find($id);
        return view('backend.social_media.edit', compact('social'));
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
        $social = SocialMedia::find($id);

        $request->validate([
            'name' => 'required|unique:social_media,name,'.$id,
            'icon_class' => 'required',
            'status' => 'required',
        ]);

        $social->name = $request->name;
        $social->icon_class = $request->icon_class;
        $social->url = $request->url;
        $social->status = $request->status;
        $social->save();

        return redirect()->route('socialmedia.index')->with('success', 'Social Media Updated successfully..');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $social = SocialMedia::find($id);
        $social->delete();
        
        return redirect()->route('socialmedia.index')->with('delete', 'Social Media Deleted Successfully');

    }
}
