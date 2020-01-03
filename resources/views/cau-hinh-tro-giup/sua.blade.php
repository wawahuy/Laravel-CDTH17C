@extends('layout')
@section('title', 'Sửa cấu hình trợ giúp')
@section('content-header', 'Quản lí cấu hình trợ giúp')
@section('content')
<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Sửa cấu hình app - ID {{$cau_hinh_tro_giup->id}}</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('cau-hinh-tro-giup.xu-ly-sua', ["id" => $cau_hinh_tro_giup->id])}}" method="POST">
      @csrf
        <div class="box-body">
          <div class="form-group">
              <label>Loại trợ giúp</label>
              <input type="number" class="form-control" placeholder="Loại trợ giúp" name="loai_tro_giup" value="{{old('loai_tro_giup')?? $cau_hinh_tro_giup->loai_tro_giup}}" readonly>
          </div>
          <div class="form-group">
            <label>Thứ tự </label>
            <input type="number" class="form-control" placeholder="Thứ tự " name="thu_tu" value="{{old('thu_tu')??$cau_hinh_tro_giup->thu_tu}}">
        </div>
        <div class="form-group">
          <label>Credit </label>
          <input type="number" class="form-control" placeholder="Credit " name="credit" value="{{old('credit')??$cau_hinh_tro_giup->credit}}">
      </div>
        </div>
        <!-- /.box-body -->
  
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
      </form>
  </div>

@endsection