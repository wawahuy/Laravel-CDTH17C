@extends('layout')
@section('title', 'Thêm người chơi')
@section('content-header', 'Quản lí người chơi')
@section('content')
<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Thêm mới người chơi</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('nguoi-choi.xu-ly-them-moi')}}" method="POST">
    @csrf
      <div class="box-body">

        <div class="form-group">
            <label>Tên đăng nhập</label>
            <input type="text" class="form-control" placeholder="Tên đăng nhập" name="ten_dang_nhap" value="{{old('ten_dang_nhap')}}">
          </div>

        <div class="form-group">
            <label>Mật khẩu</label>
            <div class="input-group">
              <input id="ps" type="password" class="form-control" placeholder="Mật khẩu" name="matkhau" value="{{old('matkhau')}}">
              <div class="input-group-addon" data-password="#ps">
                <i class="fa fa-eye"></i>
              </div>
            </div>
          </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
          </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>
    </form>
  </div>

@endsection