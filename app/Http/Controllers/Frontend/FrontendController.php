<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Academic;
use App\Models\Advertise;
use App\Models\Album;
use App\Models\ChooseUs;
use App\Models\Client;
use App\Models\Counter;
use App\Models\Download;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\MissionVission;
use App\Models\OurTeam;
use App\Models\Slider;
use App\Models\StudentLife;
use App\Models\Video;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = array();
        $datas['slider'] = Slider::orderBy('id', 'DESC')->where('status', '1')->get();
        $datas['client'] = Client::orderBy('id', 'DESC')->where('status', '1')->get();
        $datas['advertisement'] = Advertise::orderBy('id', 'DESC')->where('status', '1')->take(1)->get();
        $datas['advertisement_sectionBg'] = Advertise::orderBy('id', 'DESC')->where('type', 'background')->first();
        $datas['chooseUs'] = ChooseUs::orderBy('id', 'DESC')->first();
        $datas['studentLife_sectionBg'] = StudentLife::orderBy('id', 'DESC')->where('type', 'section_detail')->first();
        $datas['studentLife'] = StudentLife::orderBy('id', 'DESC')->where(['type' => '0', 'status' => '1'])->take(3)->get();
        $datas['youtube'] = Video::orderBy('id', 'DESC')->take(1)->first();
        $datas['events_section'] = Event::orderBy('id', 'DESC')->where('type', 'section_detail')->first();
        $datas['event_detail'] = Event::orderBy('id', 'DESC')->where(['type' => '0', 'status' => '1'])->take(3)->get();
        $datas['gallery_section'] = Album::orderBy('id', 'DESC')->where(['type' => 'caption'])->take(3)->first();
        $datas['gallery'] = Album::orderBy('id', 'DESC')->where(['type' => '0', 'status' => '1'])->take(3)->get();
        return view('frontend.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }


    public function category($slug){

        $menu = Menu::where('category_slug', $slug)->first();


        switch($slug){
            case 'Academic':
                $academic_section = Academic::where('type', 'academic_section')->first();
                $academic = Academic::orderBy('id', 'DESC')->where(['type'=> '0', 'status' => '1'])->take(3)->get();
                $menuContent = $menu;
                return view('frontend.academic', compact('academic_section', 'menuContent', 'academic'));
            case 'Gallery' :
                $gallery = Album::orderBy('id','DESC')->where(['status' => '1', 'type' => '0'])->get();
                $menuContent = $menu;

                return view('frontend.album.archive', compact('gallery','menuContent'));
            case 'About_us' :
                $menuContent = $menu;
                $aboutContent =  About::orderBy('id', 'DESC')->take(1)->get();
                $missionContent = MissionVission::orderBy('id', 'DESC')->where('status', '1')->get();
                $counter_detail = Counter::orderBy('id', 'DESC')->where('status', '1')->take(1)->get();
                $ourTeam =  OurTeam::orderBy('id', 'DESC')->where(['status'=> '1', 'type'=> '0'])->take(3)->get();

                return view('frontend.about', compact('aboutContent', 'menuContent', 'missionContent', 'ourTeam','counter_detail'));

            case 'Event' :
                $menuContent = $menu;
                $eventContent = Event::orderBy('id', 'DESC')->where('status', '1')->paginate(6);
                return view('frontend.event_folder.archive' , compact('eventContent', 'menuContent'));

            case 'Download' :
                $menuContent = $menu;
                $downloadContent = Download::orderBy('id', 'DESC')->where('status', '1')->get();

                return view('frontend.download', compact('downloadContent', 'menuContent'));

            case 'Contact_us' :
                $menuContent = $menu;
                return view('frontend.contactUs', compact('menuContent'));

            case 'Home' :
                return view('frontend.index');
            default:
            return "Not Found";
        }


    }
    public function show_gallery($id){
        $show_gallery =  Gallery::orderBy('id', 'DESC')->where('album_id', $id)->get();
        $title_album  = Album::find($id)->first();

        $menuGetData = $this->category('Gallery');
        $menuData = $menuGetData['menuContent'];

        return view('frontend.album.gallery', compact('show_gallery', 'menuData', 'title_album'));
    }

    public function event_detail($id){
        $event_detail = Event::where('status', '1')->find($id);
        $event_detail_title =  Event::find($id)->where('status', '1')->first();
        $recent_event = Event::orderBy('id', 'DESC')->where('status', '1')->get();
        $menuGetData = $this->category('Event');
        $menuData = $menuGetData['menuContent'];




        return view('frontend.event_folder.detail', compact('event_detail', 'menuData', 'event_detail_title','recent_event'));
    }
}
