<?php

namespace App\Http\Controllers\Site;

use App\Job;
use App\CmsPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = CmsPage::where('code','job')->first();
        return view('site.job', [
            'page' => $page->getValue(),
            'jobs' => Job::orderBy('sort')->get(),
            'meta' => \App\Meta::getMeta($page->id, 'job')
        ]);
    }
}
