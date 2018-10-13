@extends('admin.layouts.main')

@section('breadcrumb')
<li><a href="{{route('admin.banner.index')}}">Баннеры на главной странице</a></li>
<li class="active">{{ !isset($banner->id) ? 'Добавить' : 'Редактировать' }}</li>
@endsection

@section('h1')
<i class="fa fa-fw fa-image"></i> <span>Баннеры на главной странице</span> <small>{{ !isset($banner->id) ? 'Добавить' : 'Редактировать' }}</small>
@endsection

@if( isset($banner->id) )
    @push('scripts-bottom')
    <script src="/assets/admin/js/script.js"></script>
    @endpush
@endif

@section('content')
<form action="{{ isset($banner->id) ? route('admin.banner.update',$banner) : route('admin.banner.store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
  	{{ csrf_field() }}
        @if( isset($banner->id) )
            <input type="hidden" name="_method" value="PUT" />
        @endif
        <div class="box box-default">


                        @component('admin.layouts.elements.text', ['id' => 'title', 'name' => 'title', 
                          'value' => (isset($banner->title) ? $banner->title : ''), 'label' => 'Заголовок', 'attr' => 'required="required"'])
                        @endcomponent
                        
                        @component('admin.layouts.elements.textarea', ['id' => 'value', 'name' => 'value', 
                          'value' => (isset($banner->value) ? $banner->value : ''), 'label' => 'Описание'])
                        @endcomponent
                        
                        @component('admin.layouts.elements.text', ['id' => 'uri', 'name' => 'uri', 
                          'value' => (isset($banner->uri) ? $banner->uri : ''), 'label' => 'Ссылка URL на раздел', 
                          'attr' => 'required="required"'])
                        @endcomponent
                        
                        @component('admin.layouts.elements.text', ['id' => 'sort', 'name' => 'sort', 
                          'value' => (isset($banner->sort) ? $banner->sort : ''), 'label' => 'Сортировка'])
                        @endcomponent
                        
                        <div class="box-body pad">
                            <label>{!!(isset($banner->image) ? '<img src="/'.$banner->image.'" height="30" /> ' : '')!!}Баннер 1900x652 px</label>
                            <input type="file" id="" name="image" class="form-control" value="Закачать баннер"/>
                        </div>


  		<div class="box-footer pad">
                    @component('admin.layouts.elements.buttons',['route_index' => 'admin.banner.index'])
                    @endcomponent
  		</div>
        </div>
</form>
@endsection
