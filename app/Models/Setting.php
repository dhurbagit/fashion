<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['address','email','phone','phone1','facebook','instagram','linkedin','youtube','quote','image','image1','google_map', 'security_key', 'site_key'];
}
