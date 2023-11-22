<?php

use App\Models\Setting;

function help(){
     return 'hello';
}

function setting()
{
    return Setting::orderBy('id', 'DESC')->first();
}
