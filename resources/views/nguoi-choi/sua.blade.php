@extends('layout')
@section('title', 'Sửa người chơi')
@section('content-header', 'Quản lý người chơi')
@section('content')
<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Sửa người chơi - ID {{$nguoi_choi->id}}</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('nguoi-choi.xu-ly-sua', ["id" => $nguoi_choi->id])}}" method="POST">
    @csrf
      <div class="box-body">
        
          <div class="form-group text-center">
              <img src="{{asset($nguoi_choi->avatar)}}" />
              <button class="btn" data-href="{{route('nguoi-choi.them-avatar',  $nguoi_choi->id)}}" data-alert="Mở trang sửa avatar, toàn bộ dữ liệu đang nhập sẽ bị mất?">
                  <i class="fa fa fa-edit"></i>
              </button>
            </div>

          <div class="form-group">
              <label>Tên đăng nhập</label>
              <input type="text" readonly class="form-control" placeholder="" name="ten_dang_nhap" value="{{old('ten_dang_nhap') ?? $nguoi_choi->tendangnhap}}">
            </div>
  
          <div class="form-group">
              <label>Mật khẩu</label>
              <div class="input-group">
                <input id="ps" type="password" class="form-control" placeholder="tên lĩnh vực" name="matkhau" value="{{old('matkhau')}}">
                <div class="input-group-addon" data-password="#ps">
                  <i class="fa fa-eye"></i>
                </div>
              </div>
            </div>
  
          <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="tên lĩnh vực" name="email" value="{{old('email') ?? $nguoi_choi->email}}" >
            </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Sửa</button>
      </div>
    </form>
  </div>

@endsection