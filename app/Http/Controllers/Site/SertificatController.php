<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmsPage;
use MyImage;

class SertificatController extends Controller
{
  public function index()
  {
      $page = CmsPage::where('code','sertificat')->first();
      $images = \App\Image::where(['path' => 'cms_page','path_id' => $page->id,'active' => 1])->orderBy('sort','ASC')->get();

      return view('site.sertificat', [
          'page' => $page->getValue(),
          'images' => $images,
          'meta' => \App\Meta::getMeta($page->id, 'sertificat')
      ]);
  }
}
