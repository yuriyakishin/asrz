@extends('site.layouts.main')

@section('breadcrumb')
  <li class="active">Ошибка 404</li>
@endsection

@section('content')
                <div class="col-sm-6"><img src="img/logo_er.png" alt=""/></div>
                <div class="col-sm-6 error">
                    <h1>Ошибка 404</h1>
                    <p>Данной страницы на сайте не существует.</p>
                </div>
@endsection