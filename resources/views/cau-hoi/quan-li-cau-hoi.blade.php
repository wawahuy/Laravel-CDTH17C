@extends('layout')
@section('title', 'Quản lí câu hỏi')
@section('content-header', 'Quản lí câu hỏi')
@section('content')

<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nội dung</th>
                <th>Lĩnh vực</th>
                <th>Phương án A</th>
                <th>Phương án B</th>
                <th>Phương án C</th>
                <th>Phương án D</th>
                <th>Đáp án</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

@foreach ($dsCauHoi as $cauhoi)
        <tr>
            <td>{{$cauhoi->id}}</td>
            <td>{{$cauhoi->noidung}} </td>
            <td>{{$cauhoi->LinhVuc->ten_linh_vuc}}</td>
            <td>{{$cauhoi->phuongan_A}}</td>
            <td>{{$cauhoi->phuongan_B}}</td>
            <td>{{$cauhoi->phuongan_C}}</td>
            <td>{{$cauhoi->phuongan_D}}</td>
            <td>{{$cauhoi->dapan}}</td>
            <td>
              <a class="btn btn-app" href="{{route('cau-hoi.sua', ["id" => $cauhoi->id])}}">
                <i class="fa fa-edit "></i> Sửa
              </a>
            <a class="btn btn-app alert-delete disabled" href="{{route('cau-hoi.xoa', ["id" => $cauhoi->id])}}">
                <i class="fa fa-trash"></i> Xóa
              </a>
            </td>
        </tr>
@endforeach
        </tbody>
        <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nội dung</th>
                  <th>Lĩnh vực</th>
                  <th>Phương án A</th>
                  <th>Phương án B</th>
                  <th>Phương án C</th>
                  <th>Phương án D</th>
                  <th>Đáp án</th>
                  <th></th>
                </tr> 
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
@endsection
  