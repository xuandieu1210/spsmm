<div class="form-group {{ $errors->has('ID_DONVI') ? 'has-error' : ''}}">
    <label for="ID_DONVI" class="control-label">{{ 'Id Đơn Vị' }}</label>
    <input class="form-control" name="ID_DONVI" type="number" id="ID_DONVI" value="{{ isset($donvi->ID_DONVI) ? $donvi->ID_DONVI : ''}}" >
    {!! $errors->first('ID_DONVI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('CAP_TREN') ? 'has-error' : ''}}">
    <label for="CAP_TREN" class="control-label">{{ 'Id Cấp trên' }}</label>
    <select class="form-control" name = "CAP_TREN">
        @foreach ($donvis as $value)
            @if (isset($daivt))
            <option value="{{$value->CAP_TREN }}" @if ($value->ID_DONVI == $donvi->CAP_TREN)
                    selected="selected" @endif>{{$value->TEN_DONVI}}</option>
            @else 
            <option value="{{$value->CAP_TREN }}">{{$value->TEN_DONVI}}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('CAP_TREN', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('MA_DONVI') ? 'has-error' : ''}}">
    <label for="MA_DONVI" class="control-label">{{ 'Mã Đơn Vị' }}</label>
    <input class="form-control" name="MA_DONVI" type="text" id="MA_DONVI" value="{{ isset($donvi->MA_DONVI) ? $donvi->MA_DONVI : ''}}" >
    {!! $errors->first('MA_DONVI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('TEN_DONVI') ? 'has-error' : ''}}">
    <label for="TEN_DONVI" class="control-label">{{ 'Tên Đơn Vị' }}</label>
    <input class="form-control" name="TEN_DONVI" type="text" id="TEN_DONVI" value="{{ isset($donvi->TEN_DONVI) ? $donvi->TEN_DONVI : ''}}" >
    {!! $errors->first('TEN_DONVI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('DIA_CHI') ? 'has-error' : ''}}">
    <label for="DIA_CHI" class="control-label">{{ 'Địa Chỉ' }}</label>
    <input class="form-control" name="DIA_CHI" type="text" id="DIA_CHI" value="{{ isset($donvi->DIA_CHI) ? $donvi->DIA_CHI : ''}}" >
    {!! $errors->first('DIA_CHI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('SO_DT') ? 'has-error' : ''}}">
    <label for="SO_DT" class="control-label">{{ 'Số ĐT' }}</label>
    <input class="form-control" name="SO_DT" type="text" id="SO_DT" value="{{ isset($donvi->SO_DT) ? $donvi->SO_DT : ''}}" >
    {!! $errors->first('SO_DT', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
