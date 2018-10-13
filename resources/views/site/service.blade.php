@extends('site.layouts.main')

@section('breadcrumb')
  <li class="active">{{ $service->title }}</li>
@endsection

@section('content')

  <h1>{!! $service->title !!}</h1>

   {!! $value !!}

@endsection