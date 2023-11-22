<?php

namespace App\Http\Controllers\Admin;

use App\Trait\Crud;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Requests\AlbumRequest;
use App\Http\Controllers\Controller;
use App\Models\Gallery;

class AlbumController extends Controller
{

    use Crud;
    protected $model;
    protected $model_gallery;
    protected $view_path = 'backend.album.';
    protected string $request = AlbumRequest::class;
    protected $storage_path = 'album';
    protected $type = '0';
    protected $caption_type = 'caption';
    protected $name = null;

    public function __construct(Album $album)
    {
        $this->model = $album;

    }

    public function caption_save(Request $request)
    {
        try{
            $input =  $request->all();
            $input['type'] = $this->caption_type;
           
            $this->model->create($input);
            return redirect()->back()->with('message', 'Sub title created successfully !');
        }
        catch(\Exception$e){
            return redirect()->back()->with('error', 'Please try again!');
        }


    }

    public function gallery_destroy($id)
    {
        $gallery = Gallery::find($id);
        unlink("uploads/" . $gallery->image);
        $gallery->delete();
        return "Record Deleted";

    }
    public function section_update($id)
    {
        $update_section = $this->model->find($id);
        $input = resolve($this->request)->all();
        $update_section->update($input);
        return redirect()->back()->with('message', 'Updated !');
    }



}
