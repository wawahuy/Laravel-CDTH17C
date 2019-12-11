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
                <th>Avatar</th>
                <th>Tài khoản</th>
                <th>Email</th>
                <th>Điểm cao nhất</th>
                <th>Credit</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

@foreach ($dsNguoiChoiDaXoa as $nguoi_choi)
        <tr>
            <td>{{$nguoi_choi->id}}</td>
            <td>
              <img style="width: 70px; height: 70px;" src="{{asset($nguoi_choi->avatar)}}" title="{{$nguoi_choi->tendangnhap}}" /> 
            </td>
            <td>{{$nguoi_choi->tendangnhap}} </td>
            <td>{{$nguoi_choi->email}}</td>
            <td>{{$nguoi_choi->diemcaonhat}}</td>
            <td>{{$nguoi_choi->credit}}</td>
            <td class="pull-left">
                <a class="btn btn-app" href="{{route('nguoi-choi.xu-ly-thung-rac',["id" => $nguoi_choi->id])}}">
                    <i class="fa fa-recycle "></i> Restore
                  </a>
            </td>
        </tr>
@endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Tài khoản</th>
                <th>Email</th>
                <th>Điểm cao nhất</th>
                <th>Credit</th>
                <th></th>
            </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
@endsection
