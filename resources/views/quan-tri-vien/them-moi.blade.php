@extends('layout')
@section('title', 'Thêm quản trị viên')
@section('content-header', 'Quản lí quản trị viên')
@section('content')
<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Thêm mới quản trị viên</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('quan-tri-vien.xu-ly-them-moi')}}" method="POST">
    @csrf
      <div class="box-body">
        <div class="form-group">
            <label>Họ tên quản trị viên</label>
            <input type="text" class="form-control" placeholder="Họ tên quản trị viên" name="ho_ten" value="{{old('ho_ten')}}">
        </div>
        <div class="form-group">
          <label>Tài khoản</label>
          <input type="text" class="form-control" placeholder="Tài khoản" name="tai_khoan" value="{{old('tai_khoan')}}">
      </div>
      <div class="form-group">
        <label>Mật khẩu</label>
        <input type="text" class="form-control" placeholder="Mật khẩu" name="mat_khau" value="{{old('mat_khau')}}">
    </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>
    </form>
  </div>

@endsection