<?php

namespace App\Http\Controllers\Admin;

use App\Trait\Crud;
use App\Models\Counter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CounterRequest;
use App\Http\Requests\MissionVRequest;

class CounterController extends Controller
{
    //
    use Crud;
    protected $model;
    protected $view_path = 'backend.counter.';
    protected $storage_path = 'counter';
    protected string $request = CounterRequest::class;


    public function __construct(Counter $counter)
    {
        $this->model = $counter;

    }

}
