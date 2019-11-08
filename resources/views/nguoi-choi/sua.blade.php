@extends('layout')
@section('title', 'Thêm lĩnh vực')
@section('content-header', 'Quản lí lĩnh vực')
@section('content')
<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Sửa lĩnh vực - ID {{$linh_vuc->id}}</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('linh-vuc.xu-ly-sua', ["id" => $linh_vuc->id])}}" method="POST">
    @csrf
      <div class="box-body">
        <div class="form-group">
            <label>Tên lĩnh vực</label>
            <input type="text" class="form-control" placeholder="A" name="ten_linh_vuc" value="{{old('ten_linh_vuc') ?? $linh_vuc->ten_linh_vuc}}">
          </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Sửa</button>
      </div>
    </form>
  </div>

@endsection