@extends('admin.layouts.main')

@section('breadcrumb')
<li class="active">Профиль</li>
@endsection

@section('h1')
  <i class="fa fa-fw fa-group"></i> <span>Профиль администратора сайта</span>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body box-profile"> <img class="profile-user-img img-responsive img-circle" src="{{ Auth::guard('admin')->user()->photo }}" alt="{{ Auth::guard('admin')->user()->name }}">
            <h3 class="profile-username text-center">{{ Auth::guard('admin')->user()->name }}</h3>
            <p class="text-muted text-center">Администратор сайта</p>
                
            
            <div>
                <form action="{{ route('admin.profile.update') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        @component('admin.layouts.elements.text', ['id' => 'name', 'name' => 'name', 
                          'value' => (isset($profile->name) ? $profile->name : ''), 'label' => 'Имя', 'attr' => 'required="required"'])
                        @endcomponent
                        
                        @component('admin.layouts.elements.text', ['id' => 'email', 'name' => 'email', 
                          'value' => (isset($profile->email) ? $profile->email : ''), 'label' => 'Email', 'attr' => 'required="required"'])
                        @endcomponent
                        
                        <div class="box-body pad">
                            <label>Новый пароль</label>
                            <input type="password" id="password" name="password" class="form-control"/>
                        </div>
                        
                        <div class="box-body pad">
                            <label>Фото</label>
                            <input type="file" id="photo" name="photo" class="form-control" value="Фото"/>
                        </div>         

                        <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                </form>
        </div>
            
            
        </div>
    </div>
</div>
@endsection