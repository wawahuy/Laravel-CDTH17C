@extends('layout')
@section('title', 'Quản lí quản trị viên')
@section('content-header', 'Quản lí quản trị viên')
@section('content')

<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <div style="margin:15px 0px 15px 0px; ">
          <a href="{{route('quan-tri-vien.them-moi')}}"><button type="button" class="btn btn-default ">Thêm mới <i class="fa fa-fw fa-plus-square-o"></i></button></a>
          <a href="{{route('quan-tri-vien.thung-rac')}}"><button type="button" class="btn btn-default">Thùng rác <i class="fa fa-fw fa-trash-o"></i></button></a>
        </div>
        <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Tên quản trị viên</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

@foreach ($dsQuanTriVien as $quan_tri_vien)
        <tr>
            <td>{{$quan_tri_vien->id}}</td>
            <td>{{$quan_tri_vien->tai_khoan}} </td>
            <td>{{$quan_tri_vien->ho_ten}}</td>
            <td class="pull-right">
              <a class="btn btn-app" href="{{route('quan-tri-vien.sua', ["id" => $quan_tri_vien->id])}}">
                <i class="fa fa-edit "></i> Sửa
              </a>
            <a class="btn btn-app alert-delete disabled" href="{{route('quan-tri-vien.xoa', ["id" => $quan_tri_vien->id])}}">
                <i class="fa fa-trash"></i> Xóa
              </a>
            </td>
        </tr>
@endforeach
        </tbody>
        <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Tên quản trị viên</th>
                  <th></th>
                </tr> 
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
@endsection
  