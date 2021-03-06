<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmsPage;

class ContactsController extends Controller
{
    public function index()
    {
        $page = CmsPage::where('code','contacts')->first();

        return view('site.contacts',[
            'page' => $page->getValue(),
            'meta' => \App\Meta::getMeta($page->id, 'contacts')]);
    }
}
