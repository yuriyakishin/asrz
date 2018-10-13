@extends('site.layouts.main')

@section('breadcrumb')
  <li class="active">Наши работы</li>
@endsection

@section('content')

  <h1>{!! $page['title'] !!}</h1>
  {!! $page['fulltext'] !!}
   
    <ul class="row our-work">
        @foreach($works as $work)
            <li class="col-xs-6 col-sm-4 item"><a href="/work/{{ $work->uri }}"><img src="{{ $work->preview }}" alt="{{ $work->title }}"/>
                    <p>{{ $work->title }}</p>
            </a> </li>
        @endforeach
    </ul>
            
            
    <!--Pagination-->
    <nav  class="text-center" aria-label="Наши работы">
        {{ $works->render() }}
    </nav>
    <!--//Pagination--> 
@endsection