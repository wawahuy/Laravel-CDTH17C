@extends('layout')
@section('title', 'Thùng rác lĩnh vực')
@section('content-header', 'Thùng rác lĩnh vực')
@section('content')

<div class="box">
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
          <tr>
              <th>ID</th>
              <th>Tên lĩnh vực</th>
              <th>Số câu hỏi</th>
              <th></th>
          </tr>
      </thead>
      <tbody>

@foreach ($dsLinhVucDaXoa as $linh_vuc)
      <tr>
          <td>{{$linh_vuc->id}}</td>
          <td>{{$linh_vuc->ten_linh_vuc}} </td>
          <td>{{$linh_vuc->soLuongCauHoi}}</td>
          <td class="pull-left">
              <a class="btn btn-app" href="{{route('linh-vuc.xu-ly-thung-rac',["id" => $linh_vuc->id])}}">
                  <i class="fa fa-recycle "></i> Restore
                </a>
          </td>
      </tr>
@endforeach
      </tbody>
      <tfoot>
              <tr>
                  <th>ID</th>
                  <th>Tên lĩnh vực</th>
                  <th>Số câu hỏi</th>
                  <th></th>
              </tr> 
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
@endsection
