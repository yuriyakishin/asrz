@extends('admin.layouts.main')

@section('breadcrumb')
<li class="active">Услуги</li>
@endsection

@section('h1')
  <i class="fa fa-fw fa-cog"></i> <span>Услуги</span>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <button onclick="window.location.href = '{{ route('admin.service.create') }}';" type="button" class="btn btn-block btn-primary"><i class="fa fa-plus-circle"></i> Добавить запись</button>
                </div>
            </div>
            <div class="box-body">
		<table id="example2" class="table table-bordered table-hover">
                    <thead>
			<tr>
                            <th>Наименование</th>
                            <th>Сортировка</th>
                            <th></th>
                            <th></th>
			</tr>
                    </thead>
			<tbody>
                            @foreach($rows as $row)
				<tr>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->sort }}</td>
                                    <td><a class="btn btn-info" href="{{ route('admin.service.edit',$row) }}"><i class="fa fa-edit bg"></i></a></td>
                                    <td class="text-right">
                                        <form action="{{ route('admin.service.destroy',$row) }}" onsubmit="if(confirm('Удалить')) { return true } else { return false }" method='POST'>
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">                                            
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-remove"></i></button>
                                        </form>
                                    </td>
				</tr>
                            @endforeach
			</tbody>
		</table>
            </div>

	</div>
    </div>
</div>
@endsection