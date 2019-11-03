@php
    $classNameNotif  = [
        "error" => "danger",
        "success" => "success"
    ];
@endphp

@if(is_array($notifications))
    @foreach ($notifications as $notification)
        @if($notification['type'] == '')
            <div class="alert alert-{{$classNameNotif[$notification['level']]}} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> {{ $notification['type'] == 'error' ? "Lỗi" : "Thành công"}}!</h4>
                    {{$notification["message"]}}
            </div>
        @else
            <script>
                $(document).ready(function (){
                    swal('Thông báo', "{{$notification['message']}}", "{{$notification['level']}}");
                });
            </script>
        @endif
    @endforeach
@endif