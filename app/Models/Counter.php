<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    protected $fillable = ['counter1','counter2','counter3','counter4','counterTitle1', 'counterTitle2','counterTitle3','counterTitle4', 'status'];
}
