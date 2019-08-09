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

        

        <div style="float: right">   
            <label for="label_ref">Tự động cập nhật (giây): </label><input id="time_ref" size="3" onchange="reRefesh()" type="text" value="15" name="time_refresh">    
         </div>
         {{ csrf_field() }}
         <div id="mymodal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Thông số cảm biến</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    
                </div>
                <div class="modal-body">
                <table  class="table table-bordered table-sm">
                    <tbody id= 'modal-body'>
                    <!-- <tr><td >Ngày giờ nhận</td><td id = "DATE_LOG"></td></tr>
                    <tr><td>Ngày giờ gởi</td><td id = "DATE_PI"></td></tr>
                    <tr><td>Điện áp Pha 1</td><td id = "ADC_1"></td></tr>
                    <tr><td>Điện áp Pha 2</td><td id = "ADC_2"></td></tr>
                    <tr><td>Điện áp Pha 3</td><td id = "ADC_3"></td></tr>
                    <tr><td>Điện áp Pha 1</td><td id = "ADC_4"></td></tr>
                    <tr><td>Điện áp Pha 2</td><td id = "ADC_5"></td></tr>
                    <tr><td>Điện áp Pha 3</td><td id = "ADC_6"></td></tr>
                    <tr><td>Điện áp Accu 1</td><td id = "ADC_7"></td></tr>
                    <tr><td>Điện áp Accu 2</td><td id = "ADC_8"></td></tr>
                    <tr><td>Dòng Accu 1 A</td><td id = "ADC_9"></td></tr>
                    <tr><td>Dòng Accu 1 B</td><td id = "ADC_10"></td></tr>
                    <tr><td>Dòng Accu 2 A</td><td id = "ADC_11"></td></tr>
                    <tr><td>Dòng Accu 2 B</td><td id = "ADC_12"></td></tr>
                    <tr><td>Nhiệt độ trong</td><td id = "ADC_13"></td></tr>
                    <tr><td>Nhiệt độ ngoài</td><td id = "ADC_14"></td></tr>
                    <tr><td>Độ Ẩm</td><td id = "ADC_15"></td></tr>
                    <tr><td>Chưa dùng</td><td id = "ADC_16"></td></tr> -->
                    </tbody>
                </table>
                </div>
                <div class="modal-footer">
                    <div style="float: right">   
                        <label for="label_ref">Tự động cập nhật (giây): </label><input id="modal_time_ref" size="3" onchange="modalreRefesh()" type="text" value="15" name="time_refresh">    
                    </div>
                </div>
                </div>
            </div>
        </div>

        <br />                
        <br />      
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style= "width:3px"> </th>
                    <th> ID</th>
                    <th>Ngày Nhận</th>
                    <th>Ngày Gởi</th>
                    <th>File Ảnh</th>
                    <th>Mã Cảnh Báo</th>
                    <th>Tên Cảnh Báo</th>
                    <th>Thông Số</th>
                    <th>Cấp Độ</th>
                    <th>Thời Gian</th>
                    <th>Tên Thiết Bị</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot class="showTop">
                <th> ID</th>
                <th>Ngày Nhận</th>
                <th>Ngày Gởi</th>
                <th>File Ảnh</th>
                <th>Mã Cảnh Báo</th>
                <th>Tên Cảnh Báo</th>
                <th>Thông Số</th>
                <th>Cấp Độ</th>
                <th>Thời Gian</th>
                <th>Tên Thiết Bị</th>
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
                            'selectRow': true
                        }
                    },
                    {
                        targets: 8,
                        createdCell: function (td, cellData, rowData, row, col) {
                            console.log(rowData['tbl_alarm']['CAP_DO']);
                                $(td).css('background', rowData['tbl_alarm']['MAU_NEN']);
                                $(td).css('color', 'white');
                        }
                    }
                ],
                select: {
                    style: 'multi',
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
                    url: route('logalarm.getData'),
                },
                columns: [
                    {
                        data: "tbl_pi.ID_PI",
                        render: function ( data, type, row ) {
                            return '<input type="checkbox" class="dt-checkboxes" value="'+data+'">';
                        },
                        className: "dt"
                    },
                    { data: 'ID_LOGALARM', name: 'ID_LOGALARM' },
                    { data: 'DATE_LOG', name: 'DATE_LOG' },
                    { data: 'DATE_PI', name: 'DATE_PI' },
                    { data: 'FILE_CAM', name: 'FILE_CAM',
                        render: function(data) { 
                            if(data == '') {
                                return 'Không Có';
                            } else {
                                return  data;
                            }
                        }
                    },
                    { data: 'tbl_alarm.MA_ALARM', name: 'tbl_alarm.MA_ALARM' },
                    { data: 'tbl_alarm.MO_TA', name: 'tbl_alarm.MO_TA' },
                    { data: 'GIA_TRI', name: 'GIA_TRI',
                        render: function(data) { 
                            if(parseInt(data) == 999) {
                                return 'ERR';
                            } else {
                                return  data;
                            }
                        } },
                    { data: 'tbl_alarm.CAP_DO', name: 'tbl_alarm.CAP_DO'
                    },
                    { data: 'ALARM_TIME', name: 'ALARM_TIME' },
                    { data: 'tbl_pi.TEN_PI', name: 'tbl_pi.TEN_PI' },
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
                        id.push($(this).closest('td').next().text());
                    });
                    console.log(id);
                    if(id.length > 0)
                    {
                        $.ajax({
                            url:"{{ route('logalarm.deleteMulti')}}",
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

            $(document).on('click', '.show-logsnsr', function(){
                var id = [];
                var _token = $('input[name="_token"]').val();
                $('.dt-checkboxes:checked').each(function(){
                    id.push($(this).val());
                });
                console.log(id);
                if(id.length > 0)
                {
                    $.ajax({
                        url:"{{ route('logalarm.actionShowlog')}}",
                        method:"post",
                        data:{id:id[0], param:'SNSR', _token:_token},
                        success:function(data)
                        {
                            body = $('#modal-body'); body.empty();
                            content = '<tr><td >Ngày giờ nhận</td><td id = "DATE_LOG">'+data.DATE_LOG+'</td></tr>'+
                                '<tr><td>Ngày giờ gởi</td><td id = "DATE_PI">'+data.DATE_PI+'</td></tr>'+
                                '<tr><td>Điện áp Pha 1</td><td id = "ADC_1">'+data.ADC_1+'</td></tr>'+
                                '<tr><td>Điện áp Pha 2</td><td id = "ADC_2">'+data.ADC_2+'</td></tr>'+
                                '<tr><td>Điện áp Pha 3</td><td id = "ADC_3">'+data.ADC_3+'</td></tr>'+
                                '<tr><td>Điện áp Pha 1</td><td id = "ADC_4">'+data.ADC_4+'</td></tr>'+
                                '<tr><td>Điện áp Pha 2</td><td id = "ADC_5">'+data.ADC_5+'</td></tr>'+
                                '<tr><td>Điện áp Pha 3</td><td id = "ADC_6">'+data.ADC_6+'</td></tr>'+
                                '<tr><td>Điện áp Accu 1</td><td id = "ADC_7">'+data.ADC_7+'</td></tr>'+
                                '<tr><td>Điện áp Accu 2</td><td id = "ADC_8">'+data.ADC6+'</td></tr>'+
                                '<tr><td>Dòng Accu 1 A</td><td id = "ADC_9">'+data.ADC_8+'</td></tr>'+
                                '<tr><td>Dòng Accu 1 B</td><td id = "ADC_10">'+data.ADC_10+'</td></tr>'+
                                '<tr><td>Dòng Accu 2 A</td><td id = "ADC_11">'+data.ADC_11+'</td></tr>'+
                                '<tr><td>Dòng Accu 2 B</td><td id = "ADC_12">'+data.ADC_12+'</td></tr>'+
                                '<tr><td>Nhiệt độ trong</td><td id = "ADC_13">'+data.ADC_13+'</td></tr>'+
                                '<tr><td>Nhiệt độ ngoài</td><td id = "ADC_14">'+data.ADC_14+'</td></tr>'+
                                '<tr><td>Độ Ẩm</td><td id = "ADC_15"></td>'+data.ADC_15+'</tr>'+
                                '<tr><td>Chưa dùng</td><td id = "ADC_16">'+data.ADC_16+'</td></tr>'; 
                                body.append(content);
                                $('#mymodal').modal('show');
                            }
                        });
                    }
                else
                {
                    alert("Chọn ít nhất 1 bản ghi");
                }
                
            });

            $(document).on('click', '.show-logalarm16', function(){
                var id = [];
                var _token = $('input[name="_token"]').val();
                $('.dt-checkboxes:checked').each(function(){
                    id.push($(this).val());
                });
                console.log(id);
                if(id.length > 0)
                {
                    $.ajax({
                        url:"{{ route('logalarm.actionShowlog')}}",
                        method:"post",
                        data:{id:id[0], param:'ALARM16', _token:_token},
                        success:function(data)
                        {
                            console.log(data);
                            body = $('#modal-body'); body.empty();
                            content = '<tr><td >Ngày giờ nhận</td><td id = "DATE_LOG">'+data.DATE_LOG+'</td></tr>'+
                                '<tr><td>Ngày giờ gởi</td><td id = "DATE_PI">'+data.DATE_PI+'</td></tr>'+
                                '<tr><td>Báo Cháy</td><td id = "ADC_1">'+if (data.FILE_PARAM.IN_1.NAME == "NONE" ? "NONE" : "a"+'</td></tr>'+
                                '<tr><td>Báo Khói</td><td id = "ADC_2">'+data.IN_2+'</td></tr>'+
                                '<tr><td>Báo Cháy</td><td id = "ADC_3">'+data.IN_3+'</td></tr>'+
                                '<tr><td>Báo Khói</td><td id = "ADC_4">'+data.IN_4+'</td></tr>'+
                                '<tr><td>Cửa Mở</td><td id = "ADC_5">'+data.IN_5+'</td></tr>'+
                                '<tr><td>Ngập Nước</td><td id = "ADC_6">'+data.IN_6+'</td></tr>'+
                                '<tr><td>Ánh Sáng</td><td id = "ADC_7">'+data.IN_7+'</td></tr>'+
                                '<tr><td>Chuyển Động</td><td id = "ADC_8">'+data.IN_8+'</td></tr>'+
                                '<tr><td>Ac tủ 1</td><td id = "ADC_9">'+data.IN_9+'</td></tr>'+
                                '<tr><td>Ac tủ 2</td><td id = "ADC_10">'+data.IN_10+'</td></tr>'+
                                '<tr><td>Rec 1</td><td id = "ADC_11">'+data.IN_11+'</td></tr>'+
                                '<tr><td>Rec 2</td><td id = "ADC_12">'+data.IN_12+'</td></tr>'+
                                '<tr><td>Ac tổng</td><td id = "ADC_13">'+data.IN_13+'</td></tr>'+
                                '<tr><td>Máy nổ</td><td id = "ADC_14">'+data.IN_14+'</td></tr>'+
                                '<tr><td></td><td id = "ADC_15"></td>'+data.IN_15+'</tr>'+
                                '<tr><td></td><td id = "ADC_16">'+data.IN_16+'</td></tr>'; 
                            body.append(content);
                            $('#mymodal').modal('show');
                        }
                    });
                }
                else
                {
                    alert("Chọn ít nhất 1 bản ghi");
                }
                    
            });

            $(document).on('click', '.show-logctrl', function(){
                var id = [];
                var _token = $('input[name="_token"]').val();
                $('.dt-checkboxes:checked').each(function(){
                    id.push($(this).val());
                });
                console.log(id);
                if(id.length > 0)
                {
                    $.ajax({
                        url:"{{ route('logalarm.actionShowlog')}}",
                        method:"post",
                        data:{id:id[0], param:'CTRL', _token:_token},
                        success:function(data)
                        {
                            console.log(data);
                            body = $('#modal-body'); body.empty();
                            content = '<tr><td >Ngày giờ nhận</td><td id = "DATE_LOG">'+data.DATE_LOG+'</td></tr>'+
                                '<tr><td>Ngày giờ gởi</td><td id = "DATE_PI">'+data.DATE_PI+'</td></tr>'+
                                '<tr><td>Điều Hòa 1 (A)</td><td id = "ADC_1">'+data.OUT_1+'</td></tr>'+
                                '<tr><td>Điều Hòa 2 (A)</td><td id = "ADC_2">'+data.OUT_2+'</td></tr>'+
                                '<tr><td>Điều Hòa 3 (M)</td><td id = "ADC_3">'+data.OUT_3+'</td></tr>'+
                                '<tr><td>Điều Hòa 4 (M)</td><td id = "ADC_4">'+data.OUT_4+'</td></tr>'+
                                '<tr><td>Thông Gió (M)</td><td id = "ADC_5">'+data.OUT_5+'</td></tr>'+
                                '<tr><td>Đèn Phòng 1 (A)</td><td id = "ADC_6">'+data.OUT_6+'</td></tr>'+
                                '<tr><td>Đèn Phòng 2 (A)</td><td id = "ADC_7">'+data.OUT_7+'</td></tr>'+
                                '<tr><td>Đèn Camere (A)</td><td id = "ADC_8">'+data.OUT6+'</td></tr>'+
                                '<tr><td>Đèn Angten (M)</td><td id = "ADC_9">'+data.OUT_8+'</td></tr>'+
                                '<tr><td>Báo Động (A)</td><td id = "ADC_10">'+data.OUT_10+'</td></tr>'+
                                '<tr><td>Điều Hòa 1 (A)</td><td id = "ADC_11">'+data.OUT_11+'</td></tr>'+
                                '<tr><td>Điều Hòa 1 (A)</td><td id = "ADC_12">'+data.OUT_12+'</td></tr>'+
                                '<tr><td>Máy Nổ O/ F( M)</td><td id = "ADC_13">'+data.OUT_13+'</td></tr>'+
                                '<tr><td>Ats Ac( M)</td><td id = "ADC_14">'+data.OUT_14+'</td></tr>'+
                                '<tr><td>Ats Gen( M)</td><td id = "ADC_15"></td>'+data.OUT_15+'</tr>'+
                                '<tr><td>Gen Mode L/ R( M)</td><td id = "ADC_16">'+data.OUT_16+'</td></tr>'; 
                            body.append(content);
                            $('#mymodal').modal('show');
                        }
                    });
                }
                else
                {
                    alert("Chọn ít nhất 1 bản ghi");
                }
                    
            });

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

