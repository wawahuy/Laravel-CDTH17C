@extends('layout')
@section('title', 'Quản lí chi tiết lượt chơi')
@section('content-header', 'Quản lí chi tiết lượt chơi')
@section('content')

<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Người chơi</th>
                <th>Nội dung câu hỏi</th>
                <th>Phương án</th>
                <th>Điểm</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

@foreach ($dsChiTietLuotChoi as $chi_tiet_luot_choi)
        <tr>
            <td>{{$chi_tiet_luot_choi->id}}</td>
            <td>{{$chi_tiet_luot_choi->LuotChoi->NguoiChoi->tendangnhap}} </td>
            <td>{{$chi_tiet_luot_choi->CauHoi->noidung}}</td>
            <td>{{$chi_tiet_luot_choi->CauHoi->dapan}}</td>
            <td>{{$chi_tiet_luot_choi->diem}}</td>
        </tr>
@endforeach
        </tbody>
        <tfoot>
              <tr>
                <th>ID</th>
                <th>Lượt chơi</th>
                <th>Câu hỏi</th>
                <th>Phương án</th>
                <th>Điểm</th>
                <th></th>
            </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
@endsection
  