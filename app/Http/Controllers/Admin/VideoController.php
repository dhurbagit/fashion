<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $collection = Video::where('type', '0')->orderBy('id', 'DESC')->get();
        return view('backend.youtube_video.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title' => 'required',
            'link' => 'required',
        ]);
        try {
            $input['title'] = $request->title;
            $input['link'] = $request->link;

            Video::create($input);
            return redirect()->back()->with('message', 'Record Added !');
        } catch (\Exception$e) {
            return redirect()->back()->with('Something went wrong');
        }

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
        //
        $collection = Video::where('type', '0')->orderBy('id', 'DESC')->get();
        $edit_collection = Video::find($id);
        return view('backend.youtube_video.index', compact('edit_collection', 'collection'));
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
        //


        $update = Video::find($id);
        $input['title'] = $request->title;
        $input['link'] = $request->link;

        $update->update($input);

        return redirect()->route('youtube.page')->with('message', 'Record Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Video::find($id);
        $delete->delete();

        return back()->with('message', 'Record Deleted !');
    }

    public function status(Request $request)
    {
         // dd($request->all());
         $update = Video::find($request->id);
         $input['status'] = $update->status ? 0 : 1;
         $update->update($input);
         return "Status Upadeted !";
    }
}
