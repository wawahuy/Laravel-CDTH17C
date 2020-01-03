@extends('layout')
@section('title', 'Thêm cấu hình điểm câu hỏi')
@section('content-header', 'Quản lí cấu hình điểm câu hỏi')
@section('content')
<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Thêm mới cấu hình điểm câu hỏi</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('cau-hinh-diem-cau-hoi.xu-ly-them-moi')}}" method="POST">
    @csrf
      <div class="box-body">
        <div class="form-group">
            <label>Thứ tự</label>
            <input type="number" class="form-control" placeholder="Thứ tự câu hỏi" name="thu_tu" value="{{old('thu_tu')}}">
        </div>
        <div class="form-group">
          <label>Điểm</label>
          <input type="number" class="form-control" placeholder="Điểm" name="diem" value="{{old('diem')}}">
      </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>
    </form>
  </div>

@endsection