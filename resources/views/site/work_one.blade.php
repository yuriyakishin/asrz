@extends('site.layouts.main')

@section('breadcrumb')
    <li><a href="/work">Наши работы</a></li>
    <li class="active">{{ $work->title }}</li>
@endsection


@section('content')
    <h1>{{ $work->title }}</h1>
    @if($work->image)
        <p align="center"><img src="{{ $work->image }}"  class="content"alt="{{ $work->title }}"/></p>
    @endif
    {!! $work->value !!}
    <h3 align="center">Фото</h3>
            <div class="row gallery-thumb">
                @foreach($images as $image)
                <div class="col-md-3 col-sm-4 col-xs-6  thumb"><a  class="fancybox-buttons" data-fancybox-group="button"  href="{{ $MyImage->getImage([
                'id'=>$image->id,
                'full'=>true,
                'width'=>0,
                'height'=>0,
                'watermark'=>true
    ]) }}" title="{{ $image->comment }}"><img src="{{ $MyImage->getImage([
                'id'=>$image->id,
                'full'=>false,
                'width'=>250,
                'height'=>250,
                'watermark'=>false
    ]) }}" class="img-responsive" alt="{{ $image->comment }}"/></a></div>
                @endforeach
            </div>
            @include('site.callback')
@endsection