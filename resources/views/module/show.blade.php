@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Module chương trình</h1>
@stop

@section('content')

<div class="box-body">
    <a href="{{ url('/module') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
    <a href="{{ url('/module/' . $module->ID_MODULE . '/edit') }}" title="Edit daivt"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

    <form method="POST" action="{{ url('module' . '/' . $module->ID_MODULE) }}" accept-charset="UTF-8" style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger btn-sm" title="Delete module" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    </form>
    <br/>
    <br/>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr><th> ID Module </th><td> {{ $module->ID_MODULE }} </td></tr><tr><th> Mã Module </th><td> {{ $module->MA_MODULE }} </td></tr><tr><th> Tên Module </th><td> {{ $module->TEN_MODULE }} </td></tr><tr><th> File Code </th><td> {{ $module->FILE_CODE }} </td></tr><tr><th> File Run </th><td> {{ $module->FILE_RUN }} </td></tr><tr><th> File shell </th><td> {{ $module->FILE_SHELL }} </td></tr><tr><th> File param </th><td> {{ $module->FILE_PARAM }} </td></tr><tr><th> Phiên Bản </th><td> {{ $module->PHIEN_BAN }} </td></tr><tr><th> ID Nhóm PI </th><td> {{ $module->ID_NHOMPI }} </td></tr><tr><th> Mô Tả </th><td> {{ $module->MO_TA }} </td></tr>
                </tbody>
            </table>
        </div>
    </div>
@stop

