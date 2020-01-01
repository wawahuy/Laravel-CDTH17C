@extends('layout')
@section('title', 'Thêm gói credit')
@section('content-header', 'Quản lí gói credit')
@section('content')
<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Thêm mới gói credit</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('goi-credit.xu-ly-them-moi')}}" method="POST">
    @csrf
      <div class="box-body">

        <div class="form-group">
            <label>Tên gói</label>
            <input type="text" class="form-control" placeholder="tên gói credit" name="tengoi" value="{{old('tengoi')}}">
          </div>

        <div class="form-group">
            <label>Credit</label>
            <input type="number" class="form-control" placeholder="" name="credit" value="{{old('credit')}}">
          </div>

        <div class="form-group">
            <label>Số tiền</label>
            <input type="number" class="form-control" placeholder="" name="sotien" value="{{old('sotien')}}">
          </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>
    </form>
  </div>

@endsection