@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Đơn Vị Chủ Quản</h1>
@stop

@section('content')

<div class="box-body">
    <a href="{{ url('/donvi') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
    <a href="{{ url('/donvi/' . $donvi->ID_DONVI . '/edit') }}" title="Edit daivt"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

    <form method="POST" action="{{ url('donvi' . '/' . $donvi->ID_DONVI) }}" accept-charset="UTF-8" style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger btn-sm" title="Delete donvi" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    </form>
    <br/>
    <br/>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr><th> ID Đơn Vị </th><td> {{ $donvi->ID_DONVI }} </td></tr>
                <tr><th> Mã Đơn Vị</th><td> {{ $donvi->MA_DONVI }} </td></tr>
                <tr><th> Tên Đơn Vị </th><td> {{ $donvi->TEN_DONVI }} </td></tr>
                <tr><th> Địa Chỉ </th><td> {{ $donvi->DIA_CHI }} </td></tr>
                <tr><th> Số ĐT </th><td> {{ $donvi->SO_DT }} </td></tr>
                <tr><th> Cấp trên </th><td> {{ $donvi->TEN_CAPTREN }} </td></tr>
                </tbody>
            </table>
        </div>
    </div>
@stop
