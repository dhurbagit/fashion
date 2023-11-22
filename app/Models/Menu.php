<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_slug','position','main_child','parent_id','header_footer','mega_menu','publish_status','banner_image','image','page_title','title_slug','content','external_link'];
    const contentType = ['Home', 'About_us', 'Gallery', 'Academic', 'Event', 'Contact_us','Download', 'Page'];

    public function childrens()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('position', 'asc');
    }

    public function children(){
        return $this->hasMany(Menu::class, 'parent_id')->where('publish_status', 1)->orderBy('position', 'asc');
    }
}
