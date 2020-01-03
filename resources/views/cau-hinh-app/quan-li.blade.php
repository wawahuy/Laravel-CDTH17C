@extends('layout')
@section('title', 'Quản lí cấu hình app')
@section('content-header', 'Quản lí cấu hình app')
@section('content')

<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <div style="margin:15px 0px 15px 0px; ">
          <a href="{{route('cau-hinh-app.them-moi')}}"><button type="button" class="btn btn-default ">Thêm mới <i class="fa fa-fw fa-plus-square-o"></i></button></a>
          <a href="{{route('cau-hinh-app.thung-rac')}}"><button type="button" class="btn btn-default">Thùng rác <i class="fa fa-fw fa-trash-o"></i></button></a>
        </div>
        <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cơ hội sai</th>
                <th>Thời gian trả lời</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

@foreach ($dsCauHinhApp as $cau_hinh_app)
        <tr>
            <td>{{$cau_hinh_app->id}}</td>
            <td>{{$cau_hinh_app->co_hoi_sai}} </td>
            <td>{{$cau_hinh_app->thoi_gian_tra_loi}}</td>
            <td class="pull-right">
              <a class="btn btn-app" href="{{route('cau-hinh-app.sua', ["id" => $cau_hinh_app->id])}}">
                <i class="fa fa-edit "></i> Sửa
              </a>
            <a class="btn btn-app alert-delete disabled" href="{{route('cau-hinh-app.xoa', ["id" => $cau_hinh_app->id])}}">
                <i class="fa fa-trash"></i> Xóa
              </a>
            </td>
        </tr>
@endforeach
        </tbody>
        <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Cơ hội sai</th>
                  <th>Thời gian trả lời</th>
                  <th></th>
                </tr> 
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
@endsection
  