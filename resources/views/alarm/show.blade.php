@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Chi tiết Cảnh Báo {{ $alarm->MA_ALARM}}</h1>
@stop

@section('content')

    <div class="box-body">
        <a href="{{ url('/alarm') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
        <a href="{{ url('/alarm/' . $alarm->ID_ALARM . '/edit') }}" title="Edit daivt"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

        <form method="POST" action="{{ url('alarm' . '/' . $alarm->ID_ALARM) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete nhanvien" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
        </form>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr><th> ID </th><td> {{ $alarm->ID_ALARM }} </td></tr>
                <tr><th> Mã Cảnh Báo </th><td> {{ $alarm->MA_ALARM }} </td></tr>
                <tr><th> Tên Cảnh Báo </th><td> {{ $alarm->TEN_ALARM }} </td></tr>
                <tr><th> Cấp Độ </th><td> {{ $alarm->CAP_DO }} </td></tr>
                <tr><th> Loại Cảnh Báo </th><td> {{ $alarm->LOAI_ALARM }} </td></tr>
                <tr><th> File Icon </th><td> {{ $alarm->FILE_ICON }} </td></tr>
                <tr><th> Màu Chữ </th><td> {{ $alarm->MAU_CHU }} </td></tr>
                <tr><th> Màu nên </th><td> {{ $alarm->MAU_NEN }} </td></tr>
                <tr><th> SMS Cảnh Báo </th><td> {{ $alarm->SMS_ALARM }} </td></tr>
                <tr><th> Mô Tả </th><td> {{ $alarm->MO_TA }} </td></tr>
                </tbody>
            </table>
        </div>
    </div>

@stop
