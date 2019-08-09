<div class="form-group {{ $errors->has('MA_NHANVIEN') ? 'has-error' : ''}}">
    <label for="MA_NHANVIEN" class="control-label">{{ 'Ma Nhanvien' }}</label>
    <input class="form-control" name="MA_NHANVIEN" type="string" id="MA_NHANVIEN" value="{{ isset($nhanvien->MA_NHANVIEN) ? $nhanvien->MA_NHANVIEN : ''}}" >
    {!! $errors->first('MA_NHANVIEN', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('TEN_NHANVIEN') ? 'has-error' : ''}}">
    <label for="TEN_NHANVIEN" class="control-label">{{ 'Ten Nhanvien' }}</label>
    <input class="form-control" name="TEN_NHANVIEN" type="text" id="TEN_NHANVIEN" value="{{ isset($nhanvien->TEN_NHANVIEN) ? $nhanvien->TEN_NHANVIEN : ''}}" >
    {!! $errors->first('TEN_NHANVIEN', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('CHUC_VU') ? 'has-error' : ''}}">
    <label for="CHUC_VU" class="control-label">{{ 'Chuc Vu' }}</label>
    <input class="form-control" name="CHUC_VU" type="text" id="CHUC_VU" value="{{ isset($nhanvien->CHUC_VU) ? $nhanvien->CHUC_VU : ''}}" >
    {!! $errors->first('CHUC_VU', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('DIEN_THOAI') ? 'has-error' : ''}}">
    <label for="DIEN_THOAI" class="control-label">{{ 'Dien Thoai' }}</label>
    <input class="form-control" name="DIEN_THOAI" type="text" id="DIEN_THOAI" value="{{ isset($nhanvien->DIEN_THOAI) ? $nhanvien->DIEN_THOAI : ''}}" >
    {!! $errors->first('DIEN_THOAI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ID_DONVI') ? 'has-error' : ''}}">
    <label for="ID_DONVI" class="control-label">{{ 'Id Donvi' }}</label>
    <select class="form-control" name = "ID_DONVI">
        @foreach ($donvi as $value)
            @if (isset($nhanvien))
            <option value="{{$value->ID_DONVI }}" @if ($value->ID_DONVI == $nhanvien->ID_DONVI)
                    selected="selected" @endif>{{$value->TEN_DONVI}}</option>
            @else 
            <option value="{{$value->ID_DONVI }}">{{$value->TEN_DONVI}}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('ID_DONVI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ID_DAI') ? 'has-error' : ''}}">
    <label for="ID_DAI" class="control-label">{{ 'Id Dai' }}</label>
    <select class="form-control" name = "ID_DAI">
        @foreach ($tram as $value)
            @if (isset($nhanvien))
            <option value="{{$value->ID_DAI }}" @if ($value->ID_DAI == $nhanvien->ID_DAI)
                    selected="selected" @endif>{{$value->TEN_DAIVT}}</option>
            @else 
            <option value="{{$value->ID_DAI }}">{{$value->TEN_DAIVT}}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('ID_DAI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('GHI_CHU') ? 'has-error' : ''}}">
    <label for="GHI_CHU" class="control-label">{{ 'Ghi Chu' }}</label>
    <input class="form-control" name="GHI_CHU" type="text" id="GHI_CHU" value="{{ isset($nhanvien->GHI_CHU) ? $nhanvien->GHI_CHU : ''}}" >
    {!! $errors->first('GHI_CHU', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('USER_NAME') ? 'has-error' : ''}}">
    <label for="USER_NAME" class="control-label">{{ 'User Name' }}</label>
    <input class="form-control" name="USER_NAME" type="text" id="USER_NAME" value="{{ isset($nhanvien->USER_NAME) ? $nhanvien->USER_NAME : ''}}" >
    {!! $errors->first('USER_NAME', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
