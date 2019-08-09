@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Danh sách Thiết Bị</h1>
@stop
@routes
@section('content')

<div class="box-body">
        <a href="{{ url('/pi/create') }}" class="btn btn-success btn-sm" title="Thêm mới module">
            <i class="fa fa-plus" aria-hidden="true"></i> Tạo mới
        </a>
        {{ csrf_field() }}
        <br />                
        <br />
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>ID</th><th>Tên Thiết Bị</th><th>Địa Chỉ</th><th>Địa Chỉ IP</th><th>Giám Sát</th><th>Nhóm Thiết Bị</th><th>Nhân Viên</th><th>Điện Thoại</th><th>Kết Nối</th><th>Hòa Mạng</th>
                <th></th>
                </tr>
            </thead>
            <tfoot class="showTop">
                <th>ID</th><th>Tên Thiết Bị</th><th>Địa Chỉ</th><th>Địa Chỉ IP</th><th>Giám Sát</th><th>Nhóm Thiết Bị</th><th>Nhân Viên</th><th>Điện Thoại</th><th>Kết Nối</th><th>Hòa Mạng</th>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
@stop
@section('js')
    <script>      
        $(function() {
            $('#example1 tfoot th').each( function () {
                $(this).html( '<input type="text" />' );
            } );
            var table = $('#example1').DataTable({
                dom: '<l<"tfoot"t>ip>',
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ kết quả trên 1 trang",
                    "zeroRecords": "Không có dữ liệu",
                    "info": "Hiển thị trang _PAGE_ của _PAGES_ trang",
                    "infoEmpty": "Không Có Dữ Liệu",
                    "infoFiltered": "(Lọc từ _MAX_ kết quả)",
                    "search" : "Tìm Kiếm",
                    "processing": "Đang tải ...",
                    "paginate": {
                        "first":      "Đầu",
                        "last":       "Cuối",
                        "next":       "Sau",
                        "previous":   "Trước"
                    },
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: route('pi.getData'),
                },
                columns: [
                    { data: 'ID_PI', name: 'ID_PI' },
                    { data: 'TEN_PI', name: 'TEN_PI' },
                    { data: 'DC_PI', name: 'DC_PI' },
                    { data: 'IP_ADDR', name: 'IP_ADDR' },
                    { data: 'tbl_daivt.MA_DAIVT', name: 'tbl_daivt.MA_DAIVT' },
                    { data: 'tbl_nhompi.MA_NHOMPI', name: 'tbl_nhompi.MA_NHOMPI' },
                    { data: 'tbl_nhanvien.TEN_NHANVIEN', name: 'tbl_nhanvien.TEN_NHANVIEN' },
                    { data: 'tbl_nhanvien.DIEN_THOAI', name: 'tbl_nhanvien.DIEN_THOAI' },
                    { data: 'S_CONNECT', name: 'S_CONNECT',
                        render: function(data) { 
                            if(data != '') {
                                return  data;
                            } else {
                                return  0;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( cellData != '' ) {
                                $(td).addClass('Blue');
                            }
                            else{
                                $(td).addClass('Red');
                            }
                        }
                    },
                    { data: 'START_UP', name: 'START_UP',
                        render: function(data) { 
                            if(data != '') {
                                return  data;
                            } else {
                                return  0;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( cellData != '' ) {
                                $(td).addClass("Blue");
                            }
                            else{
                                $(td).addClass("Red");
                            }
                        }
                    },
                    { data: 'action', name: 'action' }
                ],
                initComplete: function () {
                        this.api().columns().every(function () {
                            var column = this;
                            var input = document.createElement("input");
                            $(input).attr('class', 'filter');
                            $(input).attr('style', 'width: 100%');
                            $(input).appendTo($(column.footer()).empty())
                                .on('keyup change', function () {
                                    column
                                        .search($(this).val(), false, false, true)
                                        .draw();
                                });
                        });
                        $('#example1 > tfoot > tr > th:nth-child(0) > input').hide();
                    },
            });
            
            table.columns().every( function () {
                var that = this;
        
                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        });
        function ping(ele){
                var piId = ele.getAttribute('value');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('pi.ping')}}",
                    method:"post",
                    data:{ID_PI:piId,  _token:_token },
                    success:function(data)
                    {          
                        alert(data);
                    }
                });
            };
        function resetParam(ele){
                var piId = ele.getAttribute('value');
                var _token = $('input[name="_token"]').val();
                var confirmText = 'Chú ý! Tất cả điều khiển sẽ được đặt tự động.\n\nCó chắc chắn đồng ý?';
                if(confirm(confirmText)) {
                    $.ajax({
                        url:"{{ route('pi.resetParam')}}",
                        method:"post",
                        data:{ID_PI:piId,  _token:_token },
                        success:function(data)
                        {          
                            console.log(data);
                            alert(data);
                        }
                    });
                };
            };
        function active(ele){
                var piId = ele.getAttribute('value');
                var _token = $('input[name="_token"]').val();
                var b = ele.closest('td').getElementsByClassName('conect_title')[0];      
                var a = ele.closest('tr').getElementsByTagName('td')[9];
                $.ajax({
                    url:"{{ route('pi.active')}}",
                    method:"post",
                    data:{ID_PI:piId,  _token:_token },
                    success:function(data)
                    {          
                        if (data ==1) {
                            a.className = 'Blue';
                            a.innerHTML = 1;
                            ele.className = 'fa fa-toggle-on';
                            message = 'Hòa mạng thành công';
                            b.title  = 'Ngắt kết nối';
                        } else {
                            a.className = 'Red';
                            a.innerHTML = 0;
                            ele.className = 'fa fa-toggle-off';
                            message = 'Ngắt hòa mạng thành công';
                            b.title  = 'Kết nối';
                        }
                        alert(message);
                    }
                });
            };
    </script>
@stop
