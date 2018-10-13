@extends('admin.layouts.main')

@section('breadcrumb')
<li><a href="{{route('admin.partner.index')}}">Партнеры</a></li>
<li class="active">{{ !isset($partner->id) ? 'Добавить' : 'Редактировать' }}</li>
@endsection

@section('h1')
<i class="fa fa-fw fa-group"></i> <span>Партнеры</span> <small>{{ !isset($work->id) ? 'Добавить' : 'Редактировать' }}</small>
@endsection

@if( isset($partner->id) )
    @push('scripts-bottom')
    <script src="/assets/admin/js/script.js"></script>
    @endpush
@endif

@section('content')
<form action="{{ isset($partner->id) ? route('admin.partner.update',$partner) : route('admin.partner.store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
  	{{ csrf_field() }}
        @if( isset($partner->id) )
            <input type="hidden" name="_method" value="PUT" />
        @endif
        <div class="box box-default">


                        @component('admin.layouts.elements.text', ['id' => 'title', 'name' => 'title', 
                          'value' => (isset($partner->title) ? $partner->title : ''), 'label' => 'Партнер', 'attr' => 'required="required"'])
                        @endcomponent
                        
                        
                        @component('admin.layouts.elements.text', ['id' => 'sort', 'name' => 'sort', 
                          'value' => (isset($partner->sort) ? $partner->sort : ''), 'label' => 'Сортировка'])
                        @endcomponent
                        


  		<div class="box-footer pad">
                    @component('admin.layouts.elements.buttons',['route_index' => 'admin.partner.index'])
                    @endcomponent
  		</div>
        </div>
</form>
@endsection