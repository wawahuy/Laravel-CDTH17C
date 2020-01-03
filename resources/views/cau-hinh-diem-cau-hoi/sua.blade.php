@extends('layout')
@section('title', 'Sửa cấu hình điểm câu hỏi')
@section('content-header', 'Quản lí cấu hình điểm câu hỏi')
@section('content')
<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Sửa cấu hình điểm câu hỏi - ID {{$cau_hinh_diem_cau_hoi->id}}</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('cau-hinh-diem-cau-hoi.xu-ly-sua', ["id" => $cau_hinh_diem_cau_hoi->id])}}" method="POST">
      @csrf
        <div class="box-body">
          <div class="form-group">
              <label>Thứ tự</label>
              <input type="number" class="form-control" placeholder="Thứ tự câu hỏi" name="thu_tu" value="{{old('thu_tu')?? $cau_hinh_diem_cau_hoi->thu_tu}}" readonly>
          </div>
          <div class="form-group">
            <label>Điểm</label>
            <input type="number" class="form-control" placeholder="Điểm " name="diem" value="{{old('diem')??$cau_hinh_diem_cau_hoi->diem}}">
        </div>
        </div>
        <!-- /.box-body -->
  
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
      </form>
  </div>

@endsection