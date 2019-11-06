@extends('layout')
@section('title', 'Thêm câu hỏi')
@section('content-header', 'Quản lí câu hỏi')
@section('content')
<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Thêm mới</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('cau-hoi.xu-ly-them-moi')}}" method="POST">
    @csrf
      <div class="box-body">

        <div class="form-group">
            <label>Nội dung câu hỏi</label>
            <textarea class="form-control" rows="3" placeholder="Enter ..." name="cauhoi">{{old('cauhoi')}}</textarea>
          </div>

        <div class="form-group">
            <label>Đáp án A</label>
            <input type="text" class="form-control" placeholder="A" name="pan_A" value="{{old('pan_A')}}">
          </div>

        <div class="form-group">
            <label>Đáp án B</label>
            <input type="text" class="form-control" placeholder="B" name="pan_B" value="{{old('pan_B')}}">
          </div>

        <div class="form-group">
            <label>Đáp án C</label>
            <input type="text" class="form-control" placeholder="C" name="pan_C" value="{{old('pan_C')}}">
          </div>

        <div class="form-group">
            <label>Đáp án D</label>
            <input type="text" class="form-control" placeholder="D" name="pan_D" value="{{old('pan_D')}}">
          </div>

        
        <div class="form-group">
                <label>Lĩnh vực:</label>
                <div class="input-group">
                  <select class="form-control" name="linhvuc">
                      <option value="-1">---Chọn---</option>
                      @foreach ($linhvuc as $item)
                          @if($item->id == old('linhvuc'))
                              <option value="{{ $item->id }}" selected>{{ $item->ten_linh_vuc }}</option>
                          @else
                              <option value="{{ $item->id }}">{{ $item->ten_linh_vuc }}</option>
                          @endif
                      @endforeach
                  </select>
                  <div class="input-group-addon" data-href="{{route('linh-vuc.them-moi')}}" data-alert="Đến trang thêm lĩnh vực, toàn bộ dữ liệu đang nhập sẽ bị mất?">
                    <i class="fa fa fa-edit"></i>
                  </div>
                </div>
            </div>

        <div class="form-group">
            <label>Đáp án đúng:</label>
            <select class="form-control" name="dapan">
                <option value="-1">---Chọn---</option>
                @foreach (['A', 'B', 'C', 'D'] as $item)
                    @if($item == old('dapan'))
                        <option value="{{ $item }}" selected>{{ $item }}</option>
                    @else
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endif
                @endforeach
            </select>
        </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>
    </form>
  </div>

@endsection