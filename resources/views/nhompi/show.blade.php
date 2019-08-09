@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Nhóm Thiết Bị</h1>
@stop

@section('content')

    <div class="box-body">
        <a href="{{ url('/nhompi') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>
        <a href="{{ url('/nhompi/' . $nhompi->ID_NHOMPI . '/edit') }}" title="Edit daivt"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>

        <form method="POST" action="{{ url('nhompi' . '/' . $nhompi->ID_NHOMPI) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete nhanvien" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
        </form>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr><th> Nhóm ID </th><td> {{  $nhompi->ID_NHOMPI }} </td></tr>
                <tr><th> Mã nhóm</th><td> {{  $nhompi->MA_NHOMPI }} </td></tr>
                <tr><th> Tên nhóm T.bị </th><td> {{  $nhompi->TEN_NHOMPI }} </td></tr>
                <tr><th> Mô tả </th><td> {{  $nhompi->MO_TA }} </td></tr>

                </tbody>
            </table>
        </div>
    </div>

@stop
