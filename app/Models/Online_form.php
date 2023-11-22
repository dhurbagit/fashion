<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online_form extends Model
{
    use HasFactory;
    protected $fillable = ['fullname', 'address','phone','homeAddress','mobileNumber','gender','nationality','email','dob_ad','dob_bs','age','program','attended','levelPassed','training','about','encouraged'];
}
