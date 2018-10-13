@extends('admin.layouts.main')

@section('breadcrumb')
<li><a href="{{route('admin.job.index')}}">Вакансии</a></li>
<li class="active">{{ !isset($job->id) ? 'Добавить' : 'Редактировать' }}</li>
@endsection

@section('h1')
<i class="fa fa-fw fa-briefcase"></i> <span>Вакансии</span> <small>{{ !isset($job->id) ? 'Добавить' : 'Редактировать' }}</small>
@endsection

@section('content')
    <form action="{{ isset($job->id) ? route('admin.job.update',$job) : route('admin.job.store') }}" class="form-horizontal" method="post">
        @if( isset($job->id) )
            <input type="hidden" name="_method" value="PUT" />
        @endif
  	{{ csrf_field() }}
  	<div class="box box-default">
            <div class="box-body pad">
                <label>Заголовок</label>
                <input type="text" id="title" name="title" class="form-control required" required="required" value="{{ $job->title ?? old('title')}}" />
            </div>
            @component('admin.layouts.elements.wysiwyg', ['id' => 'value', 'name' => 'value', 
                'value' => (isset($job->value) ? $job->value : old('value')), 'attr' => 'required="required"', 'label' => 'Описание'])
            @endcomponent            
            <div class="box-body pad">
                <label>Контакты</label>
                <input type="text" id="contacts" name="contacts" class="form-control" value="{{ $job->contacts ?? old('contacts')}}" />
            </div>
            <div class="box-footer">
                @component('admin.layouts.elements.buttons',['route_index' => 'admin.job.index'])
                @endcomponent
            </div>
  	</div>
    </form>
@endsection
