<ul class="sidebar-menu" data-widget="tree">
    <li class="header">РАЗДЕЛЫ САЙТА</li>
    <li @if (isset(Route::current()->parameters()['page']) && Route::current()->parameters()['page'] == 'home') class="active" @endif ><a href="{{ route('admin.cmspage.{page}.index',['page'=>'home']) }}"><i class="fa fa-fw fa-home"></i> <span>Главная страница</span></a></li>
    <li @if (isset(Route::current()->parameters()['page']) && Route::current()->parameters()['page'] == 'about') class="active" @endif ><a href="{{ route('admin.cmspage.{page}.index',['page'=>'about']) }}"><i class="fa fa-fw fa-commenting"></i> <span>О компании</span></a></li>
    <li @if (Route::current()->getName() == 'admin.service.index') class="active" @endif ><a href="{{ route('admin.service.index') }}"><i class="fa fa-fw fa-cog"></i> <span>Услуги</span></a></li>

    <li class="treeview
        @if (isset(Route::current()->parameters()['page']) && Route::current()->parameters()['page'] == 'work') active @endif
        @if (Route::current()->getName() == 'admin.work.index') active @endif
        "><a href="#"><i class="fa fa-fw fa-gears"></i> <span>Наши работы</span></a>
            <ul class="treeview-menu">
                <li @if (isset(Route::current()->parameters()['page']) && Route::current()->parameters()['page'] == 'work') class="active" @endif><a href="{{ route('admin.cmspage.{page}.index',['page'=>'work']) }}"><i class="fa fa-angle-right"></i> Описание</a></li>
                <li @if (Route::current()->getName() == 'admin.work.index') class="active" @endif ><a href="{{ route('admin.work.index') }}"><i class="fa fa-angle-right"></i> Список работ</a></li>
            </ul>
    </li>
    
    <li @if (isset(Route::current()->parameters()['page']) && Route::current()->parameters()['page'] == 'sertificat') class="active" @endif ><a href="{{ route('admin.cmspage.{page}.index',['page'=>'sertificat']) }}"><i class="fa fa-fw fa-file-powerpoint-o"></i> <span>Сертификаты</span></a></li>
    
    <li class="treeview
        @if (isset(Route::current()->parameters()['page']) && Route::current()->parameters()['page'] == 'partner') active @endif
        @if (Route::current()->getName() == 'admin.partner.index') active @endif
        "><a href="#"><i class="fa fa-fw fa-group"></i> <span>Партнеры</span></a>
            <ul class="treeview-menu">
                <li @if (isset(Route::current()->parameters()['page']) && Route::current()->parameters()['page'] == 'partner') class="active" @endif><a href="{{ route('admin.cmspage.{page}.index',['page'=>'partner']) }}"><i class="fa fa-angle-right"></i> Описание</a></li>
                <li @if (Route::current()->getName() == 'admin.partner.index') class="active" @endif ><a href="{{ route('admin.partner.index') }}"><i class="fa fa-angle-right"></i> Список партнеров</a></li>
            </ul>
    </li>

    <li class="treeview
      @if (isset(Route::current()->parameters()['page']) && Route::current()->parameters()['page'] == 'job') active @endif
      @if (Route::current()->getName() == 'admin.job.index') active @endif
      "><a href="#"><i class="fa fa-fw fa-briefcase"></i> <span>Вакансии</span></a>
        <ul class="treeview-menu">
            <li @if (isset(Route::current()->parameters()['page']) && Route::current()->parameters()['page'] == 'job') class="active" @endif><a href="{{ route('admin.cmspage.{page}.index',['page'=>'job']) }}"><i class="fa fa-angle-right"></i> Описание</a></li>
            <li @if (Route::current()->getName() == 'admin.job.index') class="active" @endif ><a href="{{ route('admin.job.index') }}"><i class="fa fa-angle-right"></i> Список вакансий</a></li>
        </ul>
    </li>
    <li @if (isset(Route::current()->parameters()['page']) && Route::current()->parameters()['page'] == 'inform') class="active" @endif ><a href="{{ route('admin.cmspage.{page}.index',['page'=>'inform']) }}"><i class="fa fa-fw fa-newspaper-o"></i> <span>Полезная информация</span></a></li>
    <li @if (isset(Route::current()->parameters()['page']) && Route::current()->parameters()['page'] == 'contacts') class="active" @endif ><a href="{{ route('admin.cmspage.{page}.index',['page'=>'contacts']) }}"><i class="fa fa-fw fa-compass"></i> <span>Контактная информация</span></a></li>
    <li class="header">НАСТРОЙКИ</li>
    <li @if (Route::current()->getName() == 'admin.banner.index') class="active" @endif ><a href="{{ route('admin.banner.index') }}"><i class="fa fa-fw fa-image"></i> <span>Баннеры</span></a></li>
    
    <li @if (Route::current()->getName() == 'admin.cmssetting.index') class="active" @endif ><a href="{{ route('admin.cmssetting.index') }}"><i class="fa fa-fw fa-hdd-o"></i> <span>Настройки</span></a></li>
    <li @if (isset(Route::current()->parameters()['page']) && Route::current()->parameters()['page'] == 'politic') class="active" @endif ><a href="{{ route('admin.cmspage.{page}.index',['page'=>'politic']) }}"><i class="fa fa-fw fa-hand-pointer-o"></i> <span>Пользовательское<br/>соглашение</span></a></li>
</ul>
