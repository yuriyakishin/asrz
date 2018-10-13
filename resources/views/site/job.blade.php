@extends('site.layouts.main')

@section('breadcrumb')
  <li class="active">Вакансии</li>
@endsection

@section('content')    
    <h1>{!! $page['title'] !!}</h1>
    {!! $page['fulltext'] !!}
    
    @if($jobs)
        <ul class="list">
            @foreach($jobs as $job)
                    <li>
                        <h2><i class="fa fa-user"></i>{{ $job->title }}</h2>
                        {!! $job->value !!}
                        <p class="autor">{{ $job->contacts }}</p>
                    </li>
            @endforeach
        </ul>
    @endif
@endsection