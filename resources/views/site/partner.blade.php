@extends('site.layouts.main')

@section('breadcrumb')
  <li class="active">Партнеры</li>
@endsection

@section('content')

<h1>{!! $page['title'] !!}</h1>
  <ul class="list partners">
    @foreach($partners as $partner)
    <li>{!! $partner->title !!}</li>
  @endforeach
</ul>

@endsection
