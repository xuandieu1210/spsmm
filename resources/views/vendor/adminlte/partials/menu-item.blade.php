<!-- @if (is_string($item))
    <li class="header">{{ $item }}</li>
@else
    <li class="{{ $item['class'] }}">
        <a href="{{ $item['href'] }}"
           @if (isset($item['target'])) target="{{ $item['target'] }}" @endif
        >
            <i class="fa fa-fw fa-{{ isset($item['icon']) ? $item['icon'] : 'circle-o' }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>
            <span>{{ $item['text'] }}</span>
            @if (isset($item['label']))
                <span class="pull-right-container">
                    <span class="label label-{{ isset($item['label_color']) ? $item['label_color'] : 'primary' }} pull-right">{{ $item['label'] }}</span>
                </span>
            @elseif (isset($item['submenu']))
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            @endif
        </a>
        @if (isset($item['submenu']))
            <ul class="{{ $item['submenu_class'] }}">
                @each('adminlte::partials.menu-item', $item['submenu'], 'item')
            </ul>
        @endif
    </li>
@endif -->
<ul class="sidebar-menu tree" data-widget="tree">
                    <li class="header">TRANG CHỦ</li>
<li class="active">
        <a href="http://127.0.0.1:8000">
            <i class="fa fa-fw fa-file "></i>
            <span>Trang Chủ</span>
                    </a>
            </li>
<li class="header">MENUS</li>
<li class="treeview">
        <a href="#">
            <i class="fa fa-fw fa-users "></i>
            <span>Đơn Vị</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                <li class="">
        <a href="http://127.0.0.1:8000/donvi">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Đơn vị chủ quản</span>
                    </a>
            </li>
<li class="">
        <a href="http://127.0.0.1:8000/daivt">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Đơn vị giám sát</span>
                    </a>
            </li>
<li class="">
        <a href="http://127.0.0.1:8000/nhanvien">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Nhân viên giám sát</span>
                    </a>
            </li>
            </ul>
            </li>
<li class="treeview">
        <a href="#">
            <i class="fa fa-fw fa-gears "></i>
            <span>Thiết Bị</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                <li class="">
        <a href="http://127.0.0.1:8000/nhompi">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Nhóm thiết bị</span>
                    </a>
            </li>
<li class="">
        <a href="http://127.0.0.1:8000/pi">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Thiết bị lắp trạm</span>
                    </a>
            </li>
<li class="">
        <a href="http://127.0.0.1:8000/module">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Module chương trình</span>
                    </a>
            </li>
<li class="">
        <a href="http://127.0.0.1:8000/adcsnsr">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Cảm biến ADC</span>
                    </a>
            </li>
<li class="">
        <a href="http://127.0.0.1:8000/output">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Danh mục điều khiển ra</span>
                    </a>
            </li>
<li class="">
        <a href="http://127.0.0.1:8000/param">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Tham Số chỉ dẫn thiết bị</span>
                    </a>
            </li>
<li class="">
        <a href="http://127.0.0.1:8000/alarm">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Danh Mục Cảnh Báo</span>
                    </a>
            </li>
            </ul>
            </li>
<li class="treeview">
        <a href="#">
            <i class="fa fa-fw fa-calendar-minus-o "></i>
            <span>Nhật ký</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                <li class="">
        <a href="http://127.0.0.1:8000/logsnsr">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Cảm Biến ADC</span>
                    </a>
            </li>
<li class="">
        <a href="http://127.0.0.1:8000/logalarm16">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Cảm Biến ON/OFF</span>
                    </a>
            </li>
<li class="">
        <a href="http://127.0.0.1:8000/logctrl">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Điều Khiển</span>
                    </a>
            </li>
<li class="">
        <a href="http://127.0.0.1:8000/adcsnsr">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Camera</span>
                    </a>
            </li>
            </ul>
            </li>
<li class="active treeview menu-open">
        <a href="#">
            <i class="fa fa-fw fa-warning "></i>
            <span>Cảnh Báo</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                <li class="active">
        <a href="http://127.0.0.1:8000/logalarm">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Nhật Ký</span>
                    </a>
            </li>
<li class="">
        <a href="http://127.0.0.1:8000/logalarm/history">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Lịch Sử</span>
                    </a>
            </li>
<li class="">
        <a href="http://127.0.0.1:8000/logalarmneterr">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Nhật ký mất kết nối</span>
                    </a>
            </li>
<li class="">
        <a href="http://127.0.0.1:8000/adcsnsr">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Bản Đồ</span>
                    </a>
            </li>
            </ul>
            </li>
<li class="header">ACTION</li>
<li class="active">
        <a href="#">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Xóa log đã chọn</span>
                    </a>
            </li>
<li class="active">
        <a href="#">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Xóa hết log cũ</span>
                    </a>
            </li>
<li class="active">
        <a href="#">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Chỉnh Cảm Biến ADC</span>
                    </a>
            </li>
<li class="active">
        <a href="#">
            <i class="fa fa-fw fa-circle-o "></i>
            <span>Quan trắc thông số cảm biến</span>
                    </a>
            </li>
                </ul>