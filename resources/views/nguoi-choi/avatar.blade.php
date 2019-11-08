@extends('layout')
@section('title', 'Cập nhật Avatar')
@section('content-header', 'Cập nhật Avatar')
@section('content')
<link rel="stylesheet" href="{{asset('css/croppie.css')}}">

<div class="box box-primary">


    <div class="box-header with-border">
      <h3 class="box-title">Avatar - {{$nguoi_choi->tendangnhap}}</h3>
    </div>

    <!-- /.box-header -->
    <!-- form start -->

    <form>
        <div class="box-body">
            <div class="form-group text-center">
              <div id="upload-demo" style="width:350px; display: inline-block"></div>
            </div>

            <div class="form-group text-center">
                <input type="file" id="upload" style="margin-left: 100px; width:350px; display: inline-block">
            </div>
        </div>

        <div class="box-footer">
          <button class="btn btn-success upload-result" disabled>Tải lên</button>
        </div>
    </form>


  </div>


  <script src="{{asset('js/croppie.js')}}"></script>
  <script type="text/javascript">


    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
    });
    
    
    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'circle'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });
    
    
    $('#upload').on('change', function () { 
        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('.upload-result').prop('disabled', false);
    });
    
    
    $('.upload-result').on('click', function (ev) {
        $('.upload-result').prop('disabled', true);

        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
            $.ajax({
                url: "{{route('nguoi-choi.xu-ly-them-avatar', $nguoi_choi->id)}}",
                type: "POST",
                data: {"image":resp},
                success: function (data) {
                    if(data.code == 200){
                        type = "success";
                    } else {
                        type = "error";
                    }
                    toastr[type](data.message);
        
                    $('.upload-result').prop('disabled', false);
                }
            });
        });
    });
    
    
    </script>


@endsection