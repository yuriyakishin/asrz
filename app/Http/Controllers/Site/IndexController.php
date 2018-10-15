<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmsPage;

class IndexController extends Controller
{
    public function index()
    {
        $page = CmsPage::where('code','home')->first();
        
        return view('site.index', [
            'page' => $page->getValue(),
            'banners' => \App\Banner::orderBy('sort')->get(),
            'servicesIndex' => \App\Service::orderBy('sort')->get(),
            'worksIndex' => \App\Work::orderBy('sort')->limit(10)->get(),
            'meta' => \App\Meta::getMeta($page->id, 'home',
        ]);
    }
}