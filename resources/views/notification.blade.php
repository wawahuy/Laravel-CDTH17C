@php
    $classNameNotif  = [
        "error" => "error",
        "success" => "success"
    ];
@endphp

<script>
    $(document).ready(function (){
        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "10000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }
    });
</script>

@if(is_array($notifications))
    @foreach ($notifications as $notification)
        @if($notification['type'] == '')
            {{-- <div class="alert alert-{{$classNameNotif[$notification['level']]}} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> {{ $notification['level'] == 'error' ? "Lỗi" : "Thành công"}}!</h4>
                    {{$notification["message"]}}
            </div> --}}
            <script>
                $(document).ready(function (){
                    toastr["{{$classNameNotif[$notification['level']]}}"]("{{$notification["message"]}}")
                });
            </script>   
        @else
            <script>
                $(document).ready(function (){
                    swal('Thông báo', "{{$notification['message']}}", "{{$notification['level']}}");
                });
            </script>
        @endif
    @endforeach
@endif