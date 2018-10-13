<?php

namespace App\Http\Controllers\Admin;

use App\CmsSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class CmsSettingController extends Controller
{

    public function index()
    {
        $value = [];
        
        $cmsSetting = CmsSetting::where('code','base')->first();
        if(!empty($cmsSetting)) {
            $value = $cmsSetting->getValue();
        }
        
        return view('admin.cms_setting', ['cmsSetting' => $cmsSetting, 'value' => $value]);
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
        $data = CmsSetting::updateOrCreate(['code' => 'base'],['value' => serialize($request->block)]);
        

        \Session::flash('success_message','Настройки сохранены');
        return redirect()->route('admin.cmssetting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CmsSetting  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function show(CmsSetting $cmsPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CmsSetting  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function edit(CmsSetting $cmsPage)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CmsSetting  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CmsSetting $cmsPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CmsSetting  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CmsSetting $cmsPage)
    {
        //
    }
}
