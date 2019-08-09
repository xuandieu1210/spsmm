@extends('adminlte::page')

@section('title', 'VNPT SPSM')

@section('content_header')
    <h1>Thiết Bị</h1>
@stop

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tạo mới thiết bị</h3>          
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <a href="{{ url('/pi') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form method="POST" action="{{ url('/pi') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                    @include ('pi.form', ['formMode' => 'create'])
                    </div>
                </form>
          </div>
@stop
@section('js')
    <script>   
    var route = "{{ url('nhanvien/search') }}";
    $('#SEARCH_NHANVIEN').typeahead({
        source:  function (term, process) {
            objects = [];
            map = {};
            return $.get(route, { term: term }, function (data) {
                $.each(data, function(i, object) {
                    map[object.NHANVIEN] = object;
                    objects.push(object.NHANVIEN);
                });
                process(objects);
            });
        },
        afterSelect: function(item){
            $('#ID_NHANVIEN').val(map[item].ID_NHANVIEN);
        }
    });
    </script>
@stop