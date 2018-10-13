<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\CmsPage;
use App\Work;

class WorkController extends Controller
{
    public function index()
    {
        $page = CmsPage::where('code','work')->first();

        return view('site.work',[
            'page' => $page->getValue(),
            'works' => Work::orderBy('sort')->paginate(1) ,
            'meta' => \App\Meta::getMeta($page->id, 'work')]);
    }
    
    public function one()
    {
        $uri = str_replace('site.work.','',Route::getCurrentRoute()->getName());
        $work = Work::where('uri',$uri)->first();
        $images = \App\Image::where(['path' => 'work','path_id' => $work->id,'active' => 1])->orderBy('sort','ASC')->get();
        //var_dump($uri);die;
        return view('site.work_one', [
            'work' => $work,
            'images' => $images,
            'meta' => \App\Meta::getMeta($work->id, 'work'),
        ]);
    }
}
