@extends('site.layouts.main')

@section('breadcrumb')
  <li class="active">Контакты</li>
@endsection

@section('content')

    <h1>{!! $page['title'] !!}</h1>  
    <h2 class="small">{!! $page['title2'] !!}</h2>
    
    <div class="contact">
        {!! $page['fulltext'] !!}        
    </div>
 
    <div class="map">
        {!! $page['map'] !!}
    </div>
    
@endsection