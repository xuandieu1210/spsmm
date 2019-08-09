@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Nhân viên</h1>
@stop

@section('content')

<div class="box-body">
    <a href="{{ url('/nhanvien') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
    <a href="{{ url('/nhanvien/' . $nhanvien->ID_NHANVIEN . '/edit') }}" title="Edit daivt"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

    <form method="POST" action="{{ url('nhanvien' . '/' . $nhanvien->ID_NHANVIEN) }}" accept-charset="UTF-8" style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger btn-sm" title="Delete nhanvien" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    </form>
    <br/>
    <br/>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr><th> ID Nhân Viên </th><td> {{ $nhanvien->ID_NHANVIEN }} </td></tr>
                <tr><th> Mã Nhân Viên</th><td> {{ $nhanvien->MA_NHANVIEN }} </td></tr>
                <tr><th> Tên Nhân Viên </th><td> {{ $nhanvien->TEN_NHANVIEN }} </td></tr>
                <tr><th> Chức vụ </th><td> {{ $nhanvien->CHUC_VU }} </td></tr>
                <tr><th> Điện Thoại </th><td> {{ $nhanvien->DIEN_THOAI }} </td></tr>
                <tr><th> Đơn Vị </th><td> {{ $nhanvien->DIEN_THOAI }} </td></tr>
                <tr><th> Đài </th><td> {{ $nhanvien->tbl_daivt->TEN_DAIVT }} </td></tr>
                <tr><th> Ghi Chú </th><td> {{ $nhanvien->GHI_CHU }} </td></tr>
                <tr><th> UserName </th><td> {{ $nhanvien->tbl_donvi->TEN_DONVI }} </td></tr>
                </tbody>
            </table>
        </div>
    </div>
@stop
