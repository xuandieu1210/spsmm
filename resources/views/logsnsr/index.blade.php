@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Nhật ký cảm biến AD</h1>
@stop
@routes
@section('content')

<div class="box-body">     
        <a href="#" class="btn btn-danger btn-sm" id = 'bulk_delete' title="Xóa các log đã chọn">
            <i class="fa fa-trash" aria-hidden="true"></i> Xóa log đã chọn
        </a> 
        <a href="#" class="btn btn-edit btn-sm" id = 'edit' title="Xóa các log đã chọn" >
            <i class="fa fa-edit" aria-hidden="true" ></i> Chỉnh Cảm biến ADC
            <input type="hidden" class="form-control" name="paramId" type="file" id="ID_PARAM" />
            {{ csrf_field() }}
        </a>
        <div id="mymodal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Chỉnh Cảm Biến ADC</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    
                </div>
                <div class="modal-body">
                    <div class="form-group {{ $errors->has('MO_TA') ? 'has-error' : ''}}">
                        <label for="MO_TA" class="control-label">{{ 'Tham Số' }}</label>
                        <textarea style="height:250px" class="form-control" name="MO_TA" type="text" id="THAM_SO_TEXT" value="{{ isset($param->MO_TA) ? $param->MO_TA : ''}}" ></textarea>
                    
                    </div>
                    <div class="form-group {{ $errors->has('FILE_PARAM') ? 'has-error' : ''}}">
                        <label for="FILE_PARAM" class="control-label">{{ 'File Tham Số' }}</label>
                        <input class="form-control" rows="5" name="FILE_PARAM" type="file" id="FILE_PARAM" />
                    
                    </div>

                    <div class="form-group {{ $errors->has('ACTIVE_PARAM') ? 'has-error' : ''}}">
                        <label for="ACTIVE_PARAM" class="control-label">{{ 'Active Tham Số' }}</label>
                        
                        <input  name="ACTIVE_PARAM" id="Param_ACTIVE_PARAM" type="checkbox" @if (isset($param->ACTIVE_PARAM) && $param->ACTIVE_PARAM == 0) checked  @endif>
                        
                    </div>
                    <div class="form-group {{ $errors->has('ACTIVE_MODULE') ? 'has-error' : ''}}">
                        <label for="ACTIVE_MODULE" class="control-label">{{ 'Active Module' }}</label>
                        
                        <input  name="ACTIVE_MODULE" id="Param_ACTIVE_MODULE" type="checkbox" @if (isset($param->ACTIVE_MODULE) && $param->ACTIVE_MODULE == 1) checked  @endif>
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id= "submit_edit" type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>

        <div style="float: right">   
            <label for="label_ref">Tự động cập nhật (giây): </label><input id="time_ref" size="3" onchange="reRefesh()" type="text" value="15" name="time_refresh">    
         </div>
        <br />                
        <br />      
        <table id="example1" class="table table-bordered table-striped">
        <thead>
                <tr>
                <th></th>
                <th>ID</th>
                <th>Ngày Giờ Nhận</th><th>Ngày Giờ Gởi</th>
                <th>Vol P1</th><th>Vol P2</th><th>Vol P3</th>
                <th>Amp P1</th><th>Amp P2</th><th>Amp P3</th>
                <th>Vol D1</th><th>Vol D2</th>
                <th>Amp 1A</th><th>Amp 1B</th><th>Amp 2A</th><th>Amp 2B</th>
                <th>To In</th><th>To Out</th><th>Humidity</th><th>None</th><th>Tên Thiết Bị</th>
                <th></th>
                </tr>
            </thead>
            <tfoot class="showTop">
                <th>ID</th>
                <th>Ngày Giờ Nhận</th><th>Ngày Giờ Gởi</th>
                <th>Vol P1</th><th>Vol P2</th><th>Vol P3</th>
                <th>Amp P1</th><th>Amp P2</th><th>Amp P3</th>
                <th>Vol D1</th><th>Vol D2</th>
                <th>Amp 1A</th><th>Amp 1B</th><th>Amp 2A</th><th>Amp 2B</th>
                <th>To In</th><th>To Out</th><th>Humidity</th><th>None</th><th>Tên Thiết Bị</th>
                <th></th>
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
                columnDefs: [
                    {
                        'targets': 0,
                        'checkboxes': {
                            'selectRow': false
                        }
                    }
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
                'bProcessing': true,
                'bServerSide': true,
                ajax: {
                    url: route('logsnsr.getData'),
                },
                columns: [
                    {
                        data: "ID_PARAM",
                        render: function ( data, type, row ) {
                            return '<input type="checkbox" class="dt-checkboxes" value="'+data+'">';
                        },
                        className: "dt"
                    },
                    { data: 'ID_LOGSNSR', name: 'ID_LOGSNSR' },
                    { data: 'DATE_LOG', name: 'DATE_LOG' },
                    { data: 'DATE_PI', name: 'DATE_PI' },
                    { data: 'ADC_1', name: 'ADC_1',
                        render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc1 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc1 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        } 
                    },
                    { data: 'ADC_2', name: 'ADC_2',
                        render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc2 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc2 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        } 
                    },
                    { data: 'ADC_3', name: 'ADC_3' ,render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc3 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc3 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        } },
                    { data: 'ADC_4', name: 'ADC_4' ,render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc4 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc4 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        } },
                    { data: 'ADC_5', name: 'ADC_5' ,render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc5 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc5 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        } },
                    { data: 'ADC_6', name: 'ADC_6' ,render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc6 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc6 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        } },
                    { data: 'ADC_7', name: 'ADC_7',render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc7 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc7 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        }  },
                    { data: 'ADC_8', name: 'ADC_8' ,render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc8 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc8 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        } },
                    { data: 'ADC_9', name: 'ADC_9' ,render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc9 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc9 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        } },
                    { data: 'ADC_10', name: 'ADC_10',render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc10 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc10 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        }  },
                    { data: 'ADC_11', name: 'ADC_11',render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc11 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc11 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        }  },
                    { data: 'ADC_12', name: 'ADC_12',render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc12 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc12 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        }  },
                    { data: 'ADC_13', name: 'ADC_13',render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc13 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc13 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        }  },
                    { data: 'ADC_14', name: 'ADC_14' ,render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc14 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc14 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        } },
                    { data: 'ADC_15', name: 'ADC_15',
                        render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc15 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc15 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        }  
                    },
                    { data: 'ADC_16', name: 'ADC_16', 
                        render: function(data) { 
                            if(data >= 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc16 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc16 != '' ){
                                $(td).addClass('Red');
                            } else {
                                $(td).addClass('Blue');
                            }
                        }  
                    },
                    { data: 'TEN_PI', name: 'TEN_PI' },
                    { data: 'action', name: 'action' },
                    
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
                        $('#example1 > tfoot > tr > th:nth-child(1) > input').hide();
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
            $(document).on('click', '#bulk_delete', function(){
                var id = [];
                if(confirm("Bạn có chắc chắn muốn xóa những bản ghi dã chọn?"))
                {
                    $('.dt-checkboxes:checked').each(function(){
                        if ($(this).closest('td').next().text() != '') {
                            id.push($(this).closest('td').next().text());
                        }
                    });
                    console.log(id);
                    if(id.length > 0)
                    {
                        $.ajax({
                            url:"{{ route('logsnsr.deleteMulti')}}",
                            method:"get",
                            data:{id:id},
                            success:function(data)
                            {
                                alert(data);
                                $('#example1').DataTable().ajax.reload();
                            }
                        });
                    }
                    else
                    {
                        alert("Chọn ít nhất 1 bản ghi");
                    }
                }
            });
            $(document).on('click', '#edit', function(){
                var id = [];
                    $('.dt-checkboxes:checked').each(function(){
                        id.push($(this).val());
                    });
                    if(id.length == 1)
                    {
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url:"{{ route('param.getByPiId')}}",
                            method:"post",
                            data:{id:id[0], maParam: 'SNSR', _token:_token },
                            success:function(data)
                            {
                                $('#ID_PARAM').val(id[0]);
                                $('#THAM_SO_TEXT').val(data[0].FILE_PARAM);
                                $('#Param_ACTIVE_PARAM').prop('checked', data[0].ACTIVE_PARAM);
                                $('#Param_ACTIVE_MODULE').prop('checked', data[0].ACTIVE_MODULE);
                                console.log(data[0].FILE_PARAM);
                                var modal = $("#mymodal");
                               
                                modal.modal('show');
                            }
                        });
                    }
                    else
                    {
                        
                        alert("Chọn duy nhất 1 bản ghi");
                    }
            });

            $(document).on('click', '#submit_edit', function(){
                var _token = $('input[name="_token"]').val();
                param_id = $('#ID_PARAM').val();
                text_param = $('#THAM_SO_TEXT').val();
                file_param = $('#FILE_PARAM').val();
                active_param = +$('#Param_ACTIVE_PARAM').is( ':checked' );
                active_module = +$('#Param_ACTIVE_MODULE').is( ':checked' );
                $.ajax({
                    url:"{{ route('param.updateAjax')}}",
                    method:"post",
                    data:{ID_PARAM:param_id, THAM_SO_TEXT:text_param, FILE_PARAM: file_param, ACTIVE_PARAM:active_param, ACTIVE_MODULE:active_module,  _token:_token },
                    success:function(data)
                    {
                        var modal = $("#mymodal");            
                        modal.modal('hide');
                        alert(data);
                    }
                });
                
            })

            table.ajax.reload( function ( json ) {
                document.getElementById('time_ref').value*1000;
            } );
        });
        var timeout = 15*1000; // 15s in Milliseconds   
        if (document.getElementById('time_ref').value != ''){
            timeout = document.getElementById('time_ref').value*1000; 
        }    
        var xx= window.setInterval(function(){refresh()}, timeout); 
        function refresh() {
            $('#example1').DataTable().ajax.reload();;                        
        }                                
        function reRefesh() {
            clearInterval(xx);
            if (document.getElementById('time_ref').value != ''){
                timeout = document.getElementById('time_ref').value*1000;
            }    
            xx= window.setInterval(function(){refresh()}, timeout);
        }
    </script>
@stop
