@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Chi tiết Điều Khiển {{ $output->MA_OUTPUT}}</h1>
@stop

@section('content')

    <div class="box-body">
        <a href="{{ url('/output') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
        <a href="{{ url('/output/' . $output->ID_OUTPUT . '/edit') }}" title="Edit daivt"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

        <form method="POST" action="{{ url('output' . '/' . $output->ID_OUTPUT) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete nhanvien" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
        </form>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr><th> ID Điều Khiển </th><td> {{ $output->ID_OUTPUT }} </td></tr>
                <tr><th> Mã Điều Khiển </th><td> {{ $output->MA_OUTPUT }} </td></tr>
                <tr><th> Tên Điều Khiển </th><td> {{ $output->TEN_OUTPUT }} </td></tr>
                <tr><th> Ghi Chú </th><td> {{ $output->GHI_CHU }} </td></tr>
                </tbody>
            </table>
        </div>
    </div>

@stop