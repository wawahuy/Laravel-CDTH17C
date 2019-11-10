@extends('layout')
@section('title', 'Quản lí lượt chơi')
@section('content-header', 'Quản lí lượt chơi')
@section('content')

<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Người Chơi</th>
                <th>Số Câu</th>
                <th>Điểm</th>
                <th>Ngày giờ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

@foreach ($dsLuotChoi as $luot_choi)
        <tr>
            <td>{{$luot_choi->id}}</td>
            <td>{{$luot_choi->NguoiChoi->tendangnhap}} </td>
            <td>{{$luot_choi->socau}}</td>
            <td>{{$luot_choi->ngaygio}}</td>
            <td>{{$luot_choi->diem}}</td>
            {{-- <td class="pull-right">
              <a class="btn btn-app" href="{{route('.chitiet', ["id" => $luot_choi->id])}}">
                <i class="fa fa-edit "></i> Chi tiết
              </a>
            </td> --}}
        </tr>
@endforeach
        </tbody>
        <tfoot>
              <tr>
                <th>ID</th>
                <th>Tên Người Chơi</th>
                <th>Số Câu</th>
                <th>Điểm</th>
                <th>Ngày giờ</th>
                <th></th>
            </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
@endsection
  