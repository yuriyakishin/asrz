@extends('admin.layouts.main')
@section('h1','Административная панель управления')

@section('content')
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Здравствуйте, {{ Auth::guard('admin')->user()->name }}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          Вы находитесь в разделе администрирования сайта. Для редактирования страниц и разделов сайта, выберите нужный пункт из меню расположенного в левой части страницы.
        </div>
        <!-- /.box-body -->

</div>
@endsection
