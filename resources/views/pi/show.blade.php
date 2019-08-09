@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Chi tiết Thiết Bị {{ $pi->TEN_PI}}</h1>
@stop

@section('content')

    <div class="box-body">
        <a href="{{ url('/pi') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
        <a href="{{ url('/pi/' . $pi->ID_PI . '/edit') }}" title="Edit daivt"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

        <form method="POST" action="{{ url('pi' . '/' . $pi->ID_PI) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete nhanvien" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
        </form>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr><th> ID </th><td> {{ $pi->ID_PI }} </td></tr>
                <tr><th> Tên Thiết Bị </th><td> {{ $pi->TEN_PI }} </td></tr>
                <tr><th> Địa Chỉ Lắp Đặt </th><td> {{ $pi->DC_PI }} </td></tr>
                <tr><th> IP </th><td> {{ $pi->IP_ADDR }} </td></tr>
                <tr><th> Mã Video </th><td> {{ $pi->RTMP_PI }} </td></tr>
                <tr><th> Reg code </th><td> {{ $pi->LICENCE_CODE }} </td></tr>
                <tr><th> Bật SMS </th><td> {{ $pi->ACTIVE_SMS }} </td></tr>
                <tr><th> Giám Sát </th><td> {{ $pi->tbl_daivt->MA_DAIVT }} </td></tr>
                <tr><th> Nhóm Thiết Bị </th><td> {{ $pi->tbl_nhompi->TEN_NHOMPI }} </td></tr>
                <tr><th> Nhân Viên </th><td> {{ $pi->tbl_nhanvien->TEN_NHANVIEN }} </td></tr>
                <tr><th> Điện Thoại </th><td> {{ $pi->tbl_nhanvien->DIEN_THOAI }} </td></tr>
                <tr><th> Ghi Chú </th><td> {{ $pi->GHI_CHU }} </td></tr>
                </tbody>
            </table>
        </div>
    </div>

@stop



@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">pi {{ $pi->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/pi') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/pi/' . $pi->id . '/edit') }}" title="Edit pi"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('pi' . '/' . $pi->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete pi" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $pi->id }}</td>
                                    </tr>
                                    <tr><th> ID PI </th><td> {{ $pi->ID_PI }} </td></tr><tr><th> TEN PI </th><td> {{ $pi->TEN_PI }} </td></tr><tr><th> DC PI </th><td> {{ $pi->DC_PI }} </td></tr><tr><th> LAT PI </th><td> {{ $pi->LAT_PI }} </td></tr><tr><th> LONG PI </th><td> {{ $pi->LONG_PI }} </td></tr><tr><th> RTMP PI </th><td> {{ $pi->RTMP_PI }} </td></tr><tr><th> ID DAI </th><td> {{ $pi->ID_DAI }} </td></tr><tr><th> ID NHOMPI </th><td> {{ $pi->ID_NHOMPI }} </td></tr><tr><th> ID NHANVIEN </th><td> {{ $pi->ID_NHANVIEN }} </td></tr><tr><th> GHI CHU </th><td> {{ $pi->GHI_CHU }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
