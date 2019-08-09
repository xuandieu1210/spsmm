@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Tham Số</h1>
@stop

@section('content')

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cập nhật thông tin tham số {{ $param->MA_PARAM }}</h3>          
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <a href="{{ url('/param') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form method="POST" action="{{ url('/param/' . $param->ID_PARAM) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="box-body">
                    @include ('param.form', ['formMode' => 'edit'])
                    </div>
                </form>
          </div>
@stop
