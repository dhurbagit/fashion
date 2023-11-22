<?php

namespace App\Http\Controllers\Admin;

use App\Trait\Crud;
use Illuminate\Http\Request;
use App\Models\MissionVission;
use App\Http\Controllers\Controller;
use App\Http\Requests\MissionVRequest;

class MissionVisionController extends Controller
{
    //
    use Crud;
    protected $model;
    protected $view_path = 'backend.mission_vission.';
    protected $storage_path = 'missionV';
    protected string $request = MissionVRequest::class;
    protected $routeName = 'missionV.page.index';

    public function __construct(MissionVission $missionVission)
    {
        $this->model = $missionVission;

    }
}
