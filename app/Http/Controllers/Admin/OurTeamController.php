<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OurTeamRequest;
use App\Models\OurTeam;
use App\Trait\Crud;
use Illuminate\Http\Request;

class OurTeamController extends Controller
{
    use Crud;
    protected $model;
    protected $view_path = 'backend.ourteam.';
    protected $storage_path = 'OurTeam';
    protected string $request = OurTeamRequest::class;
    protected $section_detail = "sectionInfo";
    protected $type = '0';

    public function __construct(OurTeam $ourTeam)
    {
        $this->model = $ourTeam;

    }

    public function section_save(Request $request)
    {

        $request->validate([
            'section_title' => 'required',
            'section_title_caption' => 'required',
        ]);
        try {
            $input = $request->all();
            $input['type'] = $this->section_detail;


            $this->model::create($input);
            return redirect()->back()->with('message', 'Record Added !');
        } catch (\Exception$e) {
            return dd($e->getMessage());
        }

    }
    public function section_update( Request $request , $id){
        $request->validate([
            'section_title' => 'required',
            'section_title_caption' => 'required',
        ]);
        try {
            $team_update = $this->model::find($id);
            $input = $request->all();
            $team_update->update($input);
            return redirect()->back()->with('message', 'Record Added !');
        } catch (\Exception$e) {
            return dd($e->getMessage());
        }
    }
}
