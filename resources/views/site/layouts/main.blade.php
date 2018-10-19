<!DOCTYPE html>
<html lang="ru">
<head>
<base href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ (isset($meta->title)) ? $meta->title : '' }}</title>
<meta name="description" content="{{ (isset($meta->description)) ? $meta->description : '' }}">
<meta name="keywords" content="{{ (isset($meta->keywords)) ? $meta->keywords : '' }}">
<link rel="apple-touch-icon" sizes="180x180" href="https://www.asrz.net/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="https://www.asrz.net/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="https://www.asrz.net/favicon/favicon-16x16.png">
<link rel="manifest" href="https://www.asrz.net/favicon/site.webmanifest">
<link rel="mask-icon" href="https://www.asrz.net/favicon/safari-pinned-tab.svg" color="#1e50c0">
<link rel="shortcut icon" href="https://www.asrz.net/favicon/favicon.ico">
<meta name="msapplication-TileColor" content="#1e50c0">
<meta name="msapplication-config" content="https://www.asrz.net/favicon/browserconfig.xml">
<meta name="theme-color" content="#1e50c0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="/css/jquery.fancybox-buttons.css">
<link rel="stylesheet" type="text/css" media="all" href="/css/menutop.css" />
<link  rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" type="text/css" href="/css/media.css">
<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed:400" rel="stylesheet">
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<header class="large">
    <!--top-site-->
    <div class="top-site
         @if (Route::currentRouteName() != 'site.index') page @endif">
        <div class="container-fluid">
            <div class="row font-cond">
                <div class="col-sm-5 name-site"><a href="/"><img class="logo" src="img/logo.png" alt=""/></a>
                    <div>Азовский станкоремонтный завод <span>Ремонт и модернизация металлорежущих станков
                        и кузнечно-прессового оборудования</span></div>
                </div>
                <div class="col-sm-2 adres"> <i class="fa fa-map-marker"></i>
                    <div>{!! $blocks['top_contact'] !!}</div>
                </div>
                <div class="col-sm-3 top-phone"> <i class="fa fa-phone"></i>
                    <div>{!! $blocks['top_phone'] !!}</div>
                </div>
                <div class="col-sm-2 call"> <a href="#" data-toggle="modal" data-target="#call" data-whatever="@mdo" class="callback"><i class="fa fa-volume-control-phone"></i>Обратный звонок</a>
                    <div class="mail"><i class="fa fa-envelope"></i><a href="mailto:{{ $blocks['email'] }}">{{ $blocks['email'] }}</a></div>
                </div>
            </div>
        </div>
    </div>

    <!--//top-site-->

    <!--menu top-->
    <div class="wsmenucontainer clearfix">
        <div class="overlapblackbg"></div>
        <div class="wsmobileheader clearfix"> <a id="wsnavtoggle" class="animated-arrow"><span></span></a> <a class="smallogo"><img src="img/logo.png" alt="" /></a> <a class="callusicon" href="tel:{{ $blocks['phone'] }}"><span class="fa fa-phone"></span></a> </div>
        <div class="header">
            <div class="container-fluid top-menu">

                <!--Main Menu HTML Code-->
                <div class="wsmain">
                    <nav class="wsmenu clearfix">
                        <ul class="mobile-sub wsmenu-list">
                            <li class="rightmenu">
                                <form action="/search" class="topmenusearch">
                                    <input type="hidden" name="searchid" value="2331399">
                                    <input type="hidden" name="l10n" value="ru">
                                    <input name="text" placeholder="Поиск по сайту">
                                    <button class="btnstyle"><i class="searchicon fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </li>
                            <li><a href="/" @if (Route::currentRouteName() == 'site.index') class="active" @endif>Главная</a></li>
                            <li><a href="/about" @if (Route::currentRouteName() == 'site.about') class="active" @endif>О компании<span class="arrow fa fa-angle-down"></span></a>
                                <ul class="wsmenu-submenu">
                                    <li><a href="/partner">Партнеры</a></li>
                                    <li><a href="/inform">Полезная информация</a></li>
                                    <li><a href="/sertificat">Сертификаты и разрешения</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Услуги<span class="arrow fa fa-angle-down"></span></a>
                                <ul class="wsmenu-submenu">
                                    @foreach($menuServiceRows as $menuServiceRow)
                                    <li><a href="/{{ $menuServiceRow->uri }}/">{{ $menuServiceRow->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="/work" @if (Route::currentRouteName() == 'site.work') class="active" @endif>Наши работы</a></li>
                            <li><a href="/job" @if (Route::currentRouteName() == 'site.job') class="active" @endif>Вакансии</a></li>
                            <li><a href="/contacts" @if (Route::currentRouteName() == 'site.contacts') class="active" @endif>Контакты</a></li>
                            <li class="menu-hide"><a href="#" data-toggle="modal" data-target="#call" data-whatever="@mdo"><i class="fa fa-volume-control-phone"></i>Обратный звонок</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--//menu top-->
</header>

@if(Route::currentRouteName() == 'site.index')
    @yield('content')
@else
<div class="container wraper">
    <div class="row">
        <div class="col-xs-12">
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                @section('breadcrumb')
                @show                
            </ol>
            @yield('content')
        </div>
    </div>
</div>
@include('site.layouts.section_order')
@endif



<!--footer-->
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 left"> <img src="/img/logo_bt.png" alt=""/>
                <ul>
                    @foreach($menuServiceRows as $menuServiceRow)
                        <li><a href="/{{ $menuServiceRow->uri }}/">{{ $menuServiceRow->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-4 center">
                <div class="item-cnt"> <i class="fa fa-map-marker"></i>
                    <p class="adr">
                        {!! $blocks['bottom_contact'] !!}
                    </p>
                </div>
                <div class="item-cnt"> <i class="fa fa-phone"></i>
                    <p class="phon font-cond">
                        {!! $blocks['bottom_phone'] !!} 
                    </p>
                </div>
                <div class="item-cnt"><i class="fa fa-envelope"></i>
                    <p>E-mail: <a href="mailto:{{ $blocks['email'] }}">{{ $blocks['email'] }}</a>
                </div>
                </p>
            </div>
            <div class="col-sm-4 right">
                <p>&copy; {{ date('Y') }}. ООО АСРЗ</p>
                {!! $blocks['bottom_text'] !!}
                @if (Route::currentRouteName() == 'site.index')
                <div class="rp">Сделано в <a href="https://www.rp-studio.net" target="_blank">RP-Studio</a></div>
                @endif
            </div>
        </div>
    </div>
</footer>
<a href="#" class="scrollup">Наверх</a>
<script src="/js/jquery-1.12.4.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.fancybox.js"></script>
<script src="/js/jquery.fancybox-buttons.js"></script>
<script src="/js/webslidemenu.js"></script>
<script src="/js/wow.min.js"></script>
<script src="/js/scripts.js"></script>
<script src="/js/showslide.min.js"></script>
<script type="text/javascript">
$('.carousel').bcSwipe({ threshold: 50 });
</script>
<script type="text/javascript">

 $('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

			});
  </script>

<!--modal phone-->
<div class="modal fade my" id="call" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="callback-close" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Обратный звонок</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <input type="name" name="callback-name" id="callback-name" class="form-control required" placeholder="Ваше имя">
                    </div>
                    <div class="form-group">
                        <input type="phon" name="callback-phone" id="callback-phone" class="form-control required"  placeholder="Ваш телефон">
                    </div>
                    <div class="form-group">
                        <p class="police">Нажимая кнопку <i>«Отправить»</i>, вы автоматически выражаете согласие на обработку своих персональных данных  и принимаете условия <a href="/politic">Пользовательского соглашения</a>.</p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="callback-send" class="btn">Отправить</button>
            </div>
        </div>
    </div>
</div>
<!--//modal phone-->
<!--modal send-size-->
<div class="modal fade my" id="send-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="order-close" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Заявка на  расчет стоимости ремонта оборудования</h4>
                <p>Заполните и отправьте заявку. Мы свяжемся с вами для уточнения деталей.</p>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <input type="firm" id="order-firm" class="form-control" placeholder="Название предприятия">
                    </div>
                    <div class="form-group">
                        <input type="name" id="order-name" class="form-control required"  placeholder="Ваше имя">
                    </div>
                    <div class="form-group">
                        <input type="prof" id="order-prof" class="form-control"  placeholder="Должность">
                    </div>
                    <div class="form-group">
                        <input type="phon" id="order-phone" class="form-control required"  placeholder="Контактный телефон">
                    </div>
                    <div class="form-group">
                        <input type="mail" id="order-email" class="form-control"  placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <textarea rows="4" id="order-message" class="form-control" placeholder="Сообщение"></textarea>
                    </div>
                    <div class="form-group">
                        <p class="police">Нажимая кнопку <i>«Отправить»</i>, вы автоматически выражаете согласие на обработку своих персональных данных  и принимаете условия <a href="/politic">Пользовательского соглашения</a>.</p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="order-send" class="btn">Отправить</button>
            </div>
        </div>
    </div>
</div>
<!--//modal send-size-->
</body>
</html>
