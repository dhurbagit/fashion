<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLife extends Model
{
    use HasFactory;
    protected $fillable = ['section_title', 'image', 'bg_image', 'title', 'date', 'description', 'status', 'type'];
}
