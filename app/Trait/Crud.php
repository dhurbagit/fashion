<?php
namespace App\Trait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

trait Crud
{
    protected $arr = array('image', 'image1', 'image2', 'image3');

    public function index()
    {
        //

        $collection = array();

        if (Schema::hasColumn($this->model->getTable(), 'type')) {
            $collection['album_collection'] = $this->model->orderBy('id', 'DESC')->where('type', $this->type)->get();
            $collection['section_detail'] = $this->model->orderBy('id', 'DESC')->where('type', $this->type)->first();
            $collection['event_list'] = $this->model->orderBy('id', 'DESC')->where('type', '0')->get();
            $collection['album_section'] = $this->model->where('type', 'caption')->first();
            $collection['team_section'] = $this->model->where('type', 'sectionInfo')->first();
            $collection['academic_section'] = $this->model->where('type', 'academic_section')->first();
            $collection['events'] = $this->model->orderBy('id', 'DESC')->where('type', '0')->get();
            $collection['events_tblList'] = $this->model->orderBy('id', 'DESC')->where('type', '0')->get();
            $collection['academic_list'] = $this->model->orderBy('id', 'DESC')->where('type', '0')->get();

        }
        $collection['all'] = $this->model->orderBy('id', 'DESC')->get();
        $collection['setting'] = $this->model->orderBy('id', 'DESC')->first();

        // dd($collection);

        return view($this->view_path . 'index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view_path . 'form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        // validated()
        try {
            $input = resolve($this->request)->all();


            foreach ($this->arr as $image) {
                if (Schema::hasColumn($this->model->getTable(), $image)) {
                    $input[$image] = $input[$image]->store($this->storage_path, 'uploads');
                }
            }
            $album = $this->model->create($input);
            if (!empty(resolve($this->request)->hasFile('files'))) {
                foreach (resolve($this->request)->file('files') as $img) {
                    $image_name = $img->store($this->storage_path, 'uploads');
                    $album->Gallery_image()->create(['image' => $image_name]);
                }
            }

            return redirect()->back()->with('message', 'Record added !');

        } catch (\Exception$e) {

            return redirect()->back()->with('error', $e->getMessage());

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
        $collection = array();
        $collection['find_all'] = $this->model->find($id);
        $collection['all'] = $this->model->orderBy('id', 'DESC')->get();
        // $filesInFolder = view($this->view_path . 'form');

        if (view()->exists($this->view_path . 'form') == true) {
            return view($this->view_path . 'form', compact('collection'));
        } else {
            return view($this->view_path . 'index', compact('collection'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $update = $this->model->find($id);

        // dd(resolve($this->request)->all());

        $input = resolve($this->request)->all();
        $arr = array('image', 'image1', 'image2', 'image3');
        foreach ($this->arr as $image) {
            if (Schema::hasColumn($this->model->getTable(), $image) && isset($input[$image])) {

                if (file_exists(public_path("uploads/" . $update[$image]))) {
                    if ($update[$image] !== null) {
                        unlink("uploads/" . $update[$image]);
                    }
                }

                $input[$image] = $input[$image]->store($this->storage_path, 'uploads');
            }
        }
        $update->update($input);
        if (!empty(resolve($this->request)->hasFile('files'))) {
            foreach (resolve($this->request)->file('files') as $img) {
                $image_name = $img->store($this->storage_path, 'uploads');
                $update->Gallery_image()->create(['image' => $image_name]);
            }
        }
        if (view()->exists($this->view_path . 'form') == true) {
            return redirect()->back()->with('message', 'Record Updated !');
        } else {
            return redirect()->route($this->routeName)->with('message', 'Record Updated !');
        }


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

        // has
        // with
        // optional
        // relation()->exists()
        // function_exists
        // !is_null
        // ->friendship()->exists() ? dd('y') : dd('n');
        // Property [image] does not exist on this collection instance.

        $check_relation = $this->model::find($id)->Gallery_image;

        if ($check_relation) {

            $parent_model = $this->model::find($id);

            foreach ($check_relation as $gallery) {

                if (file_exists(public_path("uploads/" . $gallery->image))) {
                    unlink("uploads/" . $gallery->image);
                }
                $gallery->delete();
            }
            if (file_exists(public_path("uploads/" . $parent_model->image))) {
                unlink("uploads/" . $parent_model->image);
            }
            $parent_model->delete();
        } else {
            $delete_image = $this->model::find($id);

            foreach ($this->arr as $img) {
                if (Schema::hasColumn($this->model->getTable(), $img) && $delete_image->$img) {
                    unlink("uploads/" . $delete_image->$img);
                }
            }

            $delete_image->delete();
        }

        return redirect()->back()->with("message", "Record Deleted");
    }

    public function status(Request $request)
    {
        // dd($request->all());
        $update = $this->model->find($request->id);
        $input['status'] = $update->status ? 0 : 1;

        $update->update($input);
        return "Status Upadeted !";
    }

}
