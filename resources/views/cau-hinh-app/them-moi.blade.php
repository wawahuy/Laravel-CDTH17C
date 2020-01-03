@extends('layout')
@section('title', 'Thêm cấu hình app')
@section('content-header', 'Quản lí cấu hình app')
@section('content')
<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Thêm mới cấu hình app</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('cau-hinh-app.xu-ly-them-moi')}}" method="POST">
    @csrf
      <div class="box-body">
        <div class="form-group">
            <label>Cơ hội sai</label>
            <input type="number" class="form-control" placeholder="Cơ hội sai" name="co_hoi_sai" value="{{old('co_hoi_sai')}}">
        </div>
        <div class="form-group">
          <label>Thời gian trả lời</label>
          <input type="number" class="form-control" placeholder="Thời gian trả lời" name="thoi_gian_tra_loi" value="{{old('thoi_gian_tra_loi')}}">
      </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>
    </form>
  </div>

@endsection