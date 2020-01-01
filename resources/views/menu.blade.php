@php
    $ar_menu = [
        "Quản lý câu hỏi" => [
            "Danh sách" => 'cau-hoi.',
            "Thêm câu hỏi" => 'cau-hoi.them-moi',
            "Thùng rác" =>'cau-hoi.thung-rac'
        ],

        "Quản lý lĩnh vực" => [
            "Danh sách" => 'linh-vuc.',
            "Thêm lĩnh vực" => 'linh-vuc.them-moi',
            "Thùng rác" => 'linh-vuc.thung-rac'
        ],

        "Quản lý người dùng" => [
            "Danh sách" => 'nguoi-choi.',
            "Thêm người chơi" => 'nguoi-choi.them-moi',
            "Thùng rác" => 'nguoi-choi.thung-rac'
        ],

        "Quản lý gói credit" => [
            "Danh sách" => 'goi-credit.',
            "Thêm gói credit" => 'goi-credit.them-moi',
            "Thùng rác" => 'goi-credit.thung-rac'
        ],

        "Quản lý quản trị viên" => [
            "Danh sách" => 'quan-tri-vien.',
            "Thêm quản trị viên" => 'quan-tri-vien.them-moi',
            "Thùng rác" => 'quan-tri-vien.thung-rac'
        ],
        "Quản lý lượt chơi" => [
            "Danh sách" => 'luot-choi.'
        ]

    ];
@endphp


<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Quản lý</li>
    
    @foreach ($ar_menu as $name => $menu_child)

    {{-- Check open menu --}}
    @php($active = false)            
    @foreach ($menu_child as $name_child => $routeName)
    @php($active = $active || Request::routeIs($routeName) || strpos(Request::route()->getName(), $routeName) === 0)            
    @endforeach

    <li class="treeview {{$active ? 'menu-open active' : ''}}">
        <a href="#">
            <i class="fa fa-edit"></i> <span>{{$name}}</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            @foreach ($menu_child as $name_child => $routeName)
                <li class="{{ Request::routeIs($routeName) ? 'active' : '' }}">
                    <a href="{{route($routeName)}}"><i class="fa fa-circle-o"></i> {{$name_child}}</a>
                </li>
            @endforeach
        </ul>
    </li>
    @endforeach

</ul>