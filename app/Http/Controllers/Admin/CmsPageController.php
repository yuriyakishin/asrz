<?php

namespace App\Http\Controllers\Admin;

use App\CmsPage;
use App\Meta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class CmsPageController extends Controller
{
    

     /**
     * @array
     */
    protected $config;

    /**
    * @string
    */
    protected $page;

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function __construct(Request $request)
    {
      $this->page = $request->page;
      if(isset(Config::get('cms')['pages'][$this->page]))
      {
        $this->config = Config::get('cms')['pages'][$this->page];
      }
      else {
        return redirect('admin');
      }
    }

    public function index()
    {
        $value = [];
        $meta = [];
        $images = [];
        
        $cms = CmsPage::where('code',$this->page)->first();
        if(!empty($cms)) {
            $value = $cms->getValue();
            $meta = Meta::where(['path_id' => $cms->id, 'path' => $this->page])->first();
            $images = \App\Image::where(['path' => 'cms_page','path_id' => $cms->id])->orderBy('sort','ASC')->get();
        }
        
        return view('admin.cms_page', ['config' => $this->config, 'page' => $this->page, 'value' => $value, 'meta' => $meta, 'images' => $images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = CmsPage::updateOrCreate(['code' => $this->page],['value' => serialize($request->block)]);
        
        /*****************Галерея**************************/
        // Обновляем картинки
        \App\Image::imageUpdate($data->id, 'cms_page', $request);
        
        // Добавляем новые картинки
        $pathTemp = $request->path_temp;
        \App\Image::imagePush(['path' => $pathTemp], ['path' => 'cms_page','path_id' => $data->id]);
        /*****************************************************************/
        
        Meta::updateOrCreate(['path_id' => $data->id, 'path' => $this->page], 
                ['title' => $request->meta['title'],'description' => $request->meta['description'],'keywords' => $request->meta['keywords']]);
        \Session::flash('success_message','Страница сохранена');
        return redirect()->route('admin.cmspage.{page}.index',['page' => $this->page]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function show(CmsPage $cmsPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function edit(CmsPage $cmsPage)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CmsPage $cmsPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CmsPage $cmsPage)
    {
        //
    }
}
