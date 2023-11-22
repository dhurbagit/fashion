<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    protected $type = 'background';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ads_list = Advertise::orderBy('id', 'DESC')->where('type', 'background')->first();
        $ads_collection = Advertise::orderBy('id', 'DESC')->where('type', '0')->get();

        return view('backend.advertisement.index', compact('ads_list', 'ads_collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.advertisement.form');
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
            'sub_title' => 'required',
            'heading' => 'required',
            'description1' => 'required',
            'image' => 'required',
        ]);

        try {

            $input['sub_title'] = $request->sub_title;
            $input['heading'] = $request->heading;
            $input['description'] = $request->description1;

            if ($request->hasFile('image')) {
                $input['image'] = $request->file('image')->store('advertisement', 'uploads');
            }

            Advertise::create($input);

            return redirect()->back()->with('message', 'Record added');
        } catch (\Exception$e) {
            return redirect()->back()->with('message', 'Something went wrong !');
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
        $show_list = Advertise::find($id)->where(['status'=> '1', 'type' => '0'])->get();
        $backgroundAds = Advertise::where(['type' => 'background'])->first();
        $show_listBanner = Advertise::find($id)->where(['status' => '1'])->first();

        return view('frontend.advertisementDetail', compact('show_list', 'backgroundAds', 'show_listBanner'));
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

        $collection_update = Advertise::where('type', '0')->find($id);
        return view('backend.advertisement.form', compact('collection_update'));
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
        $update = Advertise::find($id);
        $input['sub_title'] = $request->sub_title;
        $input['heading'] = $request->heading;
        $input['description'] = $request->description1;

        if ($request->hasFile('image')) {
            if (file_exists(public_path("uploads/" . $update->image))) {
                unlink("uploads/" . $update->image);
            }
            $input['image'] = $request->file('image')->store('advertisement', 'uploads');
        }

        $update->update($input);

        return redirect()->back()->with('message', 'Record Updated');
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
        $delete = Advertise::find($id)->where('type', '0')->first();
        unlink("uploads/" . $delete->image);
        $delete->delete();
        return redirect()->back()->with('message', 'Record Deleted');
    }

    public function save(Request $request)
    {
        //
        $request->validate([
            'bg_image' => 'required',
        ]);

        try {

            $input['type'] = $this->type;
            if ($request->hasFile('bg_image')) {
                $input['bg_image'] = $request->file('bg_image')->store('advertisement', 'uploads');
            }

            Advertise::create($input);

            return redirect()->back()->with('message', 'Record added');
        } catch (\Exception$e) {
            return redirect()->back()->with('message', 'Something went wrong !');
        }
    }
    public function bg_update(Request $request, $id)
    {
        //
        try {
            $ads_update = Advertise::find($id)->where('type', 'background')->first();

            if ($request->hasFile('bg_image')) {
                if (file_exists(public_path("uploads/" . $ads_update->bg_image))) {
                    unlink("uploads/" . $ads_update->bg_image);
                }
                $input['bg_image'] = $request->file('bg_image')->store('advertisement', 'uploads');
            }
            $ads_update->update($input);
            return redirect()->back()->with('message', 'Record updated');
        } catch (\Exception$e) {
            return redirect()->back()->with('error', 'Update input field before update');
        }
    }

    public function status(Request $request)
    {

        $update = Advertise::find($request->id);
        $input['status'] = $update->status ? 0 : 1;
        $update->update($input);
        return "Status Updated";

    }

}
