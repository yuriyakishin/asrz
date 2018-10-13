<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmsPage;

class PoliticController extends Controller
{
    public function index()
    {
        $page = CmsPage::where('code','politic')->first();
        return view('site.politic', [
            'page' => $page->getValue(),
            'meta' => \App\Meta::getMeta($page->id, 'politic')
        ]);
    }
}
