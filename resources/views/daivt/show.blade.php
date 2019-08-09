@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Đài Viễn Thông</h1>
@stop

@section('content')

<div class="box-body">
    <a href="{{ url('/daivt') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
    <a href="{{ url('/daivt/' . $daivt->ID_DAI . '/edit') }}" title="Edit daivt"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

    <form method="POST" action="{{ url('daivt' . '/' . $daivt->ID_DAI) }}" accept-charset="UTF-8" style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger btn-sm" title="Delete daivt" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    </form>
    <br/>
    <br/>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr><th> ID Đài VT </th><td> {{ $daivt->ID_DAI }} </td></tr>
                    <tr><th> Mã Đài VT </th><td> {{ $daivt->MA_DAIVT }} </td></tr>
                    <tr><th> Tên Đài VT </th><td> {{ $daivt->TEN_DAIVT }} </td></tr>
                    <tr><th> Địa Chỉ </th><td> {{ $daivt->DIA_CHI }} </td></tr>
                    <tr><th> Số ĐT </th><td> {{ $daivt->SO_DT }} </td></tr>
                </tbody>
            </table>
        </div>
    </div>
@stop

