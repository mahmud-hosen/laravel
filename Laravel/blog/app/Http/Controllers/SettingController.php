<?php

namespace App\Http\Controllers;

use Session;
use App\setting;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SettingController extends Controller
{
   /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        $settings = Setting::all();
        
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {

        return view('admin.setting.create');

    }


    public function store(Request $request)
    {
       // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'copyright' => 'required',
        ]);

        $setting = Setting::create($request->all());

        if($request->hasFile('site_logo')){
            $image = $request->site_logo;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/setting/', $image_new_name);
            $setting->site_logo = '/storage/setting/' . $image_new_name;
            $setting->save();
        }

        Session::flash('success', 'Setting Create successfully');
        return redirect()->route('setting.index');


    }

    public function edit(Setting $setting)
    {
        
        return view('admin.setting.edit', compact('setting'));
    }

    
    public function show(Setting $setting)
    {

       return view('admin.setting.show', compact('setting'));
  
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'copyright' => 'required',
        ]);

        $setting = Setting::first();
        $setting->update($request->all());

        if($request->hasFile('site_logo')){
            $image = $request->site_logo;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/setting/', $image_new_name);
            $setting->site_logo = '/storage/setting/' . $image_new_name;
            $setting->save();
        }

        Session::flash('success', 'Setting updated successfully');
        return redirect()->route('setting.show',$setting->id);

    }

    public function destroy(Setting $setting)
    {
        if($setting){
            $setting->delete();

            Session::flash('success', 'Setting deleted successfully');
            return redirect()->route('setting.index');
        }
    }
}
