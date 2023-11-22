<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contactList = ContactUs::orderBy('id', 'DESC')->get();
        return view('backend.contactUs.index', compact('contactList'));
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

        try {
            $request->validate([
                'name' => 'required',
                'contact' => 'required',
                'email' => 'required',
                'message' => 'required',
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
            ]);
            $input = request()->all();
            ContactUs::create($input);
            return redirect()->back()->with('message', 'Successfully Message Send !');
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
        $delete_contactUs = ContactUs::find($id);
        $delete_contactUs->delete();
        return redirect()->back()->with('messsage', 'Record Deleted Successfully');



    }
}
