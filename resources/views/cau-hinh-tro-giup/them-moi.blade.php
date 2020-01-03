@extends('layout')
@section('title', 'Thêm cấu hình trợ giúp')
@section('content-header', 'Quản lí cấu hình trợ giúp')
@section('content')
<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Thêm mới cấu hình trợ giúp</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('cau-hinh-tro-giup.xu-ly-them-moi')}}" method="POST">
    @csrf
      <div class="box-body">
        <div class="box-body">
          <div class="form-group">
              <label>Loại trợ giúp</label>
              <input type="number" class="form-control" placeholder="Loại trợ giúp" name="loai_tro_giup" value="{{old('loai_tro_giup')}}">
          </div>
          <div class="form-group">
            <label>Thứ tự </label>
            <input type="number" class="form-control" placeholder="Thứ tự " name="thu_tu" value="{{old('thu_tu')}}">
        </div>
        <div class="form-group">
          <label>Credit </label>
          <input type="number" class="form-control" placeholder="Credit " name="credit" value="{{old('credit')}}">
      </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>
    </form>
  </div>

@endsection