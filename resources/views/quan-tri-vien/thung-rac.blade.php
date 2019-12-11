@extends('layout')
@section('title', 'Thùng rác gói credit')
@section('content-header', 'Thùng rác gói credit')
@section('content')

<div class="box">
  <!-- /.box-header -->
  <div class="box-body">
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

@foreach ($dsQuanTriVienDaXoa as $quan_tri_vien)
      <tr>
          <td>{{$quan_tri_vien->id}}</td>
          <td>{{$quan_tri_vien->tai_khoan}} </td>
          <td>{{$quan_tri_vien->ho_ten}}</td>
          <td class="pull-left">
              <a class="btn btn-app" href="{{route('quan-tri-vien.xu-ly-thung-rac',["id" => $quan_tri_vien->id])}}">
                  <i class="fa fa-recycle "></i> Restore
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
