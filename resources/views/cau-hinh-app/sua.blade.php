@extends('layout')
@section('title', 'Sửa cấu hình app')
@section('content-header', 'Quản lí cấu hình app')
@section('content')
<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Sửa cấu hình app - ID {{$cau_hinh_app->id}}</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('cau-hinh-app.xu-ly-sua', ["id" => $cau_hinh_app->id])}}" method="POST">
      @csrf
        <div class="box-body">
          <div class="form-group">
              <label>Cơ hội sai</label>
              <input type="number" class="form-control" placeholder="Cơ hội sai" name="co_hoi_sai" value="{{old('co_hoi_sai')?? $cau_hinh_app->co_hoi_sai}}" readonly>
          </div>
          <div class="form-group">
            <label>Thời gian trả lời</label>
            <input type="number" class="form-control" placeholder="Thời gian trả lời" name="thoi_gian_tra_loi" value="{{old('thoi_gian_tra_loi')??$cau_hinh_app->thoi_gian_tra_loi}}">
        </div>
        </div>
        <!-- /.box-body -->
  
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
      </form>
  </div>

@endsection