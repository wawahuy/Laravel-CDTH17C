@extends('layout')
@section('title', 'Thùng rác gói credit')
@section('content-header', 'Thùng rác gói credit')
@section('content')

<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
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

@foreach ($dsGoiCreditDaXoa as $goi_credit)
        <tr>
            <td>{{$goi_credit->id}}</td>
            <td>{{$goi_credit->tengoi}} </td>
            <td>{{$goi_credit->credit}}</td>
            <td>{{$goi_credit->sotien}}</td>
            <td class="pull-right">
                <a class="btn btn-app" href="{{route('goi-credit.xu-ly-thung-rac',["id" => $goi_credit->id])}}">
                    <i class="fa fa-recycle "></i> Restore
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
