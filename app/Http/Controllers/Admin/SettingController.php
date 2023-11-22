<?php

namespace App\Http\Controllers\Admin;

use App\Trait\Crud;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{
    //
    use Crud;
    protected $model;
    protected $view_path = 'backend.setting.';
    protected $storage_path = 'setting';
    protected string $request = SettingRequest::class;
    protected $routeName = 'setting.page.index';

    public function __construct(Setting $setting)
    {
        $this->model = $setting;

    }
}
