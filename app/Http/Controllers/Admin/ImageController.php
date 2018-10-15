<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as ImageManager;
use Illuminate\Support\Facades\Response;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        $uuid = $request->uuid;
        // Удаление картинки из базы
        Image::where('uuid',$uuid)->delete();
        //
        $result = array("success" => true, "uuid" => $uuid);
        return response(json_encode($result))->header('Content-Type', 'application/json');
    }
    
    /**
     * Upload Image
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function upload(Request $request)
    {
        $result = array();
        
        try {        
            // Получаем и сохраняем файл
            $file = $request->file('qqfile');
            $imgSize = $file->getSize();
            $imgType = $file->getMimeType();
            $uuid = $request->input('qquuid');
            $imgDir = 'images/uploads/gallery/'.date('Y-m-d').'/';
            $imgName = 'img-'.rand(11111,99999).'-'.$file->getClientOriginalName();  
            $imgFile = $imgDir . $imgName;
            $file->move($imgDir,$imgName);
            //
            $img = ImageManager::make($imgFile);            
            $imgWidth = $img->getWidth();
            $imgHeight = $img->getHeight();
            
            // Добавляем картинку в базу, во временный раздел     
            $image = new Image;
            $image->image = $imgFile;
            $image->uuid = $uuid;
            $image->sort = 500;
            $image->image_name = $imgName;
            $image->image_dir = $imgDir;
            $image->image_size = $imgSize;
            $image->image_width = $imgWidth;
            $image->image_height = $imgHeight;
            $image->path_id = 0;
            $image->path = $request->input('path');
            $image->temp = 1;
            $image->active = 1;
            $image->save();
            
            // Возвращаем результат
            $result['success'] = true;
            $result['id'] = $image->id;
            $result['uuid'] = $uuid;
            $result['name'] = $imgName;
            $result['dir'] = $imgDir;
            $result['size'] = $imgSize;
            $result['width'] = $imgWidth;
            $result['height'] = $imgHeight;            
            return response(json_encode($result))->header('Content-Type', 'application/json');
            
        } catch(\Exception $e) {
            
            $result['error'] = $e->getMessage();
            return response(json_encode($result))->header('Content-Type', 'application/json');
        }
    }
    
    public function editorupload(Request $request)
    {
        // Добавить картинку
        $imageFile = $request->file('upload');
        if(isset($imageFile))
        {
            $imageDir = 'images/uploads/images/'.date('Y-m-d').'/';
            $image = $imageDir . $imageFile->getClientOriginalName();
            $imageFile->move($imageDir,$imageFile->getClientOriginalName());
            //
            $result['url'] = '/'.$image;
            $result['uploaded'] = '1';
            $result['fileName'] = $imageFile->getClientOriginalName();
            
            return $result;
        }
        return 'error';
    }
}