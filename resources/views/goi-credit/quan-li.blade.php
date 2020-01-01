@extends('layout')
@section('title', 'Quản lí gói credit')
@section('content-header', 'Quản lí gói credit')
@section('content')

<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <div style="margin:15px 0px 15px 0px; ">
          <a href="{{route('goi-credit.them-moi')}}"><button type="button" class="btn btn-default ">Thêm mới <i class="fa fa-fw fa-plus-square-o"></i></button></a>
          <a href="{{route('goi-credit.thung-rac')}}"><button type="button" class="btn btn-default">Thùng rác <i class="fa fa-fw fa-trash-o"></i></button></a>
        </div>
        <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên gói</th>
                <th>Credit</th>
                <th>Số tiền</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

@foreach ($dsGoiCredit as $goi_credit)
        <tr>
            <td>{{$goi_credit->id}}</td>
            <td>{{$goi_credit->tengoi}} </td>
            <td>{{$goi_credit->credit}}</td>
            <td>{{$goi_credit->sotien}}</td>
            <td class="pull-right">
              <a class="btn btn-app" href="{{route('goi-credit.sua', ["id" => $goi_credit->id])}}">
                <i class="fa fa-edit "></i> Sửa
              </a>
            <a class="btn btn-app alert-delete disabled" href="{{route('goi-credit.xoa', ["id" => $goi_credit->id])}}">
                <i class="fa fa-trash"></i> Xóa
              </a>
            </td>
        </tr>
@endforeach
        </tbody>
        <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tên gói</th>
                    <th>Credit</th>
                    <th>Số tiền</th>
                    <th></th>
                </tr> 
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
@endsection
  