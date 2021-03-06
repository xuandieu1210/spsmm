@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Module chương trình</h1>
@stop
@routes
@section('content')

<div class="box-body">
        <a href="{{ url('/module/create') }}" class="btn btn-success btn-sm" title="Thêm mới module">
            <i class="fa fa-plus" aria-hidden="true"></i> Tạo mới
        </a>
        <br />                
        <br />
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>ID Module</th>
                <th>Mã Module</th>
                <th>Tên Module</th>
                <th>File Code</th>
                <th>Phiên Bản</th>
                <th>ID Nhóm PI</th>
                <th></th>
                </tr>
            </thead>
            <tfoot class="showTop">
                <th>ID Module</th>
                <th>Mã Module</th>
                <th>Tên Module</th>
                <th>File Code</th>
                <th>Phiên Bản</th>
                <th>ID Nhóm PI</th>
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
                    url: route('module.getData'),
                },
                columns: [
                    { data: 'ID_MODULE', name: 'ID_MODULE' },
                    { data: 'MA_MODULE', name: 'MA_MODULE' },
                    { data: 'TEN_MODULE', name: 'TEN_MODULE' },
                    { data: 'FILE_CODE', name: 'FILE_CODE' },
                    { data: 'PHIEN_BAN', name: 'PHIEN_BAN' },
                    { data: 'tbl_nhompi.TEN_NHOMPI', name: 'tbl_nhompi.TEN_NHOMPI' },
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