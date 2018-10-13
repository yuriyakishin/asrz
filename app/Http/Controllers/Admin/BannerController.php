<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banner',['rows' => Banner::orderBy('sort')->paginate(1000)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner_edit', ['banner' => null]);
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
        
        $banner = new Banner;
        $banner->title = $request->title;
        $banner->sort = $request->sort;
        $banner->value = $request->value;
        $banner->uri = $request->uri;

        $banner->save();
        \Session::flash('success_message','Информация сохранена');
        
        // Добавить картинки
        $this->addImage($request, $banner);
        
        //
        if(isset($request->save_and_edit)) {
            return redirect()->route('admin.banner.edit',$banner);
        } else {
            return redirect()->route('admin.banner.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner_edit', ['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        // Обновляем работы
        $banner->update($request->input());
        
        // Добавить картинки
        $this->addImage($request, $banner);

        
        \Session::flash('success_message','Информация сохранена');
        
        //
        if(isset($request->save_and_edit)) {
            return redirect()->route('admin.banner.edit',$banner);
        } else {
            return redirect()->route('admin.banner.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.banner.index');
    }
    
    /**
     * 
     * @param Request $request
     * @param banner $banner
     */
    public function addImage(Request $request, Banner $banner)
    {        
        // Добавить баннер
        $imageFile = $request->file('image');
        if(isset($imageFile))
        {
            $imageDir = 'images/uploads/images/'.date('Y-m-d').'/';
            $image = $imageDir . $imageFile->getClientOriginalName();
            $imageFile->move($imageDir,$imageFile->getClientOriginalName());
            $banner->image = $image;
            $banner->save();
        }
    }
}
