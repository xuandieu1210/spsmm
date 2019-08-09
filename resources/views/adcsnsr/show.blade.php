@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Chi tiết cảm biến {{ $adcsnsr->MA_ADC}}</h1>
@stop

@section('content')

    <div class="box-body">
        <a href="{{ url('/adcsnsr') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
        <a href="{{ url('/adcsnsr/' . $adcsnsr->ID_ADCSNSR . '/edit') }}" title="Edit daivt"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

        <form method="POST" action="{{ url('adcsnsr' . '/' . $adcsnsr->ID_ADCSNSR) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete nhanvien" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
        </form>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr><th> ID Cảm Biến </th><td> {{ $adcsnsr->ID_ADCSNSR }} </td></tr>
                <tr><th> Mã Cảm Biến </th><td> {{ $adcsnsr->MA_ADC }} </td></tr>
                <tr><th> Tên Cảm biến </th><td> {{ $adcsnsr->TEN_ADC }} </td></tr>
                <tr><th> Ghi Chú </th><td> {{ $adcsnsr->GHI_CHU }} </td></tr>
                </tbody>
            </table>
        </div>
    </div>

@stop
