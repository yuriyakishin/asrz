@extends('admin.layouts.main')

@section('breadcrumb')
<li class="active">{{ strip_tags($config['title']) }}</li>
@endsection

@section('h1')
  {!! $config['title'] !!}
@endsection

@if( isset($page) )
    @push('scripts-bottom')
    <script src="/assets/admin/js/script.js"></script>
    @endpush
@endif

@section('content')
  <form action="{{ route('admin.cmspage.{page}.store',['page'=>$page]) }}" class="form-horizontal" method="post">
  	{{ csrf_field() }}
  	<div class="nav-tabs-custom">
  		<ul class="nav nav-tabs">
  			<li class="active"><a href="#tab_1" data-toggle="tab" onclick="localStorage.setItem('tab', '1');">Содержимое страница</a></li>
  			<li><a href="#tab_2" data-toggle="tab" onclick="localStorage.setItem('tab', '2');">Meta</a></li>
  		</ul>
  		<div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @foreach($config['blocks'] as $block)
                            @component('admin.layouts.elements.'.$block['type'], [
                                'id' => $block['id'],
                                'path_temp' => md5(rand()),
                                'images' => (isset($images) ? $images : []),
                                'name' => 'block['.$block['id'].']',
                                'attr' => (isset($block['attr']) ? $block['attr'] : ''),
                            'value' => (isset($value[$block['id']]) ? $value[$block['id']] : ''), 'label' => $block['label']])
                          @endcomponent
                        @endforeach
                    </div>
                    <div class="tab-pane" id="tab_2">
                        @component('admin.layouts.elements.meta',['meta' => $meta])
                        @endcomponent
                    </div>
  		</div>
  		<div class="box-footer">
  			<button type="submit" class="btn btn-primary">Сохранить</button>
  		</div>
  	</div>
  </form>
@endsection
