@extends('layout')
@section('title', 'Sửa gói credit')
@section('content-header', 'Quản lí gói credit')
@section('content')
<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Sửa gói credit - ID {{$goi_credit->id}}</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('goi-credit.xu-ly-sua', ["id" => $goi_credit->id])}}" method="POST">
    @csrf
      <div class="box-body">
        <div class="form-group">
            <label>Tên gói</label>
            <input type="text" class="form-control" placeholder="" name="tengoi" value="{{old('tengoi') ?? $goi_credit->tengoi}}">
          </div>

        <div class="form-group">
            <label>Số tiền</label>
            <input type="text" class="form-control" placeholder="" name="credit" value="{{old('credit') ?? $goi_credit->credit}}">
          </div>

        <div class="form-group">
            <label>Credit</label>
            <input type="text" class="form-control" placeholder="" name="sotien" value="{{old('sotien') ?? $goi_credit->sotien}}">
          </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Sửa</button>
      </div>
    </form>
  </div>

@endsection