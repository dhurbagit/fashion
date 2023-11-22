<?php

namespace App\Http\Controllers\Admin;

use App\Trait\Crud;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;

class AboutController extends Controller
{
    //
    use Crud;
    protected $model;
    protected $view_path = 'backend.about.';
    protected $storage_path = 'about';
    protected string $request = AboutRequest::class;

    public function __construct(About $about)
    {
        $this->model = $about;

    }


}
