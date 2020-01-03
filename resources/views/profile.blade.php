@extends('layout')
@section('title', 'Thông tin quản trị viên')
@section('content-header', 'Thông tin quản trị viên')
@section('content')

<div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="{{asset('img/user2-160x160.jpg')}}" alt="User profile picture">
          @if(Auth::check())
            <h3 class="profile-username text-center">{{Auth::user()->ho_ten}}</h3>
          @endif
          <p class="text-muted text-center">Software Engineer</p>

          <ul class="list-group list-group-unbordered center">
            <li class="list-group-item">
                <b>Họ tên:    {{Auth::user()->ho_ten}}</b>
            </li>
            <li class="list-group-item">
               <b>Tài khoản:    {{Auth::user()->tai_khoan}}</b>
            </li>
          </ul>

          <a href="#" class="btn btn-primary btn-block"><b>Liên hệ</b></a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">About Me</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-book margin-r-5"></i> Giáo dục</strong>

          <p class="text-muted">
            Cao đẳng kĩ thuật Cao Thắng
          </p>

          <hr>

          <strong><i class="fa fa-map-marker margin-r-5"></i> Địa chỉ</strong>

          <p class="text-muted">65 Huỳnh Thúc Kháng, phường Bến Nghé, quận 1, TP Hồ Chí Minh</p>

          <hr>

          <strong><i class="fa fa-pencil margin-r-5"></i> Kĩ năng</strong>

          <p>
            <span class="label label-danger">UI Design</span>
            <span class="label label-success">Coding</span>
            <span class="label label-info">Javascript</span>
            <span class="label label-warning">PHP</span>
            <span class="label label-primary">Node.js</span>
          </p>

          <hr>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li><a href="#settings" data-toggle="tab"> <h4>Cập nhật thông tin</h4> </a></li>
        </ul>
          <div class="tab-pane" id="settings">
        <form class="form-horizontal" role="form" action="{{route('profile.xu-ly-cap-nhap')}}" method="POST">
            @csrf
            <div class="form-group">
                <label class="col-sm-2 control-label">Tài khoản</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tai_khoan" value="{{Auth::user()->tai_khoan}}" readonly >
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Họ và tên</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="ho_ten" placeholder="Nhập tên mới">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Mật khẩu</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="mat_khau" placeholder="Nhập mật khẩu mới">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Tôi đồng ý với các  <a href="#">điều khoản!</a>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger">Cập nhật </button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
    
@endsection
