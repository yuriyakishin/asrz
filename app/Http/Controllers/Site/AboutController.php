<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmsPage;

class AboutController extends Controller
{
    public function index()
    {
        $page = CmsPage::where('code','about')->first();
        return view('site.about', [
            'page' => $page->getValue(),
            'meta' => \App\Meta::getMeta($page->id, 'about')
        ]);
    }
}
