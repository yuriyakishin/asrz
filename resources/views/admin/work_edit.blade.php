@extends('admin.layouts.main')

@section('breadcrumb')
<li><a href="{{route('admin.work.index')}}">Наши работы</a></li>
<li class="active">{{ !isset($work->id) ? 'Добавить' : 'Редактировать' }}</li>
@endsection

@section('h1')
<i class="fa fa-fw fa-gears"></i> <span>Наши работы</span> <small>{{ !isset($work->id) ? 'Добавить' : 'Редактировать' }}</small>
@endsection

@if( isset($work->id) )
    @push('scripts-bottom')
    <script src="/assets/admin/js/script.js"></script>
    @endpush
@endif

@section('content')
<form action="{{ isset($work->id) ? route('admin.work.update',$work) : route('admin.work.store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
  	{{ csrf_field() }}
        @if( isset($work->id) )
            <input type="hidden" name="_method" value="PUT" />
        @endif
  	<div class="nav-tabs-custom">
  		<ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" onclick="localStorage.setItem('tab', '1');">Содержимое страница</a></li>
                    <li><a href="#tab_2" data-toggle="tab" onclick="localStorage.setItem('tab', '2');">Фотогалерея</a></li>
                    <li><a href="#tab_3" data-toggle="tab" onclick="localStorage.setItem('tab', '3');">Meta</a></li>
  		</ul>
  		<div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @component('admin.layouts.elements.text', ['id' => 'title', 'name' => 'title', 
                          'value' => (isset($work->title) ? $work->title : ''), 'label' => 'Название', 'attr' => 'required="required"'])
                        @endcomponent
                        
                        @component('admin.layouts.elements.wysiwyg', ['id' => 'value', 'name' => 'value', 
                          'value' => (isset($work->value) ? $work->value : ''), 'label' => 'Описание'])
                        @endcomponent
                        
                        @component('admin.layouts.elements.text', ['id' => 'uri', 'name' => 'uri', 
                          'value' => (isset($work->uri) ? $work->uri : ''), 'label' => 'URI (код страницы латинскими буквами без пробела)', 
                          'attr' => 'required="required"'])
                        @endcomponent
                        
                        @component('admin.layouts.elements.text', ['id' => 'sort', 'name' => 'sort', 
                          'value' => (isset($work->sort) ? $work->sort : ''), 'label' => 'Сортировка'])
                        @endcomponent
                        
                        <div class="box-body pad">
                            <label>{!!(isset($work->preview) ? '<img src="/'.$work->preview.'" height="30" /> ' : '')!!}Превью 330х238 пикселей</label>
                            <input type="file" id="" name="preview" class="form-control" value="Закачать превью"/>
                        </div>
                        <div class="box-body pad">
                            <label>{!!(isset($work->image) ? '<img src="/'.$work->image.'" height="30" /> ' : '')!!}Большая картинка</label>
                            <input type="file" id="" name="image" class="form-control" value="Закачать картинку"/>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_2">
                        @component('admin.layouts.elements.images', [
                        'path_temp' => md5(rand()),
                        'images' => (isset($images) ? $images : [])
                        ])
                        @endcomponent
                    </div>
                    <div class="tab-pane" id="tab_3">
                        @component('admin.layouts.elements.meta',['meta' => (isset($meta) ? $meta : [])])
                        @endcomponent
                    </div>
  		</div>
  		<div class="box-footer pad">
                    @component('admin.layouts.elements.buttons',['route_index' => 'admin.work.index'])
                    @endcomponent
  		</div>
  	</div>
</form>
@endsection
