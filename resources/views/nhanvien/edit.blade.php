@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Nhân viên</h1>
@stop

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sửa nhân viên</h3>          
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <a href="{{ url('/nhanvien') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/nhanvien/' . $nhanvien->ID_NHANVIEN) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="box-body">
                            @include ('nhanvien.form', ['formMode' => 'edit'])
                            </div>
                        </form>
          </div>
@stop
