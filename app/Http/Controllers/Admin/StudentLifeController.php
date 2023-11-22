<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentLife;
use Illuminate\Http\Request;

class StudentLifeController extends Controller
{

    protected $type = 'section_detail';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $section_detail = StudentLife::orderBy('id', 'DESC')->where('type', 'section_detail')->first();
        $studentLife_list = StudentLife::orderBy('id', 'DESC')->where('type', '0')->get();
        return view('backend.student_life.index', compact('studentLife_list', 'section_detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.student_life.form');
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
            'date' => 'required',
            'description1' => 'required',
            'image' => 'required',
        ]);

        try {
            $input['title'] = $request->title;
            $input['date'] = $request->date;
            $input['description'] = $request->description1;

            if ($request->hasFile('image')) {
                $input['image'] = $request->file('image')->store('studentlife', 'uploads');
            }
            StudentLife::create($input);
            return redirect()->back()->with('message', 'Record Stored !');
        } catch (\Exception$e) {
            return redirect()->back()->with('error', 'Something went wrong !');
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
        $detail = StudentLife::find($id);
        $detailbackgound = StudentLife::where('type', 'section_detail')->first();
       
        return view('frontend.studentLifeDetail', compact('detail', 'detailbackgound'));
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
        $edit_list = StudentLife::find($id);
        return view('backend.student_life.form', compact('edit_list'));
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
        $update = StudentLife::find($id);
        $input['title'] = $request->title;
        $input['date'] = $request->date;
        $input['description'] = $request->description1;

        if ($request->hasFile('image')) {
            if (file_exists(public_path("uploads/" . $update->image))) {
                unlink("uploads/" . $update->image);
            }
            $input['image'] = $request->file('image')->store('studentlife', 'uploads');
        }

        $update->update($input);

        return redirect()->back()->with('message', 'Updated Successull !');
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
        $delete = StudentLife::find($id);
        unlink('uploads/' . $delete->image);
        $delete->delete();
        return redirect()->back()->with('message', 'Record Deleted !');
    }

    public function save(Request $request)
    {
        $request->validate([
            'section_title' => 'required',
            'bg_image' => 'required',
        ]);
        try {
            $input['section_title'] = $request->section_title;
            $input['type'] = $this->type;
            if ($request->hasFile('bg_image')) {
                $input['bg_image'] = $request->file('bg_image')->store('studentlife', 'uploads');
            }
            StudentLife::create($input);

            return redirect()->back()->with('message', 'Record added successfully');

        } catch (\Exception$e) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function bg_update(Request $request, $id)
    {
        $update = StudentLife::find($id);
        $input['section_title'] = $request->section_title;
        if ($request->hasFile('bg_image')) {
            if (file_exists(public_path("uploads/" . $update->bg_image))) {
                unlink("uploads/" . $update->bg_image);
            }
            $input['bg_image'] = $request->file('bg_image')->store('studentlife', 'uploads');
        }
        $update->update($input);
        return redirect()->back()->with('message', 'Record updated');
    }


    public function status(Request $request)
    {

        $update = StudentLife::find($request->id);
        $input['status'] = $update->status ? 0 : 1;
        $update->update($input);
        return "Status Updated";

    }


}
