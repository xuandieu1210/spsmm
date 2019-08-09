@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Chi tiết Tham Số {{ $param->MA_PARAM}}</h1>
@stop

@section('content')

    <div class="box-body">
        <a href="{{ url('/param') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
        <a href="{{ url('/param/' . $param->ID_PARAM . '/edit') }}" title="Edit daivt"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

        <form method="POST" action="{{ url('param' . '/' . $param->ID_PARAM) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete nhanvien" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
        </form>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr><th> ID </th><td> {{ $param->ID_PARAM }} </td></tr>
                <tr><th> Mã Tham Số </th><td> {{ $param->MA_PARAM }} </td></tr>
                <tr><th> File Tham Số </th><td> {{ $param->FILE_PARAM }} </td></tr>
                <tr><th> Mô Tả </th><td> {{ $param->MO_TA }} </td></tr>
                <tr><th> Bật Tham Số </th><td> {{ $param->ACTIVE_PARAM }} </td></tr>
                <tr><th> Bật Module </th><td> {{ $param->ACTIVE_MODULE }} </td></tr>
                <tr><th> Mã Module </th><td> {{ $param->tbl_module->MA_MODULE }} </td></tr>
                <tr><th> Mã Thiết Bị </th><td> {{ $param->tbl_pi->TEN_PI }} </td></tr>
                </tbody>
            </table>
        </div>
    </div>

@stop
