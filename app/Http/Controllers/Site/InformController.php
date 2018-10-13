<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmsPage;

class InformController extends Controller
{
  public function index()
  {
      $page = CmsPage::where('code','inform')->first();
      return view('site.inform', [
          'page' => $page->getValue(),
          'meta' => \App\Meta::getMeta($page->id, 'inform')
      ]);
  }
}
