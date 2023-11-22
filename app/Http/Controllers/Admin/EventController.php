<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\eventRequest;
use App\Models\Event;
use App\Trait\Crud;
use Illuminate\Http\Request;


class EventController extends Controller
{
    use Crud;
    protected $type = 'section_detail';
    protected $model;
    protected $view_path = 'backend.event.';
    protected string $request = eventRequest::class;
    protected $storage_path = 'event';


    public function __construct(Event $event)
    {
        $this->model = $event;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'editor' => 'required',
        ]);
        try {
            $input['title'] = $request->title;
            $input['editor'] = $request->editor;
            $input['type'] = $this->type;
            Event::create($input);
            return redirect()->back()->with('message', 'Record added !');
        } catch (\Exception$e) {
            return redirect()->back()->with('error', 'Please Try Again.');
        }

    }

    public function section_update(Request $request, $id)
    {
        $updateTable = Event::find($id);
        $input = $request->all();
        // dd($input);
        if ($request->hasFile('image')) {
            if (file_exists(public_path("uploads/" . $updateTable->image))) {
                unlink("uploads/" . $updateTable->image);
            }
            $input['image'] = $request->file('image')->store($this->storage_path, 'uploads');
        }
        $updateTable->update($input);
        return redirect()->back()->with('message', 'Record Updated !');


    }

}
