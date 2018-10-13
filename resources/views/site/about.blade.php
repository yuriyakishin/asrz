@extends('site.layouts.main')

@section('breadcrumb')
  <li class="active">О компании</li>
@endsection

@section('content')

            <h1>{!! $page['title'] !!}</h1>

            {!! $page['fulltext'] !!}

@endsection
