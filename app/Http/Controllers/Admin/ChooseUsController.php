<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChooseUs;
use Illuminate\Http\Request;

class ChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $chooseUs_list = ChooseUs::orderBy('id', 'DESC')->first();
        return view('backend.choose_us.index', compact('chooseUs_list'));
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
            'title' => 'required',
            'image' => 'required',
            'description1' => 'required',
            'counter_one' => 'required',
            'counter_two' => 'required',
            'counter_caption_one' => 'required',
            'counter_caption_two' => 'required',
        ]);
        try {
            $input['title'] = $request->title;
            $input['description'] = $request->description1;
            $input['counter_one'] = $request->counter_one;
            $input['counter_two'] = $request->counter_two;
            $input['counter_caption_one'] = $request->counter_caption_one;
            $input['counter_caption_two'] = $request->counter_caption_two;

            if ($request->hasFile('image')) {
                $input['image'] = $request->file('image')->store('chooseUs', 'uploads');
            }

            ChooseUs::create($input);

            return redirect()->back()->with('message', 'Record added Successfully !');

        } catch (\Exception$e) {
            return redirect()->back()->with('message', 'Something went wrong');
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
      
        $update = ChooseUs::find($id);
        $input['title'] = $request->title;
        $input['description'] = $request->description1;
        $input['counter_one'] = $request->counter_one;
        $input['counter_two'] = $request->counter_two;
        $input['counter_caption_one'] = $request->counter_caption_one;
        $input['counter_caption_two'] = $request->counter_caption_two;

        if ($request->hasFile('image')) {
            if (file_exists(public_path("uploads/" . $update->image))) {
                unlink("uploads/" . $update->image);
            }
            $input['image'] = $request->file('image')->store('chooseUs', 'uploads');
        }

        $update->update($input);
        return redirect()->back()->with('message', 'Record Updated Successfully !');
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
    }
}
