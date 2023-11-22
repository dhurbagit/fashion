<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\Online_form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class Online_formController extends Controller
{
    //

    public function index()
    {
        return view('frontend.online_form');
    }

    public function store(Request $request)
    {



        try {
            $request->validate([
                'fullname' => 'required',
                'g-recaptcha-response' => function ($attribute, $value, $fail) {
                    $secretKey = Setting::get()->first()->security_key;
                    $response = $value;
                    $userIp = $_SERVER['REMOTE_ADDR'];
                    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIp";
                    $response = \file_get_contents($url);
                    $response = json_decode($response);

                    if (!$response->success) {
                        Session::flash('g-recaptcha-response', 'Please check recaptcha');
                        Session::flash('alert-class', 'alert-danger');
                        $fail($attribute, 'google reCaptcha failed');
                    }
                },
            ],[
                'fullname.required'=>'Please fill all the field before apply !'
            ]);
            $input = $request->all();

            Online_form::create($input);


            return redirect()->back()->with('message', 'Successfully Send !');

        } catch (\Exception$e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

    }
    public function view()
    {
        $Online_form = Online_form::orderBy('id', 'DESC')->get();
        return view('backend.online_form.index', compact('Online_form'));
    }

    public function destroy($id)
    {
        $delete_onlineForm = Online_form::find($id);
        $delete_onlineForm->delete();

        return redirect()->back()->with('message', 'Successfully Deleted Record');
    }

    public function view_data($id)
    {

        $list = Online_form::find($id);
        return view('backend.online_form.detail', compact('list'));
    }
}
