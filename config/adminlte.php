<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'VNPT SPSM',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>VNPT</b>SPSM',

    'logo_mini' => '<b>SPSM</b>',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        'TRANG CHỦ',
        [
            'text' => 'Trang Chủ',
            'url'  => '/',
            'can'  => 'manage-blog',
        ],
        [
            'text'        => 'Trang Chủ',
            'url'         => '/',
            'icon'        => 'file',
            'label_color' => 'success',
        ],
        'MENUS',
        [
            'text'    => 'Đơn Vị',
            'icon'    => 'users',
            'submenu' => [
                [
                    'text' => 'Đơn vị chủ quản',
                    'url'  => 'donvi',
                ],
                [
                    'text'    => 'Đơn vị giám sát',
                    'url'     => 'daivt',
                ],
                [
                    'text' => 'Nhân viên giám sát',
                    'url'  => 'nhanvien',
                ],
            ],
        ],
        [
            'text'    => 'Thiết Bị',
            'icon'    => 'gears',
            'submenu' => [
                [
                    'text' => 'Nhóm thiết bị',
                    'url'  => 'nhompi',
                ],
                [
                    'text'    => 'Thiết bị lắp trạm',
                    'url'     => 'pi',
                ],
                [
                    'text' => 'Module chương trình',
                    'url'  => 'module',
                ],
                [
                    'text' => 'Cảm biến ADC',
                    'url'  => 'adcsnsr',
                ],
                [
                    'text' => 'Danh mục điều khiển ra',
                    'url'  => 'output',
                ],
                [
                    'text' => 'Tham Số chỉ dẫn thiết bị',
                    'url'  => 'param',
                ],
                [
                    'text' => 'Danh Mục Cảnh Báo',
                    'url'  => 'alarm',
                ],
            ],
        ],
        [
            'text'    => 'Nhật ký',
            'icon'    => 'calendar-minus-o',
            'submenu' => [
                [
                    'text' => 'Cảm Biến ADC',
                    'url'  => 'logsnsr',
                ],
                [
                    'text'    => 'Cảm Biến ON/OFF',
                    'url'     => 'logalarm16',
                ],
                [
                    'text' => 'Điều Khiển',
                    'url'  => 'logctrl',
                ],
                [
                    'text' => 'Camera',
                    'url'  => 'adcsnsr',
                ],
            ],
        ],
        [
            'text'    => 'Cảnh Báo',
            'icon'    => 'warning',
            'submenu' => [
                [
                    'text' => 'Nhật Ký',
                    'url'  => 'logalarm',
                ],
                [
                    'text'    => 'Lịch Sử',
                    'url'     => 'logalarm/history',
                ],
                [
                    'text' => 'Nhật ký mất kết nối',
                    'url'  => 'logalarmneterr',
                ],
                [
                    'text' => 'Bản Đồ',
                    'url'  => 'adcsnsr',
                ],
            ],
        ],
        'ACTION',
        [
            'text'       => 'Xóa log đã chọn',
            'id'         => 'bulk_delete',
            'submenu_class'  => 'abc',
            'active' => ['logalarm']
        ],
        [
            'text'       => 'Xóa hết log cũ',
            'active' => ['logalarm']
            
        ],
        [
            'text'       => 'Chỉnh Cảm Biến ADC',
            'active' => ['logalarm']
        ],
        [
            'text'       => 'Quan trắc thông số cảm biến',
            'active' => ['logalarm']

        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
