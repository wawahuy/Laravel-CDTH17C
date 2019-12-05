@extends('layout')
@section('title', 'Sửa quản trị viên')
@section('content-header', 'Quản lí quản trị viên')
@section('content')
<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Sửa quản trị viên - ID {{$quan_tri_vien->id}}</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('quan-tri-vien.xu-ly-sua', ["id" => $quan_tri_vien->id])}}" method="POST">
    @csrf
      <div class="box-body">
        <div class="form-group">
            <label>Họ tên quản trị viên</label>
            <input type="text" class="form-control" placeholder="" name="ho_ten" value="{{old('ho_ten') ?? $quan_tri_vien->ho_ten}}">
        </div>
        <div class="form-group">
          <label>Tài khoản</label>
          <input type="text" class="form-control" placeholder="" name="tai_khoan" value="{{old('tai_khoan') ?? $quan_tri_vien->tai_khoan}}" readonly>
      </div>
      <div class="form-group">
        <label>Mật khẩu</label>
        <input type="text" class="form-control" placeholder="" name="mat_khau" value="">
    </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Sửa</button>
      </div>
    </form>
  </div>

@endsection