<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'heading_one', 'heading_two', 'sub_heading', 'editor', 'description1', 'image1', 'image2', 'image3'];
}
