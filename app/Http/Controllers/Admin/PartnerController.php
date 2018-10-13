<?php

namespace App\Http\Controllers\Admin;

use App\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.partner',['rows' => Partner::orderBy('sort')->paginate(1000)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner_edit', ['partner' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // передаем ошибку
        $request->flash();
        
        $this->validate($request, [
            'title' => 'required',
          ],['Заполните полe формы']);
        
        $partner = new Partner;
        $partner->title = $request->title;
        $partner->sort = $request->sort;

        $partner->save();
        \Session::flash('success_message','Информация сохранена');
        
        //
        if(isset($request->save_and_edit)) {
            return redirect()->route('admin.partner.edit',$partner);
        } else {
            return redirect()->route('admin.partner.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('admin.partner_edit', ['partner' => $partner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $partner->update($request->input());
        \Session::flash('success_message','Информация сохранена');
        
        //
        if(isset($request->save_and_edit)) {
            return redirect()->route('admin.partner.edit',$partner);
        } else {
            return redirect()->route('admin.partner.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('admin.partner.index');
    }
}
