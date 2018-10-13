<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use App\Meta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.service',['rows' => Service::orderBy('sort')->paginate(1000)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service_edit', ['service' => null]);
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
            'value' => 'required',
          ],['Заполните полe формы']);
        
        $service = new Service;
        $service->title = $request->title;
        $service->value = $request->value;
        $service->uri = $request->uri;
        $service->anons = $request->anons;
        $service->sort = $request->sort;
        
        $service->save();
        
        // Добавить баннер
        $this->addImage($request, $service);
        
        // Обновляем meta
        Meta::updateOrCreate(['path_id' => $service->id, 'path' => 'service'], 
                ['title' => $request->meta['title'],'description' => $request->meta['description'],'keywords' => $request->meta['keywords']]);
        
        
        \Session::flash('success_message','Информация сохранена');
        
        //
        if(isset($request->save_and_edit)) {
            return redirect()->route('admin.service.edit',$service);
        } else {
            return redirect()->route('admin.service.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $meta = Meta::where(['path_id' => $service->id, 'path' => 'service'])->first();
        return view('admin.service_edit', ['service' => $service, 'meta' => $meta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        // Обновляем работы
        $service->update($request->input());
        
        // Добавить баннер
        $this->addImage($request, $service);
        
        // Обновляем meta
        Meta::updateOrCreate(['path_id' => $service->id, 'path' => 'service'], 
                ['title' => $request->meta['title'],'description' => $request->meta['description'],'keywords' => $request->meta['keywords']]);
        
        \Session::flash('success_message','Информация сохранена');
        
        //
        if(isset($request->save_and_edit)) {
            return redirect()->route('admin.service.edit',$service);
        } else {
            return redirect()->route('admin.service.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.service.index');
    }
    
    /**
     * 
     * @param Request $request
     * @param Work $work
     */
    public function addImage(Request $request, Service $service)
    {
        // Добавить баннер
        $previewFile = $request->file('preview');
        if(isset($previewFile))
        {
            $previewDir = 'images/uploads/banner_service/'.date('Y-m-d').'/';
            $preview = $previewDir . $previewFile->getClientOriginalName();
            $previewFile->move($previewDir,$previewFile->getClientOriginalName());
            $service->preview = $preview;
            $service->save();
        }
        
    }
}
