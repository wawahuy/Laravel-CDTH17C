@extends('layout')
@section('title', 'Thùng rác cấu hình app')
@section('content-header', 'Thùng rác app')
@section('content')

<div class="box">
  <!-- /.box-header -->
  <div class="box-body">
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

@foreach ($dsCauHinhAppDaXoa as $cau_hinh_app)
      <tr>
          <td>{{$cau_hinh_app->id}}</td>
          <td>{{$cau_hinh_app->co_hoi_sai}} </td>
          <td>{{$cau_hinh_app->thoi_gian_tra_loi}}</td>
          <td class="pull-left">
              <a class="btn btn-app" href="{{route('cau-hinh-app.xu-ly-thung-rac',["id" => $cau_hinh_app->id])}}">
                  <i class="fa fa-recycle "></i> Restore
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
