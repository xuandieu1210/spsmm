@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Trạm Viễn Thông</h1>
@stop

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tạo mới trạm viễn thông</h3>          
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <a href="{{ url('/daivt') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form method="POST" action="{{ url('/daivt') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                    @include ('daivt.form', ['formMode' => 'create'])
                    </div>
                </form>
          </div>
@stop
