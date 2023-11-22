<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider_list = Slider::orderBy('id', 'DESC')->get();

        return view('backend.slider.index', compact('slider_list'));
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
        //
        $request->validate([
            'title_one' => 'required',
            'title_two' => 'required',
            'image' => 'required',
        ],
            [
                'title_one.required' => 'Enter title one',
                'title_two.required' => 'Enter title two',

            ]);
        try {

            $input['title_one'] = $request->title_one;
            $input['title_two'] = $request->title_two;

            if ($request->hasFile('image')) {
                $input['image'] = $request->file('image')->store('slider', 'uploads');
            }
            Slider::create($input);

            return redirect()->back()->with('message', 'Record added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong' . $e);
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
        $slider_list = Slider::orderBy('id', 'DESC')->get();
        $slider_edit = Slider::find($id);
        return view('backend.slider.index', compact('slider_edit', 'slider_list'));
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
        $update = Slider::find($id);
        $input['title_one'] = $request->title_one;
        $input['title_two'] = $request->title_two;

        if ($request->hasFile('image')) {
            if (!empty($update->image) && file_exists(public_path("uploads/" . $update->image))) {
                unlink("uploads/" . $update->image);
            }

            $input['image'] = $request->file('image')->store('slider', 'uploads');
        }

        $update->update($input);
        return redirect()->route('slider.page')->with('message', "Record updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Slider::find($id);
        unlink("uploads/" . $delete->image);
        $delete->delete();
        return redirect()->back()->with('Message', 'Record deleted');
    }

    public function status(Request $request)
    {
        // dd($request->all());
        $update = Slider::find($request->id);
        $input['status'] = $update->status ? 0 : 1;
        $update->update($input);
        return "Status Upadeted !";
    }
}
