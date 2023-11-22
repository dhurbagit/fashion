<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    use HasFactory;
    protected $fillable = ['section_title', 'section_title_caption','image','name','designation','facbook_link','instagram_link','linked_link','status', 'type'];
}
