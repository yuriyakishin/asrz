@extends('admin.layouts.main')

@section('breadcrumb')
<li class="active">Настройки</li>
@endsection

@section('h1')
  <i class="fa fa-fw fa-hdd-o"></i> <span>Настройки</span>
@endsection

@if( isset($page) )
    @push('scripts-bottom')
    <script src="/assets/admin/js/script.js"></script>
    @endpush
@endif

@section('content')
  <form action="{{ route('admin.cmssetting.store') }}" class="form-horizontal" method="post">
  	{{ csrf_field() }}
  	<div class="nav-tabs-custom">
  		<ul class="nav nav-tabs">
  			<li class="active"><a href="#tab_1" data-toggle="tab" onclick="localStorage.setItem('tab', '1');">Блоки на сайте</a></li>
  			<li><a href="#tab_2" data-toggle="tab" onclick="localStorage.setItem('tab', '2');">Контакты</a></li>
  		</ul>
  		<div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @component('admin.layouts.elements.textarea', ['id' => 'top_contact', 'name' => 'block[top_contact]', 
                          'value' => (isset($value['top_contact']) ? $value['top_contact'] : ''), 'label' => 'Контакты вверху сайта'])
                        @endcomponent
                        
                        @component('admin.layouts.elements.textarea', ['id' => 'top_phone', 'name' => 'block[top_phone]', 
                          'value' => (isset($value['top_phone']) ? $value['top_phone'] : ''), 'label' => 'Телефоны вверху сайта'])
                        @endcomponent
                        
                        @component('admin.layouts.elements.textarea', ['id' => 'bottom_contact', 'name' => 'block[bottom_contact]', 
                          'value' => (isset($value['bottom_contact']) ? $value['bottom_contact'] : ''), 'label' => 'Контакты внизу сайта'])
                        @endcomponent
                        
                        @component('admin.layouts.elements.textarea', ['id' => 'bottom_phone', 'name' => 'block[bottom_phone]', 
                          'value' => (isset($value['bottom_phone']) ? $value['bottom_phone'] : ''), 'label' => 'Телефоны внизу сайта'])
                        @endcomponent
                        
                        @component('admin.layouts.elements.textarea', ['id' => 'bottom_text', 'name' => 'block[bottom_text]', 
                          'value' => (isset($value['bottom_text']) ? $value['bottom_text'] : ''), 'label' => 'Подпись внизу сайта'])
                        @endcomponent
                        
                        @component('admin.layouts.elements.textarea', ['id' => 'order_text', 'name' => 'block[order_text]', 
                          'value' => (isset($value['order_text']) ? $value['order_text'] : ''), 'label' => 'Текст в блоке заявок'])
                        @endcomponent
                        
                    </div>
                    <div class="tab-pane" id="tab_2">
                        @component('admin.layouts.elements.text', ['id' => 'email', 'name' => 'block[email]', 
                          'value' => (isset($value['email']) ? $value['email'] : ''), 'label' => 'Контактрый email'])
                        @endcomponent
                        @component('admin.layouts.elements.text', ['id' => 'phone', 'name' => 'block[phone]', 
                          'value' => (isset($value['phone']) ? $value['phone'] : ''), 'label' => 'Контактный телефон'])
                        @endcomponent
                    </div>
  		</div>
  		<div class="box-footer">
  			<button type="submit" class="btn btn-primary">Сохранить</button>
  		</div>
  	</div>
  </form>
@endsection