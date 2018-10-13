<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmsPage;
use App\Partner;

class PartnerController extends Controller
{
  public function index()
  {
    $page = CmsPage::where('code','partner')->first();
    return view('site.partner', [
        'page' => $page->getValue(),
        'partners' => Partner::orderBy('sort')->get(),
        'meta' => \App\Meta::getMeta($page->id, 'partner')
    ]);
  }
}
