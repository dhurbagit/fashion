<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'status', 'type'];

    protected $table = 'albums';

    public function Gallery_image()
    {
        return $this->hasMany(Gallery::class, 'album_id');
    }

}
