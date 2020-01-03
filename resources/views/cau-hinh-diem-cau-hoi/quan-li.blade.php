@extends('layout')
@section('title', 'Quản lí cấu hình điểm câu hỏi')
@section('content-header', 'Quản lí cấu hình điểm câu hỏi')
@section('content')

<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <div style="margin:15px 0px 15px 0px; ">
          <a href="{{route('cau-hinh-diem-cau-hoi.them-moi')}}"><button type="button" class="btn btn-default ">Thêm mới <i class="fa fa-fw fa-plus-square-o"></i></button></a>
          <a href="{{route('cau-hinh-diem-cau-hoi.thung-rac')}}"><button type="button" class="btn btn-default">Thùng rác <i class="fa fa-fw fa-trash-o"></i></button></a>
        </div>
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

@foreach ($dsCauHinhDiemCauHoi as $cau_hinh_diem_cau_hoi)
        <tr>
            <td>{{$cau_hinh_diem_cau_hoi->id}}</td>
            <td>{{$cau_hinh_diem_cau_hoi->thu_tu}} </td>
            <td>{{$cau_hinh_diem_cau_hoi->diem}}</td>
            <td class="pull-right">
              <a class="btn btn-app" href="{{route('cau-hinh-diem-cau-hoi.sua', ["id" => $cau_hinh_diem_cau_hoi->id])}}">
                <i class="fa fa-edit "></i> Sửa
              </a>
            <a class="btn btn-app alert-delete disabled" href="{{route('cau-hinh-diem-cau-hoi.xoa', ["id" => $cau_hinh_diem_cau_hoi->id])}}">
                <i class="fa fa-trash"></i> Xóa
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
  