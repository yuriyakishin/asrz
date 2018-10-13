@extends('site.layouts.main')

@section('content')
<!--slider-->
<div class="slider">
    <div id="carousel" class="carousel fade" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($banners as $banner)
            <li data-target="#carousel" data-slide-to="{{$loop->index}}" @if($loop->first) class="active" @endif></li>
            @endforeach
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner  font-cond" role="listbox">
            @foreach($banners as $banner)
            <div class="item @if($loop->first) active @endif">
                <div class="container-fluid" style="background-image: url(/{{ $banner->image }});">
                    <div class="carousel-caption">
                        <div class="slide-name">{{ $banner->title }}</div>
                        <div class="clerarfix"></div>
                        <div class="slide-info">
                            <p>{{ $banner->value }}</p>
                        </div>
                        <div class="clerarfix"></div>
                        <a href="{{ $banner->uri }}" class="btn-sp">подробнее...</a> </div>
                </div>
                <div class="slide-bg"></div>
            </div>
            @endforeach
        </div>
        
        <!-- Controls   --> 
        <a class="left carousel-control" href="#carousel" role="button" data-slide="prev"> <span class="control" aria-hidden="true"><img src="img/ul_o.png" alt=""/></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel" role="button" data-slide="next"> <span class="control" aria-hidden="true"><img src="img/ur_o.png" alt=""/></span> <span class="sr-only">Next</span> </a> </div>
</div>
<!--//slider--> 

<!--service-index-->
<section class="service-index">
    <div class="container-fluid">
        <div class="row">
            <h1>{!! $page['title'] !!}</h1>
        </div>
    </div>
    <div class="container-fluid line-service">
        <ul class="row">
            @foreach($servicesIndex as $service)
            <li class="col-xs-12 col-sm-4">
                <div class="service-item"> <img src="{{ $service->preview }}" alt="{{ $service->title }}"/> <a href="/{{ $service->uri }}" class="overlay">
                    <h2>{{ $service->title }}</h2>
                    <p class="info">{{ $service->anons }}</p>
                    </a> </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>
<!--//service-index--> 

<!--company-index-->
<section class="company-index">
    <div class="container-fluid">
        <div class="row">
            {!! $page['about'] !!}
        </div>
    </div>
</section>
<!--//company-index--> 

<!--section advantages-->
<section class="advantages">
    <div class="container-fluid">
        <div class="row">
            <h3>Наши преимущества</h3>
            {!! $page['advantages'] !!}
        </div>
    </div>
</section>
<!--//section advantages--> 

@include('site.layouts.section_order',['blocks' => $blocks])

<!--section work--> 
<!--<img src="slide_work/w1.png" class="img-responsive" alt=""/>-->

<section class="slidework">
    <div class="container-fluid slide-work">
        <div class="row">
            <h3>Выполненные работы</h3>
            <div class="carousel carousel-showmanymoveone slide" id="carousel123">
                <div class="carousel-inner">
                    @foreach($worksIndex as $work)
                    <div class="item @if($loop->first) active @endif">
                        <div class="col-md-3 col-sm-6 col-xs-12"><a href="/work/{{ $work->uri }}"><img src="{{ $work->preview }}" class="img-responsive" alt="{{ $work->title }}"/>
                            <p>{{ $work->title }}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="left carousel-control" href="#carousel123" data-slide="prev"><img src="img/ul_o.png" alt=""/></a> 
                <a class="right carousel-control" href="#carousel123" data-slide="next"><img src="img/ur_o.png" alt=""/></a> 
            </div>
        </div>
    </div>
</section>
<!--//section work--> 
@endsection