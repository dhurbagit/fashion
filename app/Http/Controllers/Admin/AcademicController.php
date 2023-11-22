<?php

namespace App\Http\Controllers\Admin;

use App\Trait\Crud;
use App\Models\Academic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcademicRequest;
use Symfony\Contracts\Service\Attribute\Required;

class AcademicController extends Controller
{
    //
    use Crud;
    protected $model;
    protected $view_path = 'backend.academic.';
    protected $storage_path = 'academic';
    protected string $request = AcademicRequest::class;
    protected $type = '0';
    protected $section_type = 'academic_section';

    public function __construct(Academic $academic)
    {
        $this->model = $academic;

    }

    public function section_save(Request $request)
    {
        $request->validate([
            'section_heading' => 'required',
            'section_subCaption' => 'required',
        ]);
        $input = $request->all();
        $input['type'] = $this->section_type;
        $this->model::create($input);

        return redirect()->back()->with('message', 'Record Added !');
    }

    public function section_update(Request $request, $id){


        $request->validate([
            'section_heading' => 'required',
            'section_subCaption' => 'required',
        ]);
        $academic_section_save = $this->model::find($id);
        $input = $request->all();
        $academic_section_save->update($input);
        return redirect()->route('academic.page.index')->with('message', 'Record Added !');


    }
}
