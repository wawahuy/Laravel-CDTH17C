@extends('layout')
@section('title', 'Thêm lĩnh vực')
@section('content-header', 'Quản lí lĩnh vực')
@section('content')
<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Thêm mới</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('linh-vuc.xu-ly-them-moi')}}" method="POST">
    @csrf
      <div class="box-body">

        <div class="form-group">
            <label>Tên lĩnh vực</label>
            <input type="text" class="form-control" placeholder="tên lĩnh vực" name="ten_linh_vuc" value="{{old('ten_linh_vuc')}}">
          </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>
    </form>
  </div>

@endsection