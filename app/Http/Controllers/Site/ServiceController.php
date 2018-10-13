<?php

namespace App\Http\Controllers\Site;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
        $uri = str_replace('site.service.','',Route::getCurrentRoute()->getName());
        $service = Service::where('uri',$uri)->first();
        //
        // шаблон формы обратного звонка в переменную
        $callback = view('site.callback')->render();
        $value = str_replace('<p>[[callback]]</p>',$callback,$service->value);
        $value = str_replace('[[callback]]',$callback,$value);
            
        return view('site.service',[
            'service' => $service,
            'value' => $value,
            'meta' => \App\Meta::getMeta($service->id, 'service')]);
    }
}
