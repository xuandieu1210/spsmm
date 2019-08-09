@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Danh Sách Nhân Viên</h1>
@stop
@routes
@section('content')

<div class="box-body">
        <a href="{{ url('/nhanvien/create') }}" class="btn btn-success btn-sm" title="Thêm mới nhân viên">
            <i class="fa fa-plus" aria-hidden="true"></i> Tạo mới
        </a>
        <br />                
        <br />
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>Mã Nhân Viên</th>
                <th>Tên Nhân Viên</th>
                <th>Chức vụ</th>
                <th>Điện Thoại</th>
                <th>Đơn Vị</th>
                <th>Trạm</th>
                <th>Ghi Chú</th>
                <th>Username</th>
                <th></th>
                </tr>
            </thead>
            <tfoot class="showTop">
            <th>Mã Nhân Viên</th>
                <th>Tên Nhân Viên</th>
                <th>Chức vụ</th>
                <th>Điện Thoại</th>
                <th>Đơn Vị</th>
                <th>Trạm</th>
                <th>Ghi Chú</th>
                <th>Username</th>
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
                buttons: [
                        'excel',
                    ],
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
                    url: route('nhanvien.getData'),
                },
                columns: [
                    { data: 'MA_NHANVIEN', name: 'MA_NHANVIEN' },
                    { data: 'TEN_NHANVIEN', name: 'TEN_NHANVIEN' },
                    { data: 'CHUC_VU', name: 'CHUC_VU' },
                    { data: 'DIEN_THOAI', name: 'DIEN_THOAI' },
                    { data: 'tbl_daivt.TEN_DAIVT', name: 'tbl_daivt.TEN_DAIVT' },
                    { data: 'tbl_donvi.TEN_DONVI', name: 'tbl_donvi.TEN_DONVI' },
                    { data: 'GHI_CHU', name: 'GHI_CHU' },
                    { data: 'USER_NAME', name: 'USER_NAME' },
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
    </script>
@stop