@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Nhật ký cảm biến ON/OFF</h1>
@stop
@routes
@section('content')

<div class="box-body">     
        <a href="#" class="btn btn-danger btn-sm" id = 'bulk_delete' title="Xóa các log đã chọn">
            <i class="fa fa-trash" aria-hidden="true"></i> Xóa log đã chọn
        </a> 
        <a href="#" class="btn btn-edit btn-sm" id = 'edit' title="Chỉnh cảm biến" >
            <i class="fa fa-edit" aria-hidden="true" ></i> Chỉnh Cảm biến ON/OFF
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
                <th>ID</th><th>Ngày Giờ Nhận</th><th>Ngày Giờ Gởi</th>
                <th>FIRE1</th><th>SMOKE1</th><th>SMOKE2</th>
                <th>SMOKE2</th><th>DOOR</th><th>WARTER</th>
                <th>LIGHT</th><th>MOTION</th>
                <th>AC1</th><th>AC2</th><th>REC1</th><th>REC2</th>
                <th>AC0</th><th>GEN UP</th><th>None</th><th>None</th><th>Tên Thiết Bị</th>
                <th></th>
                </tr>
            </thead>
            <tfoot class="showTop">
                <th>ID</th><th>Ngày Giờ Nhận</th><th>Ngày Giờ Gởi</th>
                <th>FIRE1</th><th>SMOKE1</th><th>SMOKE2</th>
                <th>SMOKE2</th><th>DOOR</th><th>WARTER</th>
                <th>LIGHT</th><th>MOTION</th>
                <th>AC1</th><th>AC2</th><th>REC1</th><th>REC2</th>
                <th>AC0</th><th>GEN UP</th><th>None</th><th>None</th><th>Tên Thiết Bị</th>
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
                select: {
                 style: 'multi',
                    selector: 'td:first-child'
                },
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
                    url: route('logalarm16.getData'),
                },
                columns: [
                    {
                        data: "ID_PARAM",
                        render: function ( data, type, row ) {
                            return '<input type="checkbox" class="dt-checkboxes" value="'+data+'">';
                        },
                        className: "dt"
                    },
                    { data: 'ID_LOGALARM16', name: 'ID_LOGALARM16' },
                    { data: 'DATE_LOG', name: 'DATE_LOG' },
                    { data: 'DATE_PI', name: 'DATE_PI' },
                    { data: 'IN_1', name: 'IN_1',
                        render: function(data) { 
                            if(data < 0) {
                                return 'E';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc1 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc1 != '' ){
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
                            }
                        } 
                    },
                    { data: 'IN_2', name: 'IN_2',
                        render: function(data) { 
                            if(data < 0) {
                                return 'E';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc2 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc2 != '' ){
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
                            }
                        } 
                    },
                    { data: 'IN_3', name: 'IN_3' ,render: function(data) { 
                            if(data < 0) {
                                return 'E';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc3 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc3 != '' ){
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
                            }
                        } },
                    { data: 'IN_4', name: 'IN_4' ,render: function(data) { 
                            if(data < 0) {
                                return 'E';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc4 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc4 != '' ){
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
                            }
                        } },
                    { data: 'IN_5', name: 'IN_5' ,render: function(data) { 
                            if(data < 0) {
                                return 'E';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc5 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc5 != '' ){
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
                            }
                        } },
                    { data: 'IN_6', name: 'IN_6' ,render: function(data) { 
                            if(data < 0) {
                                return 'E';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc6 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc6 != '' ){
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
                            }
                        } },
                    { data: 'IN_7', name: 'IN_7',render: function(data) { 
                            if(data < 0) {
                                return 'E';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc7 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc7 != '' ){
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
                            }
                        }  },
                    { data: 'IN_8', name: 'IN_8' ,render: function(data) { 
                            if(data < 0) {
                                return 'E';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc8 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc8 != '' ){
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
                            }
                        } },
                    { data: 'IN_9', name: 'IN_9' ,render: function(data) { 
                            if(data < 0) {
                                return 'E';
                            } else {
                                return  data;
                            }
                        },
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if ( rowData.DT_RowData.nc9 == -1 ) {
                                $(td).addClass('Dimgrey');
                            } else if( rowData.DT_RowData.nc9 != '' ){
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
                            }
                        } },
                    { data: 'IN_10', name: 'IN_10',render: function(data) { 
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
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
                            }
                        }  },
                    { data: 'IN_11', name: 'IN_11',render: function(data) { 
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
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
                            }
                        }  },
                    { data: 'IN_12', name: 'IN_12',render: function(data) { 
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
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
                            }
                        }  },
                    { data: 'IN_13', name: 'IN_13',render: function(data) { 
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
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
                            }
                        }  },
                    { data: 'IN_14', name: 'IN_14' ,render: function(data) { 
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
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
                            }
                        } },
                    { data: 'IN_15', name: 'IN_15',
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
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
                            }
                        }  
                    },
                    { data: 'IN_16', name: 'IN_16', 
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
                                $(td).addClass('Blue');
                            } else {
                                $(td).addClass('Red');
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
                            url:"{{ route('logalarm16.deleteMulti')}}",
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
                        if ($(this).val() != '') {
                            id.push($(this).val());
                        }
                        
                    });
                    console.log(id);
                    if(id.length == 1)
                    {
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url:"{{ route('param.getByPiId')}}",
                            method:"post",
                            data:{id:id[0], maParam: 'ALARM', _token:_token },
                            success:function(data)
                            {
                                $('#ID_PARAM').val(id[0]);
                                $('#THAM_SO_TEXT').val(data[0].FILE_PARAM);
                                $('#Param_ACTIVE_PARAM').prop('checked', data[0].ACTIVE_PARAM);
                                $('#Param_ACTIVE_MODULE').prop('checked', data[0].ACTIVE_MODULE);
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
                        alert(data);           
                        var modal = $("#mymodal");            
                        modal.modal('hide');
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

