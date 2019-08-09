<div class="form-group {{ $errors->has('ID_DAI') ? 'has-error' : ''}}">
    <label for="ID_DAI" class="control-label">{{ 'Id Đài VT' }}</label>
    <input class="form-control" name="ID_DAI" type="number" id="ID_DAI" value="{{ isset($daivt->ID_DAI) ? $daivt->ID_DAI : ''}}" >
    {!! $errors->first('ID_DAI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('MA_DAIVT') ? 'has-error' : ''}}">
    <label for="MA_DAIVT" class="control-label">{{ 'Mã Đài VT' }}</label>
    <input class="form-control" name="MA_DAIVT" type="text" id="MA_DAIVT" value="{{ isset($daivt->MA_DAIVT) ? $daivt->MA_DAIVT : ''}}" >
    {!! $errors->first('MA_DAIVT', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('TEN_DAIVT') ? 'has-error' : ''}}">
    <label for="TEN_DAIVT" class="control-label">{{ 'Tên Đài VT' }}</label>
    <input class="form-control" name="TEN_DAIVT" type="text" id="TEN_DAIVT" value="{{ isset($daivt->TEN_DAIVT) ? $daivt->TEN_DAIVT : ''}}" >
    {!! $errors->first('TEN_DAIVT', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('DIA_CHI') ? 'has-error' : ''}}">
    <label for="DIA_CHI" class="control-label">{{ 'Địa chỉ' }}</label>
    <input class="form-control" name="DIA_CHI" type="text" id="DIA_CHI" value="{{ isset($daivt->DIA_CHI) ? $daivt->DIA_CHI : ''}}" >
    {!! $errors->first('DIA_CHI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('SO_DT') ? 'has-error' : ''}}">
    <label for="SO_DT" class="control-label">{{ 'Số Điện Thoại' }}</label>
    <input class="form-control" name="SO_DT" type="text" id="SO_DT" value="{{ isset($daivt->SO_DT) ? $daivt->SO_DT : ''}}" >
    {!! $errors->first('SO_DT', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ID_DONVI') ? 'has-error' : ''}}">
    <label for="ID_DONVI" class="control-label">{{ 'ID Đơn vị' }}</label>
    <select class="form-control" name = "ID_DONVI">
        @foreach ($donvis as $donvi)
            @if (isset($daivt))
            <option value="{{$donvi->ID_DONVI }}" @if ($daivt->ID_DONVI == $donvi->ID_DONVI)
                    selected="selected" @endif>{{$donvi->TEN_DONVI}}</option>
            @else 
            <option value="{{$donvi->ID_DONVI }}">{{$donvi->TEN_DONVI}}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('ID_DONVI', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
