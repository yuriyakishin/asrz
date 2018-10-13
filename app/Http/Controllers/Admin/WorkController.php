<?php

namespace App\Http\Controllers\Admin;

use App\Work;
use App\Meta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.work',['rows' => Work::orderBy('sort')->paginate(1000)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.work_edit', ['work' => null]);
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
            'uri' => 'required',
          ],['Заполните полe формы']);

        
        $work = new Work;
        $work->title = $request->title;
        $work->value = $request->value;
        $work->uri = $request->uri;
        $work->sort = $request->sort;
        $work->save();
        
        // Добавить картинки
        $this->addImage($request, $work);
        
        // Сохраняем загруженные картинки
        $pathTemp = $request->path_temp;
        // \App\Image::where('path',$pathTemp)->update(['path' => 'work','path_id' => $work->id, 'temp' =>0]);
        \App\Image::imagePush(['path' => $pathTemp], ['path' => 'work','path_id' => $work->id]);
        
        // Обновляем meta
        Meta::updateOrCreate(['path_id' => $work->id, 'path' => 'work'], 
                ['title' => $request->meta['title'],'description' => $request->meta['description'],'keywords' => $request->meta['keywords']]);
        
        \Session::flash('success_message','Информация сохранена');
        
        //
        if(isset($request->save_and_edit)) {
            return redirect()->route('admin.work.edit',$work);
        } else {
            return redirect()->route('admin.work.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        $images = \App\Image::where(['path' => 'work','path_id' => $work->id])->orderBy('sort','ASC')->get();
        $meta = Meta::where(['path_id' => $work->id, 'path' => 'work'])->first();
        return view('admin.work_edit', ['work' => $work, 'images' => $images, 'meta' => $meta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        // Обновляем работы
        $work->update($request->input());
        
        // Добавить картинки
        $this->addImage($request, $work);
        
        // Обновляем картинки
        \App\Image::imageUpdate($work->id, 'work', $request);
        
        // Добавляем новые картинки
        $pathTemp = $request->path_temp;
        \App\Image::imagePush(['path' => $pathTemp], ['path' => 'work','path_id' => $work->id]);
        
        // Обновляем meta
        Meta::updateOrCreate(['path_id' => $work->id, 'path' => 'work'], 
                ['title' => $request->meta['title'],'description' => $request->meta['description'],'keywords' => $request->meta['keywords']]);
        
        \Session::flash('success_message','Информация сохранена');
        
        //
        if(isset($request->save_and_edit)) {
            return redirect()->route('admin.work.edit',$work);
        } else {
            return redirect()->route('admin.work.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        $work->delete();
        return redirect()->route('admin.work.index');
    }
    
    /**
     * 
     * @param Request $request
     * @param Work $work
     */
    public function addImage(Request $request, Work $work)
    {
        // Добавить превью
        $previewFile = $request->file('preview');
        if(isset($previewFile))
        {
            $previewDir = 'images/uploads/preview/'.date('Y-m-d').'/';
            $preview = $previewDir . $previewFile->getClientOriginalName();
            $previewFile->move($previewDir,$previewFile->getClientOriginalName());
            $work->preview = $preview;
            $work->save();
        }
        
        // Добавить картинку
        $imageFile = $request->file('image');
        if(isset($imageFile))
        {
            $imageDir = 'images/uploads/images/'.date('Y-m-d').'/';
            $image = $imageDir . $imageFile->getClientOriginalName();
            $imageFile->move($imageDir,$imageFile->getClientOriginalName());
            $work->image = $image;
            $work->save();
        }
    }
}
