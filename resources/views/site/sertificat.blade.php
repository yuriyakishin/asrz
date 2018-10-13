@extends('site.layouts.main')

@section('breadcrumb')
  <li class="active">Сертификаты и разрешения</li>
@endsection

@section('content')

  <h1>{!! $page['title'] !!}</h1>
  <div class="row gallery-thumb">
    @foreach($images as $image)
    <div class="col-md-3 col-sm-4 col-xs-6  thumb"><a class="fancybox-buttons" data-fancybox-group="button"  href="{{ $MyImage->getImage([
                'id'=>$image->id,
                'full'=>true,
                'width'=>0,
                'height'=>0,
                'watermark'=>true
    ]) }}" title="{{ $image->comment }}"><img src="{{ $MyImage->getImage(['id'=>$image->id,'full'=>false,'width'=>243,'height'=>0,'watermark'=>false]) }}" class="img-responsive" alt="{{ $image->comment }}"/></a></div>
    @endforeach
  </div>

@endsection
