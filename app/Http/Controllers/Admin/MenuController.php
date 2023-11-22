<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    protected $menu;
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $info = array();
        $info['menu_items'] = Menu::orderBy('position', 'asc')->whereNotIn('header_footer', ['2'])->get();
        $info['menu_footer'] = Menu::orderBy('position', 'asc')->whereNotIn('header_footer', ['1'])->get();
        // dd($info['menu_items']);
        return view('backend.menu.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $menu_categories = Menu::contentType;
        $parent_menus = Menu::where('parent_id', null)->get();
        return view('backend.menu.form', compact('menu_categories', 'parent_menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());

        $request->validate([
            'name' => 'required|max:250',
            'page_title' => 'nullable|max:250',
            'menu_category' => 'required',
            'main_child' => 'required',
            'show_in' => 'required|max:250',
            'banner_image' => request()->method == 'POST' ? 'required' : 'nullable',
        ]);

        try {
            $menu_count = Menu::count();
            $parent_id = null;
            $show_in = 1;
            if ($request['main_child'] == 1) {
                $parent_id = $request['parent_id'];
            } elseif ($request['main_chil'] == 0) {
                $show_in = $request['show_in'];
            }
            $fimage = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $fimage = $image->store('main_images', 'uploads');
            }
            $banner_image = null;
            if ($request->hasFile('banner_image')) {
                $image = $request->file('banner_image');
                $banner_image = $image->store('menu_images', 'uploads');
            }
            $new_menu = Menu::create([
                'name' => $request['name'],
                'position' => $menu_count + 1,
                'category_slug' => $request['menu_category'],
                'main_child' => $request['main_child'],
                'parent_id' => $parent_id,
                'external_link' => $request['external_link'],
                'header_footer' => $show_in,
                'banner_image' => $banner_image,
                'image' => $fimage,
                'title_slug' => Str::slug($request->page_title . Str::random(500)),
                'mega_menu' => isset($request->active_mega[0]) ? 1 : 0,
                'page_title' => $request['page_title'],
                'content' => $request['description1'],
            ]);

            if ($new_menu) {
                return redirect()->back()->with('message', 'Menu information is saved successfully.');
            } else {
                return redirect()->back()->with('error', 'Somthing went wrong');
            }
        } catch (\Exception$e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $edit_menu = Menu::findOrFail($id);
        $menu_categories = Menu::contentType;
        $parent_menus = Menu::get();



        return view('backend.menu.form', compact('edit_menu', 'menu_categories', 'parent_menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //  dd($request->all());
        $menu = Menu::findorFail($id);
        $this->validate($request, [
            'name' => 'required',
            'menu_category' => 'required',
            'main_child' => 'required',
            'parent_id' => '',
            'show_in' => '',
        ]);

        $parent_id = null;
        $show_in = 1;
        if ($request['main_child'] == 1) {
            $parent_id = $request['parent_id'];
        } else if ($request['main_child'] == 0) {
            $show_in = $request['show_in'];
        }

        $fimage = null;
        if ($request->hasfile('image')) {
            if (!empty($menu->image) && file_exists(public_path('uploads/' . $menu->image))) {
                unlink("uploads/" . $menu->image);
            }
            $image = $request->file('image');
            $fimage = $image->store('main_images', 'uploads');
        } else {
            $fimage = $menu->image;
        }

        $banner_image = null;
        if ($request->hasfile('banner_image')) {
            if (!empty($menu->image) && file_exists(public_path('uploads/' . $menu->banner_image))) {
                unlink("uploads/" . $menu->banner_image);
            }
            $image = $request->file('banner_image');
            $banner_image = $image->store('menu_images', 'uploads');
        } else {
            $banner_image = $menu->banner_image;
        }

        //  dd();

        $menu->update([
            'name' => $request['name'],
            'category_slug' => $request['menu_category'],
            'main_child' => $request['main_child'],
            'parent_id' => $parent_id,
            'external_link' => $request['external_link'],
            'header_footer' => $show_in,
            'banner_image' => $banner_image,
            'image' => $fimage,
            'page_title' => $request['page_title'],
            'content' => $request['description1'],
            'meta_title' => $request['meta_title'],
            'mega_menu' => isset($request->active_mega[0]) ? 1 : 0,

        ]);
        return redirect()->back()->with('message', 'Menu information is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $menu_delete = Menu::find($id);
        if (file_exists( public_path("uploads/" . $menu_delete->image) )) {
            unlink("uploads/" . $menu_delete->image);
        }
        if (file_exists( public_path("uploads/" . $menu_delete->banner_image) )) {
            unlink('uploads/'. $menu_delete->banner_image);
        }

        $menu_delete->delete();
        return redirect()->back()->with('message', 'Deleted Successfully !');
    }

    public function updateMenuOrder(Request $request)
    {
        parse_str($request->sort, $arr);
        $order = 1;
        if (isset($arr['menuItem'])) {
            foreach ($arr['menuItem'] as $key => $value) { //id //parent_id
                $this->menu->where('id', $key)
                    ->update([
                        'position' => $order,
                        'parent_id' => ($value == "null") ? null : $value,
                        'main_child' => ($value == "null") ? 0 : 1,
                    ]);
                $order++;
            }

        }
        return true;
    }
    public function status(Request $request){
        // dd($request->all());
        $update = Menu::find($request->id);
        $input['publish_status'] = $update->publish_status ? 0 : 1;

        $update->update($input);
        return "Status Updated !";
    }
}
