@extends('layout')
@section('title', 'Thùng rác cấu hình trợ giúp')
@section('content-header', 'Thùng rác trợ giúp')
@section('content')

<div class="box">
  <!-- /.box-header -->
  <div class="box-body">
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

@foreach ($dsCauHinhTroGiupDaXoa as $cau_hinh_tro_giup)
      <tr>
        <td>{{$cau_hinh_tro_giup->id}}</td>
        <td>{{$cau_hinh_tro_giup->loai_tro_giup}} </td>
        <td>{{$cau_hinh_tro_giup->thu_tu}}</td>
        <td>{{$cau_hinh_tro_giup->credit}}</td>
          <td class="pull-left">
              <a class="btn btn-app" href="{{route('cau-hinh-tro-giup.xu-ly-thung-rac', ["id" => $cau_hinh_tro_giup->id])}}">
                  <i class="fa fa-recycle "></i> Restore
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
