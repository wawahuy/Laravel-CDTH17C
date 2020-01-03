@extends('layout')
@section('title', 'Thùng rác cấu hình điểm câu hỏi')
@section('content-header', 'Thùng rác cấu hình điểm câu hỏi')
@section('content')

<div class="box">
  <!-- /.box-header -->
  <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
      <thead>
          <tr>
            <th>ID</th>
                <th>Thứ tự</th>
                <th>Điểm</th>
                <th></th>
          </tr>
      </thead>
      <tbody>

@foreach ($dsCauHinhDiemCauHoiDaXoa as $cau_hinh_diem_cau_hoi)
      <tr>
          <td>{{$cau_hinh_diem_cau_hoi->id}}</td>
          <td>{{$cau_hinh_diem_cau_hoi->thu_tu}} </td>
          <td>{{$cau_hinh_diem_cau_hoi->diem}}</td>
          <td class="pull-left">
              <a class="btn btn-app" href="{{route('cau-hinh-diem-cau-hoi.xu-ly-thung-rac',["id" => $cau_hinh_diem_cau_hoi->id])}}">
                  <i class="fa fa-recycle "></i> Restore
                </a>
          </td>
      </tr>
@endforeach
      </tbody>
      <tfoot>
              <tr>
                <th>ID</th>
                <th>Thứ tự</th>
                <th>Điểm</th>
                <th></th>
              </tr> 
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
@endsection
