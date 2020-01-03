@extends('layout')
@section('title', 'Quản lí cấu hình trợ giúp')
@section('content-header', 'Quản lí cấu hình trợ giúp')
@section('content')

<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <div style="margin:15px 0px 15px 0px; ">
          <a href="{{route('cau-hinh-tro-giup.them-moi')}}"><button type="button" class="btn btn-default ">Thêm mới <i class="fa fa-fw fa-plus-square-o"></i></button></a>
          <a href="{{route('cau-hinh-tro-giup.thung-rac')}}"><button type="button" class="btn btn-default">Thùng rác <i class="fa fa-fw fa-trash-o"></i></button></a>
        </div>
        <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Loại trợ giúp</th>
                <th>Thứ tự</th>
                <th>Credit</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

@foreach ($dsCauHinhTroGiup as $cau_hinh_tro_giup)
        <tr>
            <td>{{$cau_hinh_tro_giup->id}}</td>
            <td>{{$cau_hinh_tro_giup->loai_tro_giup}} </td>
            <td>{{$cau_hinh_tro_giup->thu_tu}}</td>
            <td>{{$cau_hinh_tro_giup->credit}}</td>
            <td class="pull-right">
              <a class="btn btn-app" href="{{route('cau-hinh-tro-giup.sua', ["id" => $cau_hinh_tro_giup->id])}}">
                <i class="fa fa-edit "></i> Sửa
              </a>
            <a class="btn btn-app alert-delete disabled" href="{{route('cau-hinh-tro-giup.xoa', ["id" => $cau_hinh_tro_giup->id])}}">
                <i class="fa fa-trash"></i> Xóa
              </a>
            </td>
        </tr>
@endforeach
        </tbody>
        <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Loại trợ giúp</th>
                  <th>Thứ tự</th>
                  <th>Credit</th>
                  <th></th>
                </tr> 
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
@endsection
  