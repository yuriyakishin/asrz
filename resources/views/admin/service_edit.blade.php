@extends('admin.layouts.main')

@section('breadcrumb')
<li><a href="{{route('admin.service.index')}}">Услуги</a></li>
<li class="active">{{ !isset($service->id) ? 'Добавить' : 'Редактировать' }}</li>
@endsection

@section('h1')
<i class="fa fa-fw fa-cog"></i> <span>Услуги</span> <small>{{ !isset($service->id) ? 'Добавить' : 'Редактировать' }}</small>
@endsection

@if( isset($service->id) )
    @push('scripts-bottom')
    <script src="/assets/admin/js/script.js"></script>
    @endpush
@endif

@section('content')
<form action="{{ isset($service->id) ? route('admin.service.update',$service) : route('admin.service.store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
  	{{ csrf_field() }}
        @if( isset($service->id) )
            <input type="hidden" name="_method" value="PUT" />
        @endif
  	<div class="nav-tabs-custom">
  		<ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" onclick="localStorage.setItem('tab', '1');">Содержимое страница</a></li>
                    <li><a href="#tab_2" data-toggle="tab" onclick="localStorage.setItem('tab', '2');">Баннер на главной</a></li>
                    <li><a href="#tab_3" data-toggle="tab" onclick="localStorage.setItem('tab', '3');">Meta</a></li>
  		</ul>
  		<div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @component('admin.layouts.elements.text', ['id' => 'title', 'name' => 'title', 
                          'value' => (isset($service->title) ? $service->title : ''), 'label' => 'Название', 'attr' => 'required="required"'])
                        @endcomponent
                        
                        @component('admin.layouts.elements.wysiwyg', ['id' => 'value', 'name' => 'value', 
                          'value' => (isset($service->value) ? $service->value : ''), 'label' => 'Описание', 'help' => 'Для вставки формы обратной связи в текст используйте код [[callback]]'])
                        @endcomponent
                        
                        @component('admin.layouts.elements.text', ['id' => 'uri', 'name' => 'uri', 
                          'value' => (isset($service->uri) ? $service->uri : ''), 'label' => 'URI (код страницы латинскими буквами без пробела)', 
                          'attr' => 'required="required"'])
                        @endcomponent
                        
                        @component('admin.layouts.elements.text', ['id' => 'sort', 'name' => 'sort', 
                          'value' => (isset($service->sort) ? $service->sort : ''), 'label' => 'Сортировка'])
                        @endcomponent                       
                        
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <div class="box-body pad">
                            <label>{!!(isset($service->preview) ? '<img src="/'.$service->preview.'" height="30" /> ' : '')!!}Баннер на главной 534 x 240 пикселей</label>
                            <input type="file" id="" name="preview" class="form-control" value="Закачать баннер"/>
                        </div>
                        @component('admin.layouts.elements.textarea', ['id' => 'anons', 'name' => 'anons', 
                          'value' => (isset($service->anons) ? $service->anons : ''), 'label' => 'Анонс на главной'])
                        @endcomponent
                    </div>
                    <div class="tab-pane" id="tab_3">
                        @component('admin.layouts.elements.meta',['meta' => (isset($meta) ? $meta : [])])
                        @endcomponent
                    </div>
  		</div>
  		<div class="box-footer pad">
                    @component('admin.layouts.elements.buttons',['route_index' => 'admin.service.index'])
                    @endcomponent
  		</div>
  	</div>
</form>
@endsection
