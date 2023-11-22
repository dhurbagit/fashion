<?php

namespace App\Http\Controllers\Admin;

use App\Trait\Crud;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DownloadRequest;
use App\Models\Download;

class DownloadController extends Controller
{
    //
    use Crud;
    protected $model;
    protected $view_path = 'backend.download.';
    protected $storage_path = 'download';
    protected string $request = DownloadRequest::class;
    protected $routeName = 'download.page.index';

    public function __construct(Download $download)
    {
        $this->model = $download;

    }
}
