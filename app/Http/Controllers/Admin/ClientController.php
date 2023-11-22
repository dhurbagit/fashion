<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $client_list = Client::orderBy('id', 'DESC')->get();
        return view('backend.client.index', compact('client_list'));
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
            'image' => 'required',
        ]);
        try {
            $input['title'] = $request->title;
            $input['link'] = $request->link;
            if ($request->hasFile('image')) {
                $input['image'] = $request->file('image')->store('clients', 'uploads');
            }
            Client::create($input);
            return redirect()->back()->with('message', 'Record added successfully');
        } catch (\Exception$e) {
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
        $client_edit = Client::find($id);
        $client_list = Client::orderBy('id', 'DESC')->get();
        return view('backend.client.index', compact('client_edit', 'client_list'));
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
        $update = Client::find($id);
        $input['title'] = $request->title;
        $input['link'] = $request->link;
        if ($request->hasFile('image')) {
            if (file_exists(public_path("uploads/" . $update->image))) {
                unlink("uploads/" . $update->image);
            }
            $input['image'] = $request->file('image')->store('clients', 'uploads');
        }
        $update->update($input);
        return redirect()->route('client.page')->with('message', 'Record updated');

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
        $delete = Client::find($id);
        unlink('uploads/' . $delete->image);
        $delete->delete();
        return redirect()->back()->with('message', 'Record deleted');
    }

    public function status(Request $request)
    {
        $update = Client::find($request->id);
        $input['status'] = $update->status ? 0: 1;
        $update->update($input);
        return "Status updated!";
    }
}
